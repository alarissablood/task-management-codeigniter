# Task Management System

Sistema de gerenciamento de tarefas desenvolvido com PHP e CodeIgniter 4.

## Funcionalidades

- Criar tarefas
- Listar tarefas
- Editar tarefas
- Excluir tarefas
- Validar os formulários
- Proteger os formulários contra CSRF

## Tecnologias utilizadas

- PHP
- CodeIgniter 4
- PostgreSQL
- CodeIgniter Query Builder
- Bootstrap 5
- HTML e CSS

## Estrutura da tarefa

Cada tarefa possui:

- ID
- Título
- Descrição
- Status
- Data de criação
- Data de atualização

Os status disponíveis são:

- Pendente
- Em andamento
- Concluída

## Requisitos

Antes de executar o projeto, instale:

- PHP 8.1 ou superior
- Composer
- PostgreSQL
- Extensão PostgreSQL do PHP

## Como executar o projeto

Clone o repositório:

```bash
git clone URL_DO_REPOSITORIO
```

Entre na pasta:

```bash
cd sistema-tarefas
```

Instale as dependências:

```bash
composer install
```

Crie o arquivo `.env` a partir do arquivo `env`:

```bash
copy env .env
```

Configure o PostgreSQL no arquivo `.env`:

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

Crie no PostgreSQL um banco chamado:

```text
tarefas
```

Execute a migration:

```bash
php spark migrate
```

Inicie o servidor:

```bash
php spark serve
```

Abra no navegador:

```text
http://localhost:8080
```

## Segurança

O projeto utiliza:

- Query Builder para evitar SQL Injection
- `esc()` para proteção contra XSS
- CSRF nos formulários
- Lista de campos permitidos no Model
- Regras de validação do CodeIgniter

## Rotas

| Método | Endereço | Ação |
|---|---|---|
| GET | `/tasks` | Listar tarefas |
| GET | `/tasks/create` | Mostrar formulário |
| POST | `/tasks` | Criar tarefa |
| GET | `/tasks/{id}/edit` | Mostrar formulário de edição |
| POST | `/tasks/{id}` | Atualizar tarefa |
| POST | `/tasks/{id}/delete` | Excluir tarefa |