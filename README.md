# Task Management System

A task management system developed with PHP and CodeIgniter 4.

## Features

- Create tasks
- List all tasks
- Edit existing tasks
- Delete tasks
- Validate form data
- Protect forms against CSRF attacks

## Technologies

- PHP
- CodeIgniter 4
- PostgreSQL
- CodeIgniter Query Builder
- Bootstrap 5
- HTML and CSS

## Task Structure

Each task contains:

- ID
- Title
- Description
- Status
- Creation date
- Update date

Available statuses:

- Pending
- In progress
- Completed

## Requirements

Before running the project, install:

- PHP 8.1 or higher
- Composer
- PostgreSQL
- PHP PostgreSQL extension

## Installation

Clone the repository:

```bash
git clone https://github.com/alarissabloood/task-management-codeigniter.git
```

Enter the project directory:

```bash
cd task-management-codeigniter
```

Install the dependencies:

```bash
composer install
```

Create the `.env` file from the `env` template:

```bash
copy env .env
```

Configure the PostgreSQL connection in `.env`:

```ini
database.default.hostname = localhost
database.default.database = tarefas
database.default.username = postgres
database.default.password = your_password
database.default.DBDriver = Postgre
database.default.DBPrefix =
database.default.port = 5432
database.default.charset = UTF8
database.default.DBCollat =
```

Create a PostgreSQL database named:

```text
tarefas
```

Run the migrations:

```bash
php spark migrate
```

Start the development server:

```bash
php spark serve
```

Open the application:

```text
http://localhost:8080
```

## Security

The project uses:

- Query Builder to prevent SQL Injection
- `esc()` to help prevent XSS
- CSRF protection on forms
- Allowed fields in the Model
- CodeIgniter validation rules

## Routes

| Method | Route | Action |
|---|---|---|
| GET | `/tasks` | List tasks |
| GET | `/tasks/create` | Display the creation form |
| POST | `/tasks` | Create a task |
| GET | `/tasks/{id}/edit` | Display the editing form |
| POST | `/tasks/{id}` | Update a task |
| POST | `/tasks/{id}/delete` | Delete a task |

## Interface

## REST API

The project provides a REST API that returns JSON responses.

### Endpoints

| Method | Endpoint | Action |
|---|---|---|
| GET | `/api/tasks` | List all tasks |
| GET | `/api/tasks/{id}` | Get a task by ID |
| POST | `/api/tasks` | Create a task |
| PUT | `/api/tasks/{id}` | Update a task |
| DELETE | `/api/tasks/{id}` | Delete a task |

### Request Body

Use the following JSON structure for `POST` and `PUT` requests:

```json
{
    "title": "API task",
    "description": "Task created using the REST API.",
    "status": "in_progress"
}
```

Available status values:

- `pending`
- `in_progress`
- `completed`

The API can be tested with Postman using:

```text
http://localhost:8080/api/tasks
```Ss

The application interface is available in Portuguese.