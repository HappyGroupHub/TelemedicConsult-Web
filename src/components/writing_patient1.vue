<template>
  <div id="container1">
    <br>
    <h2>初診基本資料1/2</h2>
    <div class="basic">
      <form>
        <div id="left">
          <section class="first">
            <label for="name">姓名</label><br>
            <label><input id="name" name="name"  required="required"></label>
          </section><br>
          <section class="first">
            <label for="identity">身分證字號</label><br>
            <input id="identity" name="id" required="required">
          </section><br>
          <section class="first">
            <label for="birthday">生日</label><br>
            <label><input name="birthday" type="date" required="required"></label>
          </section><br>
          <section class="first">
            <label for="sex">生理性別</label><br>
            <label><input name="sex" type="radio" value="男" required="required">男</label>
            <label><input name="sex" type="radio" value="女" required="required">女</label>
          </section><br>
          <button id="back" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >回首頁</button>
          <br>
        </div>
        <div id="right">
          <section class="first">
            <label for="id_card_number">健保卡卡號</label><br>
            <label><input name="ic_card_number" required="required"></label>
          </section><br>
          <section class="first">
            <label for="phone_number">手機號碼</label><br>
            <label><input name="phone_number" required="required" type="text" maxlength="10" pattern="09\d{8}" placeholder="09xxxxxxxx"></label>
          </section><br>
          <section class="first">
            <label for="blood_type">血型</label><br>
            <label><input name="blood_type">型</label>
          </section><br>
          <section class="first">
            <label for="address">地址</label><br>
            <label><input name="address" required="required"></label>
          </section><br>
          <button id="next" style="width:150px;height:50px;background-color: #00317B;color:white;text-align: center;border:0" >下一頁</button>
          <br>
        </div>
      </form>
    </div>
    <br><br>
  </div>


</template>

<script setup>

</script>

<style >
#container1{

  justify-content: center;
  align-items: center;
  background-color: #E1E1E1;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
}
#container1 h2{
  text-align: center;
  margin-top: 30px;
  margin-bottom: 20px;
}

form{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: flex-end;

}
#right{

}
#left{

}
#back{
  box-shadow: gray 2px 2px
}
#next{
  box-shadow: gray 2px 2px
}

</style>