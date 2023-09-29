// Tags all buttons and forms
let todoForm = document.getElementById('todo-form');
let doneBtn = document.getElementsByClassName('done');
let deleteBtn = document.getElementsByClassName('delete-todo');

// Add event listener to the form
// Prevent default
// Create a new form data object and add the form to it as a parameter
// Create a new request object and add the url and method to it
// Fetch the request and wait for the response
// Parse the response as json
// Add the response to the DOM
// Call the getTodo function
// Parse the response as json
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

/**
 * Get all todos from the database and add them to the DOM as a list
 * Call the updateTodo and deleteTodo functions to add event listeners to the buttons
 * @returns {Promise<void>}
 */
async function getTodo() {
    let url = 'controller/todolist-data.php';
    let request = new Request(url);
    let response = await fetch(request);
    let responseData = await response.json();
    let todoList = document.getElementById('list-todo')
    let doneDiv = document.getElementById('done');
    todoList.innerHTML = '';
    doneDiv.innerHTML = '';
    responseData.forEach((todo) => {
        let li = document.createElement('li');
        let template = `
                <span class="todo-title">${todo.title}</span>
                <span class="todo-task">${todo.task}</span>
                <span class="todo-date">Créée le : ${todo.createdAt}</span>
                <div class="todo-btn">
                <span class="done" data-done="${todo.id}">Done</span>
                <span class="delete-todo" data-delete="${todo.id}">X</span>
                </div>
        `;

        if(todo.status === 1) {
            template += `<span>Terminée le : ${todo.updatedAt}</span>`;
            li.innerHTML = template;
            doneDiv.appendChild(li);


        }else{
            li.innerHTML = template;
            todoList.appendChild(li);
        }

        updateTodo();
        deleteTodo();

    })
}

/**
 * Delete a todo from the database and call the getTodo function to update the DOM
 *
 * @returns {Promise<void>}
 */
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

/**
 * Update a todo in the database and call the getTodo function to update the DOM
 *
 */
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

