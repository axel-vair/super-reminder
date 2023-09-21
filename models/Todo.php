<?php

namespace Reminder\Models;

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
            echo  json_encode(array("success" => 'ok'));
        } else {
            echo json_encode(array("success" => 'error insert'));
        }
    }
}

