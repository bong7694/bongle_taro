<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1: Select Theme</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>봉글 타로</h3>
        <h2>카드를 선택 하세요.</h2>
        <h4>가장 알고싶은 운세중 한가지 덱을 선택하세요</h4>
        <div class="card_group">
            <button class="card_object" onclick="selectTheme('lo')">애정운</button>
            <button class="card_object" onclick="selectTheme('mo')">재물운</button>
            <button class="card_object" onclick="selectTheme('wo')">직업운</button>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        function selectTheme(theme) {
            // 선택한 테마 코드를 localStorage에 저장
            localStorage.setItem('selectedTheme', theme);
            // 페이지 2로 이동
            window.location.href = 'page2.php';
        }
    </script>
</body>
</html>