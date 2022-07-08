
<?php
  Class Connexion{

    //variables pour BD
 	private  static $host = "localhost";
    private  static $dbname = "gestionClub";
    private  static $username = "root";
    private  static $password = "";

    private  static $option= array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8', );

    public   static $conn;
    
    public static function getConnection(){  
        self::$conn = null;  
        try{
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password,self::$option);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return self::$conn;
    }
  
  }
?>

