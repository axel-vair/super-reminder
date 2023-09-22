async function requestTodoList() {
    let url = "controller/todolist-data.php";
    let request = new Request(url, {method: 'POST'});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData) {
        let todoList = document.getElementById('list-todo');
        Object.values(responseData).forEach(val =>
            {
                    let li = document.createElement('li');
                    let template = `<div class="todo-item">
                                        <div class="todo-item-title">   
                                            <span class="todo-item-title">${val.title}</span>
                                            <span class="todo-item-task">${val.task}</span>
                                            <span class="todo-item-date">${val.createdAt}</span>
                                        </div>
                                        <div class="todo-item-actions">
                                            <button class="todo-item-actions-button todo-item-actions-button--done" data-id="${val.id}">Fait</button>
                                            <button class="todo-item-actions-button todo-item-actions-button--delete" data-id="${val.id}">Supprimer</button>
                                        </div>
                                    </div>`;
                    li.innerHTML = template;
                    todoList.appendChild(li);


            });



    }else{
        let error = document.getElementById('error');
        error.textContent = "Erreur lors de la récupération des données"
    }
}

requestTodoList();





