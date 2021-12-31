<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function getAllTasks();
    public function getTaskById($orderId);
    public function deleteTask($orderId);
    public function createTask(array $orderDetails);
    public function updateTask($taskId, array $newDetails);
}
