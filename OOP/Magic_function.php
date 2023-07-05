<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       
       //OOP magic function
        class Connection
        {
            public $link;
            private $dsn, $username, $password;

            public function __construct($dsn, $username, $password)
            {
                $this->dsn = $dsn;
                $this->username = $username;
                $this->password = $password;
                $this->connect();
            }

            private function connect()
            {
                $this->link = $this->dsn . ' ' . $this->username . ' ' . $this->password;
            }

            public function __sleep()
            {
                echo "<br>sleep<br>";
                return array('dsn', 'username', 'password');
            }

            public function __wakeup()
            {
                echo "<br>wakeup<br>";
                $this->connect();
            }
            
            public function __serialize(): array
            {
                echo "<br>serialize<br>";
                return [
                    "dsn" => $this->dsn,
                    "username" => $this->username,
                    'password' => $this->password,
                ];
            }
            public function __unserialize(array $data): void
            {
                echo "<br>unserialize<br>";
                $this->connect();
                $this->dsn = $data['dsn'];
                $this->username = $data['username'];
                $this->password = $data['password'];
            }
            public static function __set_state($properties)
            {
                $obj = new self($properties['dsn'],$properties['username'],$properties['password']);
                return $obj;
            }
            public function __debugInfo()
            {
                return ["name" => $this->username];
            }
            public function __call($name, $arguments)
            {
                echo $name . implode(',',$arguments) . '<br>';
            }
            public function __isset($name)
            {
                return isset($this->$name);
            }
            public function __toString()
            {
                return $this->link;
            }
           
        }
        $conn = new Connection('localhost','ani','12345');

        //__set_state
        $string = var_export($conn);

        $newObj = eval('return' . $string . ';');

        echo '<br>';
        //__debugInfo
        var_dump($conn);

        //__toString
        echo $conn . '<br>';

        //__serialize
        $serialize = serialize($conn);

        //__unserialize
        $unserialize = unserialize($serialize);
        
       ?>
</body>
</html>