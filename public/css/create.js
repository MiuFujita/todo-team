function validateForm(event) {
    var dayChecked = false;

    // dayが選択されているか確認
    var dayRadios = document.querySelectorAll('[name="day"]');
    dayRadios.forEach(function (radio) {
        if (radio.checked) {
            dayChecked = true;
        }
    });

    // dayが選択されていないのにshareがチェックされている場合はエラーメッセージ表示
    var shareCheckbox = document.querySelector('[name="share"]');
    var errorMessage = document.getElementById('error-message');
    
    if (!dayChecked && shareCheckbox && shareCheckbox.checked) {
        errorMessage.textContent = '期限を選択してください。';
        event.preventDefault(); // フォームを送信しない
    } else {
        errorMessage.textContent = ''; // バリデーションが成功した場合はエラーメッセージをクリア
    }
}

// フォームのsubmitイベントに対してvalidateForm関数を紐付ける
document.getElementById('todoForm').addEventListener('submit', function(event) {
    validateForm(event);
});
