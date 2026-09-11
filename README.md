# Gerenciador de Tarefas

Sistema de gerenciamento de tarefas desenvolvido com PHP e CodeIgniter 4.

## Funcionalidades

- Criar tarefas
- Listar tarefas
- Editar tarefas
- Excluir tarefas
- Validar os formulários
- Proteger os formulários contra CSRF

Cada tarefa possui título, descrição e um dos seguintes status:

- Pendente
- Em andamento
- Concluída

## Tecnologias

- PHP
- CodeIgniter 4
- PostgreSQL
- CodeIgniter Query Builder
- Bootstrap 5

## Como executar

### 1. Clone o repositório

```bash
git clone https://github.com/alarissabloood/task-management-codeigniter.git
```

### 2. Entre na pasta do projeto

```bash
cd task-management-codeigniter
```

### 3. Instale as dependências

```bash
composer install
```

### 4. Crie o arquivo `.env`

No Windows:

```bash
copy env .env
```

No Linux ou macOS:

```bash
cp env .env
```

### 5. Configure o PostgreSQL

Crie um banco de dados chamado `tarefas` e configure o arquivo `.env`:

```ini
database.default.hostname = localhost
database.default.database = tarefas
database.default.username = postgres
database.default.password = sua_senha
database.default.DBDriver = Postgre
database.default.DBPrefix =
database.default.port = 5432
database.default.charset = UTF8
database.default.DBCollat =
```

### 6. Execute as migrations

```bash
php spark migrate
```

### 7. Inicie o servidor

```bash
php spark serve
```

Acesse:

```text
http://localhost:8080
```

## API REST — bônus

| Método | Endpoint | Ação |
|---|---|---|
| GET | `/api/tasks` | Listar tarefas |
| GET | `/api/tasks/{id}` | Consultar uma tarefa |
| POST | `/api/tasks` | Criar uma tarefa |
| PUT | `/api/tasks/{id}` | Atualizar uma tarefa |
| DELETE | `/api/tasks/{id}` | Excluir uma tarefa |

Exemplo de JSON para criação ou atualização:

```json
{
  "title": "Estudar CodeIgniter",
  "description": "Finalizar o teste de desenvolvimento.",
  "status": "in_progress"
}
```

Valores permitidos para `status`:

- `pending`
- `in_progress`
- `completed`