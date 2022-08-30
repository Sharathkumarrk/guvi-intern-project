<?php

## Implemented Using PDO. Connect to data base. 
## Create User in database. 
## Update User in database. 
## Check if User exists in database. 
class DbObject {
    static protected $con;
    static protected $table_name;
    static protected $columns = "";   
    
    private static function setDb() {
        
        define("DB_HOST", "localhost");
        define("DB_PASS", "");
        define("DB_NAME", "login_ajax");
        define("DB_USER", "root");
        define("DB_CHARSET", "utf8mb4");
        $dsn = "mysql:host=" . DB_HOST . ";" . "dbname=" . DB_NAME . ";" . "charset=" . DB_CHARSET . "";
        $options = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];
        try {

            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        }

        catch (\PDOException $e) {
            throw new \PDO($e->getMessage(), (int)$e->getCode());

        }  
        self::$con = $pdo;
    }

    public function create($attributes = []) {
        self::setDb();
        $attribute_pairs = [];       
        foreach($attributes as $k => $val) {
            $attribute_pairs[] = ":$k"; 
        }
        $sql = "INSERT INTO " . static::$table_name . "(";   
        $sql.= join(', ', array_keys($attributes));          
        $sql.= ") VALUES (";
        $sql.= join(',', array_values($attribute_pairs));    
        $sql.= ")";
        $result = self::$con->prepare($sql)->execute($attributes); 
        if($result) {
            $this->id = self::$con->lastInsertId();     
        }
        return $result;
      }


    public function login_check($attributes = []){
        self::setDb();
        $table_name = static::$table_name;
        $username = $attributes["username"];
        $password = $attributes["password"];
        $sql = "SELECT * FROM `users` WHERE username = \"".$username."\" AND password = \"".$password."\""; 
        $result = self::$con->query($sql)->fetch(); 
        return $result;
    }


    public function update_user($attributes = []){
        self::setDb();
        $table_name = static::$table_name;
        $username = $attributes["username"];
        $email = $attributes["email"];
        $name = $attributes["name"];
        $password = $attributes["password"];
        $result = self::$con->prepare($sql)->execute();
        return $username;
    }
    
}

?>