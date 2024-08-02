Create a Laravel application which has below features:
- Add and Edit Api for patients with minimum fields like name, mobile, email, address, date of birth, password (encrypted), created date

1. Clone below repository to get the code.

   Run the below command
   
   To install all require packages
   a. Composer Install

   To run the project
   b. php -S localhost:8000 -t public


- Add Authentication Token for api security 

  Please pass access token which you will get it from login API
  Endpoint : {APP_URL}/login
  email:darshankini1994@gmail.com
  password:********

  Please check password in seeder file.

- Create One seeder for data insertion 
  
  To create a new seeder
  php artisan make:seeder UserTableSeeder

  To run new seeder
  php artisan db:seed --class=UserTableSeeder 
  

- Create One scheduler to insert 10 records in every minute via seeder
  php artisan make:command InsertBulkUser 
