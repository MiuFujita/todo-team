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
  function destroyAdd(checkbox) {
    if (checkbox.checked) {
        var todoId = checkbox.dataset.todoId;
        var deleteUrl = '/add/delete/' + todoId;
  
        var todoElement = checkbox.closest('.checkbox');
        todoElement.parentNode.removeChild(todoElement);
  
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
  
        fetch(deleteUrl, {
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
  
  // チェックボックスの変更を監視
  $(document).on('change', '.todo-checkbox', function() {
    destroyAdd(this);
  });

