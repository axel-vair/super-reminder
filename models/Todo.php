<?php

require_once "Connect.php";

class Todo extends Connect{
    
        /**
     * Function to insert a new todo in the database with the user id
     * @param $user_id
     * @param $title
     * @param $task
     * @return false|string
     */
    public function todoInsert($user_id, $title, $task)
    {
        $sql = "INSERT INTO todo (user_id, title, task, createdAt, status) VALUES (:user_id, :title, :task, NOW(), 0)";
        $sql_insert = $this->db->prepare($sql);
        $sql_insert->execute([
            'user_id' => $user_id,
            'title' => $title,
            'task' => $task
        ]);

        if ($sql_insert) {
            return  json_encode(["success" => 'ok']);
        } else {
            return json_encode(["success" => 'error insert']);
        }
    }

    /**
     *
     * Function to display all todo from the database with the user id
     * @param $user_id
     * @return false|string
     */
    public function displayTodo($user_id){
        $sql = "SELECT * FROM todo WHERE user_id = :user_id";
        $sql_select = $this->db->prepare($sql);
        $sql_select->execute([
            'user_id' => $user_id
        ]);
        // var_dump("JE RENTRE DANS LA CLASSE ?");
        $result = $sql_select->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    /**
     *
     * Function to delete a todo from the database with the todo id
     * @param $id_todo
     * @return false|string
     */
    public function deleteTodo($id_todo){
        $sql = "DELETE FROM todo WHERE id = :id_todo";
        $sql_delete = $this->db->prepare($sql);
        $sql_delete->execute([
            'id_todo' => $id_todo
        ]);
        return json_encode(["suppress" => 'ok']);

    }

    /**
     * Function to update a todo from the database with the todo id
     * @param $id_todo
     * @return false|string
     */
    public function updateTodo($id_todo, $updatedAt){
        $sql = "UPDATE todo SET status = 1, updatedAt = :updatedAt WHERE id = :id_todo";
        $sql_update = $this->db->prepare($sql);
        $sql_update->execute([
            'id_todo' => $id_todo,
            'updatedAt' => $updatedAt
        ]);
        return json_encode(["update" => 'ok']);
    }
}