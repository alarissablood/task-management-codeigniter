<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nova tarefa</title>

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

        .form-card {
            border-top: 5px solid #8A00C4;
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

        .form-control:focus,
        .form-select:focus {
            border-color: #8A00C4;
            box-shadow: 0 0 0 0.25rem rgba(138, 0, 196, 0.20);
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card form-card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="mb-4">Criar nova tarefa</h2>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <strong>Verifique os campos:</strong>

                                <ul class="mb-0 mt-2">
                                    <?php foreach (
                                        session()->getFlashdata('errors')
                                        as $error
                                    ): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="/tasks" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    Título
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    value="<?= esc(old('title')) ?>"
                                    maxlength="255"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    Descrição
                                </label>

                                <textarea
                                    class="form-control"
                                    id="description"
                                    name="description"
                                    rows="5"
                                    maxlength="2000"
                                ><?= esc(old('description')) ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label">
                                    Status
                                </label>

                                <select
                                    class="form-select"
                                    id="status"
                                    name="status"
                                    required
                                >
                                    <option
                                        value="pending"
                                        <?= old('status', 'pending') === 'pending'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Pendente
                                    </option>

                                    <option
                                        value="in_progress"
                                        <?= old('status') === 'in_progress'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Em andamento
                                    </option>

                                    <option
                                        value="completed"
                                        <?= old('status') === 'completed'
                                            ? 'selected'
                                            : '' ?>
                                    >
                                        Concluída
                                    </option>
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button
                                    type="submit"
                                    class="btn btn-purple"
                                >
                                    Salvar tarefa
                                </button>

                                <a href="/tasks" class="btn btn-outline-dark">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>