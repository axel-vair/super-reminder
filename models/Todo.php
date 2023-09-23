<?php

namespace Reminder\Models;

use PDO;

class Todo extends Model
{
    public function todoInsert($user_id, $title, $task)
    {
        $sql = "INSERT INTO todo (user_id, title, task, createdAt, status) VALUES (:user_id, :title, :task, NOW(), 0)";
        $sql_insert = $this->getPDO()->prepare($sql);
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

    public function displayTodo($user_id){
        $sql = "SELECT * FROM todo WHERE user_id = :user_id";
        $sql_select = $this->getPDO()->prepare($sql);
        $sql_select->execute([
            'user_id' => $user_id
        ]);
        $result = $sql_select->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    public function deleteTodo($id_todo){
        $sql = "DELETE FROM todo WHERE id = :id_todo";
        $sql_delete = $this->getPDO()->prepare($sql);
        $sql_delete->execute([
            'id_todo' => $id_todo
        ]);
        return json_encode(["suppress" => 'ok']);

    }

    public function updateTodo($id_todo){
        $sql = "UPDATE todo SET status = 1 WHERE id = :id_todo";
        $sql_update = $this->getPDO()->prepare($sql);
        $sql_update->execute([
            'id_todo' => $id_todo
        ]);
        return json_encode(["update" => 'ok']);
    }
}


