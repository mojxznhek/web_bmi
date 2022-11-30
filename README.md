download https://github.com/mojxznhek/bmi/archive/refs/heads/main.zip
extract folder to d:

or 
 
git clone https://github.com/mojxznhek/bmi.git

cd to folder and the command bellow

composer install

npm install && npm run dev

touch bmi.sqlite

cp .env.example .env

edit .env database config

DB_DATABASE = <absolute path>\bmi.sqlite

php atisan migrate

php artisan db:seed --class=UserSeeder

php artisan key:generate

php artisan serve