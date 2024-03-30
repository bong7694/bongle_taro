<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>카드 출력</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
        <h3>봉글 타로</h3>
        <h2>결과를 확인 하세요</h2>
        <h4>당신의 타로카드 결과 입니다.</h4>
  <div class="card_group">
    <div class="card_object" id="cardA">
      <span class="card_field_name">dir:</span>
      <span class="card_field_name">EN_name:</span>
      <span class="card_field_name">KR_name:</span>
      <!-- 로컬스토리지 stst1st의 값에 따라서 채워질 공간 -->
    </div>
    <div class="card_object" id="cardB">
      <span class="card_field_name">dir:</span>
      <span class="card_field_name">EN_name:</span>
      <span class="card_field_name">KR_name:</span>
      <!-- 로컬스토리지 stst2st의 값에 따라서 채워질 공간 -->
    </div>
    <div class="card_object" id="cardC">
      <span class="card_field_name">dir:</span>
      <span class="card_field_name">EN_name:</span>
      <span class="card_field_name">KR_name:</span>
      <!-- 로컬스토리지 stst3st의 값에 따라서 채워질 공간 -->
    </div>
  </div>
</div>
<div class="container">
  <div class="card_group">
    <div class="card_object" id="cardD">
      <span class="card_field_name">lo_1st:</span>
      <span class="card_field_name">lo_2st:</span>
      <span class="card_field_name">lo_3st:</span>
      <span class="card_field_name">mo_1st:</span>
      <span class="card_field_name">mo_2st:</span>
      <span class="card_field_name">mo_3st:</span>
      <span class="card_field_name">wo_1st:</span>
      <span class="card_field_name">wo_2st:</span>
      <span class="card_field_name">wo_3st:</span>
      <!-- 로컬스토리지 selectedTheme에 따라서 채워질 공간 -->
    </div>
    <div class="card_object" id="cardE">
      <span class="card_field_name">lo_1st:</span>
      <span class="card_field_name">lo_2st:</span>
      <span class="card_field_name">lo_3st:</span>
      <span class="card_field_name">mo_1st:</span>
      <span class="card_field_name">mo_2st:</span>
      <span class="card_field_name">mo_3st:</span>
      <span class="card_field_name">wo_1st:</span>
      <span class="card_field_name">wo_2st:</span>
      <span class="card_field_name">wo_3st:</span>
      <!-- 로컬스토리지 selectedTheme에 따라서 채워질 공간 -->
    </div>
    <div class="card_object" id="cardF">
      <span class="card_field_name">lo_1st:</span>
      <span class="card_field_name">lo_2st:</span>
      <span class="card_field_name">lo_3st:</span>
      <span class="card_field_name">mo_1st:</span>
      <span class="card_field_name">mo_2st:</span>
      <span class="card_field_name">mo_3st:</span>
      <span class="card_field_name">wo_1st:</span>
      <span class="card_field_name">wo_2st:</span>
      <span class="card_field_name">wo_3st:</span>
      <!-- 로컬스토리지 selectedTheme에 따라서 채워질 공간 -->
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script>
  // CSV 파일 경로
  const csvFilePath = 'taro_db.csv';

  // 로컬스토리지 값 가져오기
  const stst1st = localStorage.getItem('stst1st');
  const stst2st = localStorage.getItem('stst2st');
  const stst3st = localStorage.getItem('stst3st');
  const selectedTheme = localStorage.getItem('selectedTheme');

  // 필요한 CSV 필드값을 담을 변수들
  let A_text = '';
  let B_text = '';
  let C_text = '';
  let D_text = '';
  let E_text = '';
  let F_text = '';

  // CSV 파일을 읽어와서 처리
  Papa.parse(csvFilePath, {
    header: true,
    download: true,
    complete: function(results) {
      const data = results.data;

// CSV 데이터에서 필요한 값을 찾아 변수에 할당
data.forEach(row => {
  if (row.no === stst1st) {
    A_text = `${row.card_no}, ${row.dir}, ${row.EN_name}, ${row.KR_name}, 뜻: ${row.base_ex}`;
  }
  if (row.no === stst2st) {
    B_text = `${row.card_no}, ${row.dir}, ${row.EN_name}, ${row.KR_name}, 뜻: ${row.base_ex}`;
  }
  if (row.no === stst3st) {
    C_text = `${row.card_no}, ${row.dir}, ${row.EN_name}, ${row.KR_name}, 뜻: ${row.base_ex}`;
  }
  if (selectedTheme === 'lo' && row.no === stst1st) {
    D_text = `해설: ${row.lo_1st}`;
  }
  if (selectedTheme === 'mo' && row.no === stst1st) {
    D_text = `해설: ${row.mo_1st}`;
  }
  if (selectedTheme === 'wo' && row.no === stst1st) {
    D_text = `해설: ${row.wo_1st}`;
  }
  if (selectedTheme === 'lo' && row.no === stst2st) {
    E_text = `해설: ${row.lo_2st}`;
  }
  if (selectedTheme === 'mo' && row.no === stst2st) {
    E_text = `해설:  ${row.mo_2st}`;
  }
  if (selectedTheme === 'wo' && row.no === stst2st) {
    E_text = `해설: ${row.wo_2st}`;
  }
  if (selectedTheme === 'lo' && row.no === stst3st) {
    F_text = `해설: ${row.lo_3st}`;
  }
  if (selectedTheme === 'mo' && row.no === stst3st) {
    F_text = `해설: ${row.mo_3st}`;
  }
  if (selectedTheme === 'wo' && row.no === stst3st) {
    F_text = `해설: ${row.wo_3st}`;
  }
});

      // 카드에 텍스트 채우기
      document.getElementById('cardA').innerText = A_text;
      document.getElementById('cardB').innerText = B_text;
      document.getElementById('cardC').innerText = C_text;
      document.getElementById('cardD').innerText = D_text;
      document.getElementById('cardE').innerText = E_text;
      document.getElementById('cardF').innerText = F_text;
    }
  });
</script>
</body>
</html>
