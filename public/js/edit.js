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

// 新しい画像のプレビュー機能を追加
function previewImage(input) {
    var preview = document.getElementById('image-preview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

// フォームのsubmitイベントに対してvalidateForm関数を紐付ける
document.getElementById('todoForm').addEventListener('submit', function(event) {
    validateForm(event);
});

// 新しい画像の選択が変更されたときにプレビュー機能を呼び出す
var imageInput = document.getElementById('image');
if (imageInput) {
    imageInput.addEventListener('change', function() {
        previewImage(this);
    });
}

// windowのloadイベントリスナー内に全てのコードを配置する
window.addEventListener('load', function() {
    // function validateForm...
    // ...
});
