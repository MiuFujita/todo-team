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

document.addEventListener('DOMContentLoaded', function () {
    // Get the file input and image element
    const fileInput = document.getElementById('image');
    const previewImage = document.getElementById('previewImage');
    // Add an event listener to the file input
    fileInput.addEventListener('change', function () {
        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            // Read the file and set the src attribute when loaded
            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };
            // Read the selected file as a data URL
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
});