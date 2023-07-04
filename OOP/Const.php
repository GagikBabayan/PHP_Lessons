<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Person {
            public const NAME="Tom";
            private const AGE = 22;
            function getAge(){
                return $this::AGE;
            }
        }
        class Employee extends Person{
            private const AGE = 25;
            function getAge(){
                return self::AGE . ' ' . parent::getAge();
            }
        }
        $Tom = new Employee();
        echo $Tom->getAge();
    ?>
</body>
</html>