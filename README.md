## Quickstart guide

To run the two applications you'll need:
- composer installed globally on your system accessible with the command "composer" from your command line
- php
- node and npm installed
- mysql

This has been tested with:
- php 7.1.2
- typescript 2.2
- npm 3.7.3
- node 5.8.0


## Setup
First things first: clone the repository in your local machine  
`git clone git@github.com:justDax/JobManager.git`  
or via https  
`https://github.com/justDax/JobManager.git`  
or download the repository if you don't have git installed

### Backend

enter in the backend folder and install the dependencies with the command  
`composer install`

then, stay in the backend folder and create a file named *.env*, it's easier if you copy-paste the file *.env.example*  
in this file you'll need to set the variables for your local development, in particular:

```
APP_KEY=base64:EDE8bPTp1DexoNl7RsWM7DgtRh4XqGzp70Dt1n+SUPg=
DB_DATABASE=jobmanager
DB_USERNAME=root
DB_PASSWORD=
```
this is the only difference from my local file and the example

The database can be easilly created with the command  
`php artisan db:setup`  
that will create the database, run the migrations and the data seeding scripts


start the laravel application with the command `php artisan serve`

Visit the url [http://localhost:8000](http://localhost:8000), the application should be up and running

### Frontend
Enter in the frontend folder and type  
`npm install`

if the command runs successfully you can start the application with  
`npm start`

The application should open by itself in the browser window [http://localhost:3000](http://localhost:3000)

