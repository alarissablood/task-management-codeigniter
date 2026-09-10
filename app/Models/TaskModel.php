<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'description',
        'status',
    ];

    protected $useTimestamps = true;

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'permit_empty|max_length[2000]',
        'status' => 'required|in_list[pending,in_progress,completed]',
    ];

    protected $validationMessages = [
    'title' => [
        'required' => 'O título é obrigatório.',
        'min_length' => 'O título deve ter pelo menos 3 caracteres.',
        'max_length' => 'O título não pode ultrapassar 255 caracteres.',
    ],
    'description' => [
        'max_length' => 'A descrição não pode ultrapassar 2000 caracteres.',
    ],
    'status' => [
        'required' => 'O status é obrigatório.',
        'in_list' => 'Selecione um status válido.',
    ],
    ];
}