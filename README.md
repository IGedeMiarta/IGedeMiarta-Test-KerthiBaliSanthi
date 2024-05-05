# Laravel Project Installation

This is a step-by-step guide to installing a Laravel project (Laravel v11)
By:

-   Name : I Gede Miarta Yasa
-   Mail : [miarta.igede@gamil.com](mailto:miarta.igede@gamil.com)
-   Phone : [+62815 2996 3914](https://wa.me/6281529963914)
-   More About Me? Visit [Personal Portofolio](https://igede-miarta.testmaster.site/)

## Requirements

Make sure your system meets the following requirements before installing the Laravel project:

-   PHP version ^8.2
-   Composer (https://getcomposer.org)
-   Livewire (https://livewire.laravel.com)

## Installation Steps

1. **Clone the Project**

    ```bash
    git clone https://github.com/IGedeMiarta/IGedeMiarta-Test-KerthiBaliSanthi.git
    ```

2. **Navigate to the Project Directory**

    ```bash
    cd IGedeMiarta-Test-KerthiBaliSanthi
    ```

3. **Copy .env.exampe to .env**
    ```bash
    cp .env.example .env
    ```
4. **Generete Key**
    ```bash
    php artisan key:generate
    ```
5. **Install Depedency**
    ```bash
    composer install
    ```
6. **Change Database Name**

    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=testphp
        DB_USERNAME=root
        DB_PASSWORD=
    ```

7. **Run Database Migrations**
    ```bash
    php artisan migrate
    ```
    or you can migrate with flag `seed`, and 20 book fake data will insert to database.
    ```bash
    php artisan migrate --seed
    ```
8. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    The Laravel development server will start at http://localhost:8000 by default.

9. **Access Your Application**

    Open your web browser and navigate to http://localhost:8000 to access your Laravel application.

## Additional Information

-   For more details please contact me at [Mail](mailto:miarta.igede@gamil.com) or [Whatsapp](wa.me/628152263914)
-   For more information on Laravel, visit [Laravel Official Documentation](https://laravel.com/docs).
-   For troubleshooting and additional help, refer to the [Laravel Community Forum](https://laracasts.com/discuss).
