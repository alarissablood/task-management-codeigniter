<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciador de Tarefas</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #ffffff;
            color: #000000;
        }

        .main-header {
            background-color: #0000FF;
            color: #ffffff;
        }

        .btn-purple {
            background-color: #8A00C4;
            border-color: #8A00C4;
            color: #ffffff;
        }

        .btn-purple:hover {
            background-color: #6d009b;
            border-color: #6d009b;
            color: #ffffff;
        }

        .table thead th {
            background-color: #8A00C4;
            color: #ffffff;
        }

        .title-detail {
            border-left: 5px solid #8A00C4;
            padding-left: 12px;
        }
    </style>
</head>

<body>
    <header class="main-header py-4 shadow-sm">
        <div class="container">
            <h1 class="mb-0">Gerenciador de Tarefas</h1>
        </div>
    </header>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-detail mb-0">Minhas tarefas</h2>

            <a href="/tasks/create" class="btn btn-purple">
                Nova tarefa
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (empty($tasks)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        Nenhuma tarefa cadastrada.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <td><?= esc($task['id']) ?></td>
                                        <td><?= esc($task['title']) ?></td>
                                        <td><?= esc($task['description']) ?></td>
                                        <td>
                                            <?php
                                                $statusLabels = [
                                                    'pending' => 'Pendente',
                                                    'in_progress' => 'Em andamento',
                                                    'completed' => 'Concluída',
                                                ];
                                            ?>

                                            <?= esc(
                                                $statusLabels[$task['status']]
                                                ?? $task['status']
                                            ) ?>
                                        </td>

                                        <td class="text-end">
                                            <a
                                                href="/tasks/<?= esc($task['id']) ?>/edit"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Editar
                                            </a>

                                            <form
                                                action="/tasks/<?= esc($task['id']) ?>/delete"
                                                method="post"
                                                class="d-inline"
                                            >
                                                <?= csrf_field() ?>

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deseja excluir esta tarefa?')"
                                                >
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>