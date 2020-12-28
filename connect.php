<?php

   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databasename = "databasetuvung";

   $con = mysqli_connect($hostname,$username,$password,$databasename);
   mysqli_query($con ,"SET NAMES 'utf8'");
?>