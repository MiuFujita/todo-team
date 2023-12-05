
// mytodo.js ファイル
function destroyTodo(checkbox, destroyUrl) {
  if (checkbox.checked) {
      var confirmation = confirm('ToDoを削除しますか？');
      if (confirmation) {
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
                  throw new Error('Network response was not ok');
              }
              return response.json();
          })
          .then(data => {
              console.log(data);
          })
          .catch(error => {
              console.error('There has been a problem with your fetch operation:', error);
          });
      } else {
          checkbox.checked = false;
      }
  }
}
