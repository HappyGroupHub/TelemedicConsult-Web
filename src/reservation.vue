
<script setup>
  import bar from './components/bar.vue'
  import banner from './components/banner_patient.vue'
  import {computed, ref} from "vue";
  import {watch} from "vue";
  import axios from "axios";

  const clinic_date = ref('')
  const time_period = ref('時段');
  const disableOption1 = true;
  const if_this_can_be_selected = ref('');
  const button_visible2 = ref(false);
  const clinic_id = ref('');
  const have_clinic = ref(false);
  const clinic_doctor = ref('');
  const total_appointment = ref('');
  const show_clinic_info = ref(false);


  watch([clinic_date,time_period], (newValue, oldValue) => {
    if (selectionsComplete.value) {
      check_if_exist_clinic()
    }
  });

  const selectionsComplete = computed(()=>
    clinic_date.value !== '' &&
    time_period.value !== '時段'
  );

  function check_if_exist_clinic(){
/*查看有沒有病人選擇時段可以選擇*/
    let config = { headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*'}
    }
    axios.post('http://127.0.0.1:5000/check_if_time_have_clinic', {
      date:clinic_date.value,
      time_period:time_period.value
    }, config)
        .then(res => {
          console.log(res)
          if(res.data['have_clinic'] === true){
            if_this_can_be_selected.value = ''
            clinic_id.value = res.data['clinic_id']
            localStorage.setItem('clinic_id', clinic_id.value)
            showClinicInfo()
          }else{
            if_this_can_be_selected.value = '此時段未開放掛號，請重新選擇';
            clinic_date.value = ''
            time_period.value = ''
            clinic_doctor.value = ''
          }
        })
        .catch(err => {
          console.log(err)
        });
  }
  function showClinicInfo(){
    /*顯示診間資訊*/
    let config = { headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*'}
    }
    axios.post('http://127.0.0.1:5000/get_clinic_info', {
      clinic_id: clinic_id.value
    }, config)
        .then(res => {
          console.log(res)
          button_visible2.value = true;
          show_clinic_info.value = true;
          clinic_doctor.value = res.data['doc_name']
          total_appointment.value = res.data.total_appointment
        })
        .catch(err => {
          console.log(err)
        });
  }

  function turn_next_page() {
    window.location.href = 'http://localhost:5173/check_reservation.html';
  }

</script>
<template>
  <bar />
  <banner />
  <br><br>
    <div id="gray_background">
      <div class="container">
        <div id="choose_date">
          <div id="choose_date_1">看診日期</div>
          <input type="date" v-model="clinic_date" class="my_input">
        </div>
        <div id="choose_time_period">
          <div id="choose_date_1">看診時段</div>
          <select v-model="time_period" class="my_input">
            <option value="時段" :disabled="disableOption1">時段</option>
            <option value="早">早</option>
            <option value="中">中</option>
            <option value="晚">晚</option>
          </select>
        </div>
      </div>
      <div>
        {{if_this_can_be_selected}}

      </div>
      <div v-show="show_clinic_info" id="clinic_info">
        看診醫師&nbsp;:&nbsp;{{clinic_doctor}}
        <br>
        目前掛號人數&nbsp;:&nbsp;{{total_appointment}}
        <br>
        診間時間&nbsp;:&nbsp;{{clinic_date}}&nbsp;{{time_period}}
        <br>
      </div>
      <br>
      <button v-show="button_visible2" @click="turn_next_page">我要預約</button>
    </div>
</template>

<style scoped>

#clinic_info{
  background-color: #00317B;
  color: white;
  width: 300px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
}

#choose_date_1{
  display: flex;
  justify-content: center;
  background-color: white;
  border-radius: 15px;
  font-size: 25px;
  width: 200px;
  height: 50px;
  align-items: center;
  color: #00317B;
}

#choose_date{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 45px;
}

#choose_time_period{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.container{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 23px;
}

table{
  width: 900px;
  height:300px;
  text-align: center;
  font-size: 20px;
  border:2px #7d7d7d solid;
  background-color: whitesmoke;
}

th,td,tr{
  border: 0.1px #7d7d7d solid;
  margin:-1px 0 0 -1px;
}

#gray_background {
  width: 1080px;
  height: 500px;
  background-color: #E1E1E1;
  border-radius: 20px;
  box-shadow: gray 2px 2px;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: auto;
  justify-content: center;
}

select{
  width:150px;
  height:75px;
  font-size: 25px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 15px;
  margin:30px 40px 40px 20px;
}
.my_input{
  width:500px;
  height:75px;
  font-size: 25px;
  background-color: #00317B;
  color:white;
  text-align: center;
  border-radius: 15px;
  margin:30px 40px 40px 20px;
}
</style>
