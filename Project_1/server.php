<?php
    //check POST
    if(isset($_POST['name']) && isset($_POST['age'])){
        //connect server
        $conn = new mysqli("localhost","root","my2001sql777gagik");

        //create database
        $databaseName = "students";
        $database = "CREATE DATABASE $databaseName";

        //check database
        if($conn->query($database)){
            echo "Database created successfully <br>";
        }
        else {
            echo "Error " . $conn->error . '<br>';
        }

         //connect server
        $conn = new mysqli("localhost","root","my2001sql777gagik","$databaseName");

        //get data
        $name = $conn->real_escape_string($_POST['name']);
        $age = $conn->real_escape_string($_POST['age']);

        //create table
        $table = "CREATE TABLE Users (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, age INTEGER NOT NULL);";
        
        //check table
        if($conn->query($table)){
            echo "Table created successfully <br>";
        }
        else {
            echo "Error " . $conn->error . '<br>';
        }

        //insert data
        $date = "INSERT INTO users (name,age) VALUES('$name',$age)";

        //check data
        if($conn->query($date)){
            echo "data send <br>";
        }
        else {
            echo "Error" . $conn->error . '<br>';
        }
    }
?>