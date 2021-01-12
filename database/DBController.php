<?php 
    class DBController{
        // DB connection properties
        protected $host = 'localhost';
        protected $user = 'root';
        protected $password = "";
        protected $database = "bandienthoai";

        // Conection properties
        public $con = null;

        // Call constructer
        public function __construct()
        {
            $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if ($this->con->connect_errno) {
                echo "Fail".$this->con->connect_errno;
            }                        
        }

        public function __destruct()
        {
            $this->closeConnection();
        }

        // MySQLi closing connection
        protected function closeConnection(){
            if ($this->con != null) {
                $this->con->close();
                $this->con = null;
            }
        }
    }

    
?>
