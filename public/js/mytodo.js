// mytodo.js ファイル
function destroyTodo(checkbox, destroyUrl) {
    if (checkbox.checked) {
      var todoElement = checkbox.closest('.checkbox');
      todoElement.parentNode.removeChild(todoElement);
  
      var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
  
      fetch(destroyUrl, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('ネットワークのレスポンスが正しくありませんでした');
          }
          return response.json();
        })
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('フェッチ操作で問題が発生しました:', error);
        });
    }
  }
  function destroyAdd(checkbox, deleteUrl) {
    if (checkbox.checked) {
        var confirmation = confirm('ToDoを非表示にしますか？');
        if (confirmation) {
            // 非同期リクエスト
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => response.json())
            .then(data => {
                // レスポンスをログに出力（必要に応じて処理を追加）
                console.log(data);

                // 非表示にする
                var addElement = checkbox.closest('.mylist-box');
                if (addElement) {
                    addElement.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            checkbox.checked = false;
        }
    }
}

  
