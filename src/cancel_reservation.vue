

<template>
  <bar/>
  <banner/>
  <div id="middle">
    <div id="checkbox">
      <input type="checkbox" id="cbox">
     <div id="bbox">
       <h3>時間</h3>
       <h3>已預約</h3>
      </div>
   </div>
   <div id="checkbox">
     <input type="checkbox" id="cbox">
     <div id="bbox">
       <h3>時間</h3>
       <h3>已預約</h3>
      </div>
   </div>
    <div id="checkbox">
     <input type="checkbox" id="cbox">
      <div id="bbox">
        <h3>時間</h3>
        <h3>已預約</h3>
     </div>
    </div>
  </div>
  <div id="cbtn">
    <button id="cancel" @click="">取消</button>
    <button id="check" @click="">完成預約</button>
  </div>
</template>

<script setup>
import bar from './components/bar.vue'
import banner from './components/banner_patient.vue'
</script>

<style scoped>

#middle{
  margin-top: 40px;
}

#checkbox{
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
}

#cbox{
  background-color: #29528F;
}

#bbox{
  width: 660px;
  height: 165px;
  background: #29528F;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 30px;
  display: flex;
  margin-left: 70px;
  color: white;
  flex-direction: column;
  align-items: center;
}

#cbtn{
  display: flex;
  justify-content: space-around;
  padding: 50px 300px;
}

#cancel{
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
  border-radius: 10px;
}

#check{
  width: 125px;
  height: 50px;
  background-color: #00317B;
  color: white;
  text-align: center;
  border: 0;
  border-radius: 10px;
}

</style>