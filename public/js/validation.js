let text = document.querySelector("#password");
let message = document.querySelector(".validation-message"); //メッセージ表示用のdiv取得

function validate(str){
    return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/.test(str);
}

text.addEventListener('input', function (event) {
    let text = event.target.value;
    if(text.length < 8) {
        message.textContent = "英数字各1文字以上を含む、8文字以上で入力してください";
    } else if (!validate(text)) {
        message.textContent = "英数字各1文字以上を含むようにしてください";
    } else {
        message.textContent = "";
    }
});



