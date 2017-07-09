<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

A Task List Application created using Laravel Framework version 5.4.

Using the application the user can create a new Task ,edit the task,mark the task as Done and delete it.
Once the task is marked as Done,the task could only be deleted.
The Application will allow creating unique tasks,if one tries to duplicate a task, the application refuses with an error message.
The Task list is stored in MySQL database version 5.6.34 ,achieved using database schema and migrations.

Files Created/Modified:

/app/Http/Controllers/ListController.php
/resources/views/layouts/master.blade.php
/resources/views/partial/header.blade.php
/resources/views/task/edittask.blade.php
/resources/views/task/index.blade.php
/database/migrations/2017_07_07_210726_create_tasks_table.php
/app/Task.php
/routes/web.php









