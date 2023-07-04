<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        spl_autoload_register(function($class_name){
                require_once $class_name . '.php';
        });

        $Tom = new Person('Tom',22);
        echo $Tom->getAge();
    ?>
</body>
</html>