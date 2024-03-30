<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2: Select Random Cards</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>봉글 타로</h3>
        <h2>카드를 선택 하세요.</h2>
        <h4>2가지 무작위 덱중에 하나를 선택하세요.</h4>
        <div class="card_group">
            <?php
            // 카드 덱 생성 (0부터 155까지의 번호가 부여된 카드)
            $deck = range(0, 155);

            // 카드 덱을 무작위로 섞음
            shuffle($deck);

            $firstCardNumbers = array_slice($deck, 0, 78);
            $secondCardNumbers = array_slice($deck, 78, 78);

            echo "<button class='card_object' onclick='selectDeck(\"firstDeck\")'>카드 덱<br>1번</button>";
            echo "<button class='card_object' onclick='selectDeck(\"secondDeck\")'>카드 덱<br>2번</button>";

            // JavaScript를 통해 선택된 카드의 숫자 배열을 localStorage에 저장
            ?>
        </div>
    </div>
    <script src="script.js"></script>
<script>
var firstCardNumbers = <?php echo json_encode($firstCardNumbers); ?>;
var secondCardNumbers = <?php echo json_encode($secondCardNumbers); ?>;

function selectDeck(deck) {
    var selectedNumbers;
    if (deck === "firstDeck") {
        selectedNumbers = firstCardNumbers;
    } else if (deck === "secondDeck") {
        selectedNumbers = secondCardNumbers;
    }
    localStorage.setItem('selectedNumbers', JSON.stringify(selectedNumbers));
    window.location.href = 'page3.php'; // 페이지 3로 이동
}
</script>
</body>
</html>