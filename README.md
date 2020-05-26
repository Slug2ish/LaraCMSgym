Title: Everest Fitness User Manangement system

This project is a content managemnet system.

Frontend:
Custom HTML
Custom CSS
Bootstrap
fotawesome

Backend:
PHP
MYSQL
Laravel Framework

In this project , the aim is to manage the trainers and members information by the admin.

I have designed a simple admin panel where the records of all the trainers and members are managed by the admin.

I have used the laravel/ui package that provides the scaffolding for authentication where admin , members and trainers are able to login and register.

Models:
1.User
2.Role
3.Photo

I have created three tables: 
users = which includes all the users with there details.
roles = which contains the roles for the users i.e. administrator, trainer and member.
photos = which contains all the photos uplaoded by the users as their profile picture.

users table fields includes:
1.id
2.name
3.email
4.role_id
5.is_active = ( 0 = Not Active , 1 = Active) 
6.password = encrypted by using bcrypt() function
7.timestamps = to make it human readabke i have used diffForHumans() functions 
8.photo_id

roles table fields includes:
1.id
2.name = administrator, trainer and member
3.timestamps

photos table fields includes:
1.id
2.file
3.timestamps

I have used Eloquent ORM Relationships to relate User model with Photo and Role models.

In the admin panel the admin is able to create , read , update and delete the memebers and trainers. I have created AdminUsersController to control all the crud opertaion.

The view contains:
admin.index to view all the users by the admin.
admin.edit to edit and delete the users by the admin.
admin.create to create new users by the admin.

I have used the Form Request Validation by creating a form request class using 
php artisan make:request Request_class_name

I have created two request class:
1.UsersEditRequest.php
2.UsersRequest.php

and made the fields required while creating and updating users.

I have added the middleware for filtering HTTP requests entering the application where the admin who is acive is only able to view the admin panel.

I have used the laravel HTML Form collective by downloading the package through composer running the command:
composer require "laravelcollective/html"

I have included a hidden CSRF token field in the form so that the CSRF protection middleware can validate the request.

When the admin uplaods the picture of the user,it is stored in both database in photos table as time() . getClientOriginalName which is also moved to public/images folder inside the project using move() function.

When the admin deletes the user, along with the data in the database of the users table , the photo in the photos table and the photo in the public/images folder is deleted by using unlink() function.

I have used a simple sidebar template to create the admin panel dashbaord.

I have included all the custom html and css inside of the assets folder in public flder and linked it with the blade.php by the help of asset() funtion.

This project is still not completed. There are whole lot of others stuffs that I want to include. I will continue the project till I have inlcuded everything.


