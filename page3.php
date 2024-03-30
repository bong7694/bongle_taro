<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3: Select Card Order</title>
    <link rel="stylesheet" href="styles.css"> <!-- styles.css 파일을 연결 -->
    <style>
        .card_object1 span {
            /* 숫자를 가리기 위해 visibility 속성 사용 */
            visibility: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>봉글 타로</h3>
        <h2>카드를 선택하세요.</h2>
        <h4>78장의 무작위 카드 중 3장의 카드를 선택하세요</h4>
        <div class="card_group" id="cardGroup">
            <!-- 여기에 카드 버튼이 동적으로 생성됩니다. -->
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        // 카드를 선택하는 함수
        function selectCard(button) {
            // 이미 클릭된 버튼인지 확인
            if (!button.classList.contains('clicked')) {
                // 현재 선택된 카드 개수 확인
                var selectedCount = document.querySelectorAll('.card_object1.clicked').length;
                if (selectedCount < 3) {
                    // 선택한 카드 번호를 기반으로 순서를 자동으로 할당
                    var orderCount = JSON.parse(localStorage.getItem('orderCount') || '0');
                    orderCount++;
                    localStorage.setItem('orderCount', JSON.stringify(orderCount)); // 'orderCount'를 문자열로 저장
                    localStorage.setItem('selectedOrder' + button.textContent, orderCount.toString());
                    button.classList.add('clicked'); // 버튼을 클릭한 것으로 표시
                }
            }

            // 모든 카드가 선택되었는지 확인하고 페이지 이동
            var selectedCount = document.querySelectorAll('.card_object1.clicked').length;
            if (selectedCount === 3) {
                checkOrders();
            }
        }

        // 선택된 카드의 순서를 확인하고 로컬 스토리지에 저장하는 함수
        function checkOrders() {
            var orders = [];
            for (var i = 0; i < 3; i++) {
                var order = localStorage.getItem('selectedOrder' + (i + 1));
                orders.push(order);
            }
            localStorage.setItem('selectedOrders', JSON.stringify(orders));
            
            // 선택된 카드의 번호와 순서를 로컬 스토리지에 저장
            var selectedNumbers = [];
            document.querySelectorAll('.card_object1.clicked').forEach(function(button, index) {
                var number = button.textContent;
                var order = 'stst' + (index + 1) + 'st';
                localStorage.setItem(order, number);
                selectedNumbers.push(number);
            });
            localStorage.setItem('selectedNumbers', JSON.stringify(selectedNumbers));
            
            // 페이지 이동
            window.location.href = 'page4.php';
        }

        // 로컬 스토리지에서 선택된 카드 번호들을 불러와 화면에 표시
        var selectedNumbers = JSON.parse(localStorage.getItem('selectedNumbers')) || [];
        var cardGroup = document.getElementById('cardGroup');

        selectedNumbers.forEach(function(number) {
            var button = document.createElement('button');
            button.className = 'card_object1';
            button.innerHTML = '<span>' + number + '</span>'; // 선택된 카드 번호를 표시
            button.onclick = function() { selectCard(button); };
            cardGroup.appendChild(button);
        });

        // 페이지 로드 시 선택 카운트 초기화
        localStorage.setItem('orderCount', JSON.stringify(0));
    </script>
</body>
</html>
