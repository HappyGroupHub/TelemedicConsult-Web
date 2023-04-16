<script setup>

import Banner from "./components/banner_patient.vue";
import bar from "./components/bar.vue"
import {computed, ref, watch} from "vue";

const select1 = ref('年');
const select2 = ref('月');
const select3 = ref('周');
const disableOption1 = true;
const showConfirm = ref(false);


watch([select1, select2, select3], (newValue, oldValue) => {
    if (selectionsComplete.value) {
        submitSelections();
    }
});

const selectionsComplete = computed(() =>
    select1.value !== '年' &&
    select2.value !== '月' &&
    select3.value !== '周'
);

function submitSelections() {
    showConfirm.value = true;
    alert('將要選擇' + select1.value + '年' + select2.value + '月第' + select3.value + '周');
}

</script>
<template>
    <bar/>
    <banner/>
    <div class="flex_container">
        <div id="gray_background">
            <div class="container">

                <select v-model="select1">
                    <option value="年" :disabled="disableOption1">年</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
                <select v-model="select2">
                    <option value="月" :disabled="disableOption1">月</option>
                    <option value="1">1月</option>
                    <option value="2">2月</option>
                    <option value="3">3月</option>
                    <option value="4">4月</option>
                    <option value="5">5月</option>
                    <option value="6">6月</option>
                    <option value="7">7月</option>
                    <option value="8">8月</option>
                    <option value="9">9月</option>
                    <option value="10">10月</option>
                    <option value="11">11月</option>
                    <option value="12">12月</option>
                </select>
                <select v-model="select3">
                    <option value="周" :disabled="disableOption1">周</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

            </div>
            <table align="center">
                <tr>
                    <th width="100"></th>
                    <th>一</th>
                    <th>二</th>
                    <th>三</th>
                    <th>四</th>
                    <th>五</th>
                    <th>六</th>
                    <th>日</th>
                </tr>
                <tr>
                    <th>早</th>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                </tr>
                <tr>
                    <th>中</th>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                </tr>
                <tr>
                    <th>晚</th>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot"></button>
                    </td>
                    <td>
                        <button id="dot" style="background-color: #EA0000; cursor: not-allowed"></button>
                    </td>
                </tr>
            </table>
        </div>
        <div id="redblue">
          <div id="redblue1">
            <div id="color_blue"></div>&nbsp;開放時段
          </div>
          <div id="redblue1">
            <div id="color_red"></div>&nbsp;不開放該時段
          </div>
        </div>
    </div>
</template>


<style scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.flex_container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

table {
    width: 900px;
    height: 300px;
    text-align: center;
    font-size: 20px;
    border: 2px #7d7d7d solid;
    background-color: whitesmoke;
}

th, td, tr {
    border: 0.1px #7d7d7d solid;
    margin: -1px 0 0 -1px;
}

#gray_background {
    width: 1080px;
    height: 500px;
    background-color: #E1E1E1;
    border-radius: 20px;
    box-shadow: gray 2px 2px;
    margin: 10px 5px 15px 20px;
}

select {
    width: 150px;
    height: 75px;
    font-size: 25px;
    background-color: #00317B;
    color: white;
    text-align: center;
    border-radius: 15px;
    margin: 30px 40px 40px 20px;
}


#dot {
    background-color: #1a69a4;
    width: 20px;
    height: 20px;
    border-radius: 100px;
}

#redblue {
    background-color: #FFFFD4;
    border-radius: 50px;
    width: 330px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

#redblue1{
  display: flex;
  justify-content: center;
  flex-direction: row;
}

#color_red{
  width: 20px;
  height: 20px;
  background-color: #EA0000;
}
#color_blue{
  width: 20px;
  height: 20px;
  background-color: #1a69a4;
}
</style>
