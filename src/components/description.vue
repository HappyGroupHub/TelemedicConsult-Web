<template>

    <div id="directions">
      <div id="directions_blue">
        <div id="content">
          <br>
          <ul><b>初次使用此線上掛號系統</b><br><br>
            <li>進入首頁後 ，請選擇線上掛號</li><br>
            <li>選擇初診註冊按鈕</li><br>
            <li>填寫基本資料</li><br>
            <li>確認完畢後送出</li><br>
            <li>點擊連結加入官方LINE</li><br>
            <li>透過LINE App完成帳號綁定，確認綁定後回到網站</li><br>
            <li>即可選擇掛號時間</li><br>
            <li>確認後即完成預約</li><br><br>
          </ul>
        </div>
      </div>
      <div id="directions_white">
        <div id="content">
          <br>
          <ul><b>複診病患掛號</b><br><br>
            <li>進入首頁後 ，請選擇線上掛號</li><br>
            <li>輸入身分證字號跟健保卡卡號登入</li><br>
            <li>可以更新資料，無須更動可以直接送出</li><br>
            <li>選擇掛號時間</li><br>
            <li>確認後即完成預約</li><br><br>
          </ul>
        </div>
      </div>
      <div id="directions_blue">
        <div id="content">
          <br>
          <ul><b>LINE 使用說明</b><br><br>
            <li>在手機上綁定個人帳號</li><br>
            <li>開啟提醒即可收到系統訊息</li><br>
            <br>
            <li>我過號了怎麼辦?</li>
            點擊過號，系統將自動插入在兩位號碼之後，請隨時注意手機訊息
            <br><br>
            <li>我換手機了怎麼辦?</li>
            點擊會員服務，重新綁定LINE<br><br>
          </ul>
        </div>
      </div>
      <div id="directions_white">
        <div id="content">
          <br>
          <ul><b>常見問題</b><br><br>
            <li>一定要綁定嗎</li><br>
            >是。病人使用此網站進行掛號，透過加入LINE官方帳號綁定的形式，進而達成使用LINE進行通訊診療跟個案管理的服務。<br>
            <li>過號怎麼辦</li>
            >察覺過號時，點選過號服務。系統會自動在當前看診進度兩號後找回過號患者患者，請隨時注意手機訊息 !!<br>
            <li>我怎麼知道現在是幾號在看診?要怎麼提前準備?</li>
            >可以點選查看目前看診進度。並且請保持line官方帳號提醒開啟，系統會提前2個號碼提醒您看診 。<br>
            <li>可以選醫生嗎</li>
            >不行，隸屬本醫院之醫生皆受過足夠專業的訓練，請尊重。<br><br>
          </ul>
        </div>
      </div>
    </div>

</template>

<script setup>

</script>

<style scoped>
a:link, a:visited, a:hover, a:active {
    color: #000000;
    text-decoration: none;
}

#directions {
  width: auto;
  color: black;
}

#directions_blue{
  background-color: #0855bd;
  height: auto;
  box-shadow: inset 9px 16px 50px rgba(0, 0, 0, 0.25);
}

#directions_white{
  background-color: white;
  height: auto;
  box-shadow: inset 9px 16px 72px rgba(0, 0, 0, 0.25);
}

content{padding-top: 4px;}

ul{margin: 0px}
</style>