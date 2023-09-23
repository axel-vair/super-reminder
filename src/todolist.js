let todoForm = document.getElementById('todo-form');
let doneBtn = document.getElementsByClassName('done');
let deleteBtn = document.getElementsByClassName('delete-todo');

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
            let template = `
                    <span>${todo.title}</span>
                    <span>${todo.task}</span>
                    <span>${todo.createdAt}</span>
                    <span class="done" data-done="${todo.id}">Done</span>
                    <span class="delete-todo" data-delete="${todo.id}">X</span>
            `;
            li.innerHTML = template;
            todoList.appendChild(li);
            updateTodo();
            deleteTodo();


        })
}

async function deleteTodo() {
    for(let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].addEventListener('click', async (e) => {

            let todoId = e.target.getAttribute('data-delete');
            let url = 'controller/todolist-delete.php?delete=' + todoId;
            let request = new Request(url, {method: 'DELETE'});
            let responseData = await fetch(request);
            getTodo();
            return responseData;
        })
    }
}
function updateTodo() {
    for (let i = 0 ; i < doneBtn.length; i++) {
        doneBtn[i].addEventListener('click',  async (e) => {
            {
                let todoId = e.target.getAttribute('data-done');
                let url = 'controller/todolist-update.php?update=' + todoId;
                let request = new Request(url, {method: 'PUT'});
                let response = await fetch(request);
                let responseData = await response.text();
                getTodo();
                return responseData;

            }
        })
    }
}
getTodo();

