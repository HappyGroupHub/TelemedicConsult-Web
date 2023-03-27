<template>
  <div id="flex_container_clinic">
    <h2>目前號碼</h2>
    <div id="input_base">
      <div id="number">8</div>
      <div id="inner_template">
        <div class="button-container">
          <button class="finish"
                  style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">看完
          </button>
          <button class="examine"
                  style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">過號
          </button>
        </div>
      </div>
    </div>
    <div id="input_base_list">
      <ol>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
        <li id='number_list'>rrr</li>
      </ol>
    </div>
  </div>

  <br>

  <div id="under_box">
    <h2 style="margin-right: 800px">當前病人資料</h2>
    <div id="under_box_gray">
      <div class="container" style="justify-content: space-around">
        <p class="clinic_date">2222/22/22 星期天 早班</p>
        <p class="status">看診中</p>
      </div>
      <hr>
    </div>
  </div>
</template>


<style>
#flex_container_clinic {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin-top: 30px;
  align-content: flex-start;
}



#input_base {
  background-color: #E1E1E1;
  height: 350px;
  padding: 30px;
  text-align: center;
  border-radius: 30px;
  margin-left: 20px;
  box-shadow: gray 2px 2px;
  margin-top: 0;

}

#number {
  font-size: 100px;
  display: inline-block;
  padding: 50px 100px;
  opacity: 0.8;
  background-color: #29528F;
  color: whitesmoke;
  text-align: center;
  margin-top: 20px;
  margin-left: 20px;
  margin-right: 30px;
  box-shadow: gray 2px 2px;
  border: 0;
  border-radius: 7px;
}

#inner_template {
  justify-content: flex-end;
  margin: 60px 60px 60px 60px;
}

#input_base_list {

  background-color: #29528F;
  height: 350px;
  width: 200px;
  padding: 30px;
  text-align: center;
  border-radius: 30px;
  margin-left: 20px;
  box-shadow: gray 2px 2px;
  margin-top: 0;
}

#number_list {
  color: white;
  font-size: 30px;
  margin: 5px 5px 5px 5px;
}

#under_box_gray {

  background-color: #E1E1E1;
  height: 300px;
  padding: 30px;
  border-radius: 30px;
  box-shadow: gray 2px 2px;
  margin: auto;
  width: 50%;
  text-align: center;
}



#under_box {
  margin: auto;
  width: 100%;
  text-align: center;
}


.container {
  width: 100%;
  overflow: hidden; /* 用來清除float浮動產生的高度塌陷 */
}

.clinic_date {
  display: inline-block;
  float: left;
}

.status {
  display: inline-block;
  float: right;
  color: red;
}
.button-container {
  text-align: center;
}

.finish, .examine {
  display: inline-block;
  margin: 20px;
}

</style>
