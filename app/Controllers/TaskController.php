<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TaskController extends BaseController

{
    protected $helpers = ['form'];
    protected TaskModel $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $data['tasks'] = $this->taskModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('tasks/index', $data);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $task = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];

        if (!$this->taskModel->insert($task)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->taskModel->errors());
        }

        return redirect()
            ->to('/tasks')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(int $id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            throw PageNotFoundException::forPageNotFound(
                'Tarefa não encontrada.'
            );
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update(int $id)
    {
        $task = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];

        if (!$this->taskModel->update($id, $task)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->taskModel->errors());
        }

        return redirect()
            ->to('/tasks')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function delete(int $id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            throw PageNotFoundException::forPageNotFound(
                'Tarefa não encontrada.'
            );
        }

        $this->taskModel->delete($id);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}