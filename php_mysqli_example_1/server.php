<?php
    if(isset($_POST['name']) && isset($_POST['age'])){
        $conn = new mysqli("localhost","root","my2001sql777gagik","students");
        $name = $conn->real_escape_string($_POST['name']);
        $age = $conn->real_escape_string($_POST['age']);
        $date = "INSERT INTO users (name,age) VALUES('$name',$age)";
        if($conn->query($date)){
            echo "data send";
        }
        else {
            echo "Error" . $conn->error;
        }
    }
?>