<template>
    <div class="flex_container">
        <div id="gray_background">
            <div class="container">
                <div class="container">

                    <select id="select">
                        <option value="年">年</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                    <select id="select">
                        <option value="月">月</option>
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
                    <select id="select">
                        <option value="option1">周</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                </div>
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
            紅色按鈕：不開放該時段<br>
            藍色按鈕：開放時段
        </div>
    </div>
</template>

<script setup>

</script>


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
    justify-content: center;

}
</style>
