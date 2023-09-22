let btnAddTodo = document.getElementById('submit');
let todoForm = document.getElementById('todo-form');
if(todoForm){
    todoForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        let form = new FormData(e.target);
        let url = 'controller/todolist-add.php';
        let request = new Request(url, {method: 'POST', body: form});
        let response = await fetch(request);
        getTodo();
        let responseData = await response.json();
    })
}

async function getTodo() {
        let url = 'controller/todolist-data.php';
        let request = new Request(url);
        let response = await fetch(request);
        let responseData = await response.json();

        let todoList = document.getElementById('list-todo')
        todoList.innerHTML = '';
        responseData.forEach((todo) => {
            let li = document.createElement('li');
            li.textContent = todo.title;
            todoList.appendChild(li);
        })

    }

getTodo();


