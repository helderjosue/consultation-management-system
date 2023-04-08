<p align="center">
    <h1 align="center">Clinical Appointment Scheduling Management System</h1>
    <br>
    <p align="center"> Its a web application to help Health Facilities to schedule and manage patients clinical appointments. 
    <br>
    Currently the application only allows medical appointments to be scheduled from the health unit, but in versions
 later, the system will allow scheduling to be done remotely.
    </p>

</p>

This application is in its initial phase and currently has the following features:


       1. Register Patients
       2. Schedule Consultations
       3. Register Doctors
       4. Register Medical Areas
       5. Register Types of Doctors
       6. Dashboard
       
This application was built in PHP using Yii Framework and follows the directory structure bellow:

APPLICATION DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

HOW TO INSTALL AND TEST
-------------------

### Prerequisites

 - Installation of [PHP >= v7.4.x](https://www.php.net/downloads.php)
 - Installation of [Composer](https://getcomposer.org/)
 - Installation of [MySQL Server](https://dev.mysql.com/downloads/mysql/)

1. Clone the project repository
2. Create a database called ```sys_consultas```
3. Enter the project directory and run ```composer install / composer update```
4. Update the following file: ```app/config/db.php``` with your MYSQL local credentials.<br>
Eg:<br>
```
'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=sys_consultas',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
```
5. On your terminal, run ```php yii migrate```
6. Run ```php yii serve``` to start the application instance
7. Access the given link to open the application on your browser ```http://localhost:8080/```
8. Happy testing!
