// チェックボックスの要素を取得
var checkboxes = document.querySelectorAll('input[type="checkbox"]');

// チェックボタンと内容を削除する関数
function removeCheckboxAndContent(checkbox) {
  // チェックボックスがチェックされているかどうかで削除切り替え
  if (checkbox.checked) {
    checkbox.closest('.checkbox').remove(); // チェックボックスと内容を含む要素を削除
  }
}

// 各チェックボックスに対応する削除処理を設定
for (var i = 0; i < checkboxes.length; i++) {
  var checkbox = checkboxes[i];
  checkbox.addEventListener('change', function() {
    removeCheckboxAndContent(this);
  });
}
