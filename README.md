# Test Task

## Steps to setup the project

1) Clone project
2) Run
##### composer install
3) give read write permissions to following folders:
public,bootstrap,config,storage
4) Copy .env.example and rename to .env and change db crdentials here.
5) Run migrations by following command:
##### php artisan migrate
6) Run seeds:

##### sudo  composer dumpautoload
##### php artisan db:seed --class=UserSeeder
##### php artisan db:seed --class=RoleSeeder
##### php artisan db:seed --class=LineSeeder
##### php artisan db:seed --class=LinesReadSeeder
##### php artisan db:seed --class=TimesReadSeeder
##### php artisan db:seed --class=TransactionSeeder

7) php artisan serve

Project will run with this url - http://localhost:8000

8) login with admin credentials

##### username: karan
##### password:12345678





