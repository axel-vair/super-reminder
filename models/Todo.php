<?php

namespace Reminder\Models;

class Todo extends Model
{
    public function todoInsert($user_id, $title, $task, $createdAt)
    {
        $sql = "INSERT INTO todo (id, title, task, createdAt) VALUES (:user_id, :title, :task, :createdAt)";
        $sql_insert = $this->getPDO()->prepare($sql);
        $sql_insert->execute([
            'title' => htmlspecialchars($title),
            'description' => htmlspecialchars($task),
            'date' => htmlspecialchars($createdAt),
        ]);

        if ($sql_insert) {
            echo  json_encode(array("success" => 'ok'));
        } else {
            echo json_encode(array("success" => 'error insert'));
        }
    }

}