async function requestTodoList() {
    let url = "controller/todolist-data.php";
    let request = new Request(url, {method: 'POST'});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData) {
        let todoList = document.getElementById('todo-list');
        responseData.forEach((element) => {
            let li = document.createElement('li');
            li.innerHTML = element.title;
            console.log(li)
        });


    }else{
        let error = document.getElementById('error');
        error.textContent = "Erreur lors de la récupération des données"
    }
}

requestTodoList();





