# Todo List Application
This Todo List application is built using Laravel 10, with Laravel Breeze Blade starter kit. The application has only one user who manages their todo lists. The application provides CRUD features for todo lists, login, register, and allows users to update their profiles. MySQL database is used for data storage.

## Setup Project

1. **Clone Repository**
  Clone this repository into your local directory:
   ```bash
   git clone https://github.com/shodiqbasiru/Todo-List-Application.git)https://github.com/shodiqbasiru/Todo-List-Application.git
   ```
2. **Navigate to Project Directory**
   ```bash
   cd nama-proyek
   ```
3. **Install Composer Dependencies**
   ```bash
   composer install
   ```
4. **Create a Copy of .env File**
   ```bash
   cp .env.example .env
   ```
5. **Generate App Key**
   ```bash
   php artisan key:generate
   ```
6. **Configure Database**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna
    DB_PASSWORD=kata_sandi
    ```
7. **Migrate Database**
    ```bash
    php artisan migrate
    ```
8. **Install JavaScript Dependencies**
    ```bash
    npm install
    ```
9. **Configure Port**
    Make sure the port configuration in .env app URL points to the backend port.
    ```bash
    APP_URL=http://localhost:8000
    ```
10. **Compile Assets**
    If you modify JavaScript or CSS files, you need to compile them:
    ```bash
    npm run dev
    ```
11. **Run Local Server**
    ```bash
    php artisan serve
    ```
