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
            echo  json_encode(["success" => 'ok']);
        } else {
            echo json_encode(["success" => 'error insert']);
        }
    }

    public function displayTodo(){
        $sql = "SELECT * FROM todo WHERE user_id = :user_id";
        $sql_select = $this->getPDO()->prepare($sql);
        $sql_select->execute([
            'user_id' => $_SESSION['id']
        ]);
        $result = $sql_select->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
}

