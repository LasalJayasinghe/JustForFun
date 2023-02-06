<?php

define('APP_NAME' , 'FuelUP');
define('APP_DESC' , 'Solution for fuel crisis');



if($_SERVER['SERVER_NAME'] == 'localhost')
{
    //Local Server
    define('DBHOST','localhost');
    define('DBNAME','fuelup');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
}else{
    //Live Server
    define('DBHOST','localhost');
    define('DBNAME','fuelup');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
}
    