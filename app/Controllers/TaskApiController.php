<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\RESTful\ResourceController;

class TaskApiController extends ResourceController
{
    protected $modelName = TaskModel::class;
    protected $format = 'json';

    public function index()
    {
        $tasks = $this->model
            ->orderBy('id', 'DESC')
            ->findAll();

        return $this->respond($tasks);
    }

    public function show($id = null)
    {
        $task = $this->model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found.');
        }

        return $this->respond($task);
    }

    public function create()
    {
        $data = $this->request->getJSON(true) ?? [];

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors(
                $this->model->errors()
            );
        }

        $task = $this->model->find(
            $this->model->getInsertID()
        );

        return $this->respondCreated(
            $task,
            'Task created successfully.'
        );
    }

    public function update($id = null)
    {
        $task = $this->model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found.');
        }

        $data = $this->request->getJSON(true) ?? [];

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors(
                $this->model->errors()
            );
        }

        return $this->respond(
            $this->model->find($id),
            200,
            'Task updated successfully.'
        );
    }

    public function delete($id = null)
    {
        $task = $this->model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found.');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'message' => 'Task deleted successfully.',
        ]);
    }
}