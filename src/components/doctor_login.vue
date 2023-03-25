<template xmlns="http://www.w3.org/1999/html" >
  <div id="flex_container" >
    <div id="input_base">
      <div id= "inner_template">
        <h2 style="text-align: left">登入系統</h2>
        <h4 style="text-align: left">帳號</h4>
        <input id="id" type="text"/>
        <h4 style="text-align: left">密碼</h4>
        <input id="birthday" type="password"/>
      </div>

      <p></p>
      <div id="inner_template">
        <button id="submit"
                style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">登入</button>
        <button id="submit"
                style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">返回</button>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>

<style>
#flex_container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: flex-end;
  margin-top: 30px;
}

#input_base {

  background-color: #E1E1E1;
  width: 100%;
  height: 350px;
  padding: 30px;
  text-align: center;
  border-radius: 30px;
  margin-left: 20px;
  box-shadow: gray 2px 2px;
  margin-top: 0px;

}

#submit {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  text-align: center;
  font-size: 16px;
  margin-top: 20px;
  margin-left: 20px;
  margin-right: 30px;
  box-shadow: gray 2px 2px;
  border: 0;
  border-radius: 7px;
}
#inner_template{
  justify-content: center;
}
#id{
  justify-content: center;
}

</style>
