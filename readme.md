Quick Installation

git clone https://github.com/man9035206/technosoft_test.git

cd technosoft_test

composer install

php artisan migrate

php artisan serve

Rename .env.example to .env and database configuration

Requirement:
PHP 7.0.0 or Above.

Example Commands to run

php artisan empdata:SET 2 JackPeter 191.168.10.10

php artisan empdata:GET 191.168.10.10

php artisan empdata:UNSET 191.168.10.11


php artisan empwebhistory:SET  191.168.10.10 http://127.0.0.1:8000/employees_web_history/2 2020-01-02

php artisan empwebhistory:GET 191.168.12.10

php artisan empwebhistory:UNSET 191.168.10.10



