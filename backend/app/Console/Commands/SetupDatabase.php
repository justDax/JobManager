<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Config\Repository;
use Illuminate\Database\Connection;
use Illuminate\Contracts\Console\Kernel;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the database, runs any migration and seeds it with the initial data. This process will wipe every existing data and should be used for a quick initial setup of the application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createDatabase();
        $this->runMigrations();
        $this->seedsDatabase();
        $this->echoDivider();
        echo "\r\n";
        echo "Setup done, use the command \"php artisan serve\" in your terminal to start the application.\r\n";
        echo "Cheers, dax.\r\n";
    }


    private function echoDivider(){
        echo "---------------------------------\r\n";
    }

    
    // this function creates the initial database, if it exists, it will drop the old one and recreate it
    private function createDatabase(){
        // creates the database
        $this->echoDivider();
        echo "- Creating the database\r\n";
        
        // reads the main database name
        $defaultDb = config("database.default");
        $dbName = config("database.connections.$defaultDb.database");
        
        if ( !$dbName ){
            echo "Cannot retrieve the database name from the application configurations.";
            return 0;
        }

        // the setupdb connection is a non-existant mysql database that will allow a commection to exist without throwing the error Unknown database 'jobmanager'
        // This is just a workaroud and there's probably a better way to to this, it's stupid that I have to connect to a non-existant database to be able to perform a query without the Unknown database error
        \DB::connection("setupdb")->statement("DROP DATABASE IF EXISTS $dbName");
        \DB::connection("setupdb")->statement("CREATE DATABASE IF NOT EXISTS $dbName");

        echo "Database \"$dbName\" created\r\n";
    }


    // migrates the database
    private function runMigrations(){
        $this->echoDivider();
        echo "- Running all the migrations\r\n";
        \Artisan::call("migrate");
        echo "Migrations done\r\n";
    }


    // invoke the seed command
    private function seedsDatabase(){
        $this->echoDivider();
        echo "- Seeding the database with some initial data\r\n";
        \Artisan::call("db:seed");
        echo "Done seeding\r\n";
    }
}
