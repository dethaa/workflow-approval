# Workflow Approval System

This project is a Workflow Approval System built with Laravel.

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone the Repository
```sh
git clone https://github.com/your-repo/workflow-approval.git
cd workflow-approval
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Copy Environment File
```sh
cp .env.example .env
```
Update the `.env` file with your database and other configurations.

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Run Migrations & Seed Database
```sh
php artisan migrate --seed
```

### 6. Start Development Server
```sh
php artisan serve
```

Now, you can access the application at `http://127.0.0.1:8000`.
