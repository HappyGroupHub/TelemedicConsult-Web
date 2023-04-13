<template xmlns="http://www.w3.org/1999/html">
    <div id="flex_container">
        <div id="input_base">
            <div id="inner_template">
                <h2 style="text-align: left">登入系統</h2>
                <h4 style="text-align: left">帳號</h4>
                <input id="id" type="text"/>
                <h4 style="text-align: left">密碼</h4>
                <input id="birthday" type="password"/>
                <div id="inner_btn">
                    <button id="submit"
                            style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">
                        登入
                    </button>
                    <button id="submit"
                            style="width:80px;height:40px;background-color: #00317B;color:white;text-align: center;border:0">
                        返回
                    </button>
                </div>
            </div>

            <p></p>

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
}

#input_base {
    width: 400px;
    background-color: #E1E1E1;
    height: 350px;
    padding: 30px;
    text-align: center;
    border-radius: 30px;
    margin-left: 20px;
    box-shadow: gray 2px 2px;
    margin-top: 0;
    margin-bottom: 5px;

}

#submit {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    font-size: 16px;
    box-shadow: gray 2px 2px;
    border: 0;
    border-radius: 7px;
    margin: 20px 30px 10px 20px;
}

#inner_template {
    justify-content: center;
}

#id {
    justify-content: center;
}

</style>
