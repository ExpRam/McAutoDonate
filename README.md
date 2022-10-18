<br />
<div align="center">
  <a href="https://github.com/ExpRam/McAutoDonate">
    <img src="images/logo.jpeg" alt="Logo" width="300" height="300">
  </a>

<h3 align="center">McAutoDonate</h3>

  <p align="center">
    Auto Donate System For Minecraft on PHP Laravel 
    <br />
    McAutoDonate uses <a href="https://qiwi.com/">qiwi.com</a> as a payment system
    <br />
    <a href="https://github.com/ExpRam/McAutoDonate/issues">Report Bug</a>
    ·
    <a href="https://github.com/ExpRam/McAutoDonate/pulls">Request Feature</a>
  </p>
</div>

### Built With

* [![Laravel][Laravel.com]][Laravel-url]
* [![JQuery][JQuery.com]][JQuery-url]
* [![Tailwindcss][Tailwindcss.com]][Tailwindcss-url]

### Installation

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/ExpRam/McAutoDonate.git
    ```

2. Go into the project root directory
    ```sh
    cd McAutoDonate
    ```

3. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```

4. Go to `.env` file 
    - set database credentials:
        (`DB_DATABASE=mcautodonate`, `DB_USERNAME=root`, `DB_PASSWORD=`)

5. Install PHP dependencies 
    ```sh
    composer install
    ```
6. install front-end dependencies
    ```sh
    npm install
    ```

7. Run setup command
    ```sh
    php artisan mcautodonate:setup
    ```
    
8. Run server 
    ```sh
    php artisan serve
    ```  

9. Visit `localhost:8000`

### When the server is started for the first time

When starting the server for the first time, you need to enter the credentials for connecting to the rcon and the credentials from the qiwi payment system (SECRET_KEY, THEME_CODE)

When you create a key pair at https://qiwi.com/p2p-admin/api you can not specify a local ip-address

### Admin panel

You can log in to the admin panel at yourdomain.com/admin/login

<a href="https://github.com/ExpRam/McAutoDonate/blob/main/README_RU.md">Ru Version</a>

[Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-0b1120?style=for-the-badge&logo=tailwindcss&logoColor=white
[Tailwindcss-url]: https://tailwindcss.com
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
