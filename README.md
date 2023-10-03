# Booking Flights

## Live Demo [Laravel Booking Flights](https://booking-flights.pablomazo.dev/)

### Paso a paso

### Clonar repositorio

-   git clone git@github.com:immallet/laravel-booking-flights.git | [Como clonar un repositorio](https://docs.github.com/es/repositories/creating-and-managing-repositories/cloning-a-repository)

##### Instalar dependecias del sistema

-   sudo apt-get update
-   sudo apt install php8.1-cli php8.1-fpm php8.1-xml php8.1-mbstring php8.1-mysql php8.1-zip zip unzip
-   php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
-   php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
-   php composer-setup.php --filename=composer
-   php -r "unlink('composer-setup.php');"
-   sudo ln -s ~/$PATH/composer /usr/local/bin/composer

##### Instalar Mysql

-   sudo apt install mysql-server
-   sudo mysql
-   ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
-   sudo mysql_secure_installation
-   mysql -u root -p
    -   create database bookingflights;

##### [Guia instalacion MySql](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04)

##### Instalar depencias del proyecto

-   cd laravel-booking-flights
-   composer install
-   npm install
-   cat .env.example > .env (update enviroment variables)
-   php artisan key:generate --ansi
-   php artisan migrate --seed
-   php artisan serve
-   npm run dev

##### DB Diagram

![DB Diagram Image](https://booking-flights.pablomazo.dev/Booking-flights-Diagram.png "Diagram").
