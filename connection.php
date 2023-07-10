<?php
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","oun");

if( ! $con = mysqli_connect(DBHOST , DBUSER , DBPWD , DBNAME)){
    die("failed to connect!");
}
?>
