<br />
<div align="center">
  <a href="https://github.com/ExpRam/McAutoDonate">
    <img src="images/logo.jpeg" alt="Logo" width="300" height="300">
  </a>

<h3 align="center">McAutoDonate</h3>

  <p align="center">
    Система Авто Доната на PHP Laravel
    <br />
    McAutoDonate использует <a href="https://qiwi.com/">qiwi.com</a> в качестве платёжной системы
    <br />
    <a href="https://github.com/ExpRam/McAutoDonate/issues">Сообщить о баге</a>
    ·
    <a href="https://github.com/ExpRam/McAutoDonate/pulls">Подать идею</a>
  </p>
</div>

### Сделано с использованием

* [![Laravel][Laravel.com]][Laravel-url]
* [![JQuery][JQuery.com]][JQuery-url]
* [![Tailwindcss][Tailwindcss.com]][Tailwindcss-url]

### Установка

Вот как можно запустить проект локально:
1. Скопируйте репозиторий
    ```sh
    git clone https://github.com/ExpRam/McAutoDonate.git
    ```

2. Перейдите в корневую директорию проекта:
    ```sh
    cd McAutoDonate
    ```

3. Скопируйте файл .env.example в файл .env
    ```sh
    cp .env.example .env
    ```

4. Откройте файл `.env`
    - установите данные для БД:
        (`DB_DATABASE=mcautodonate`, `DB_USERNAME=root`, `DB_PASSWORD=`)

5. Установите все PHP зависимости
    ```sh
    composer install
    ```
6. Установите front-end зависимости
    ```sh
    npm install
    ```

7. Запустите команду установки
    ```sh
    php artisan mcautodonate:setup
    ```
    
8. Запустите сервер
    ```sh
    php artisan serve
    ```  

9. Перейдите на `localhost:8000`

### Когда сервер запускается в первый раз

При первом запуске сервера необходимо ввести учетные данные для подключения к rcon и учетные данные платежной системы qiwi (SECRET_KEY, THEME_CODE).

При создании пары ключей на https://qiwi.com/p2p-admin/api вы не можете указать локальный ip-адрес.

### Админ панель

Вы можете войти в админ панель по адресу yourdomain.com/admin/login

<a href="https://github.com/ExpRam/McAutoDonate/blob/main/README.md">Eng Version</a>

[Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-0b1120?style=for-the-badge&logo=tailwindcss&logoColor=white
[Tailwindcss-url]: https://tailwindcss.com
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
