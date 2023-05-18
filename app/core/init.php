<?php

spl_autoload_register(function($class){
    require "../app/models/".$class.".models.php";
}); //registers an autoloader: a function that is called whenever a class is instantiated

require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";
