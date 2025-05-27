<?php   
    class Database
    {
        private $HostName = "localhost"; 
        private $UserName = "root"; 
        private $PassWord = ""; 
        private $DatabaseName ="Datasync"; 

        protected $conn;  
        private static $instance = null;

        public function __construct()
        {
            $this->conn = new mysqli( $this->HostName,  
                                      $this->UserName,
                                      $this->PassWord, 
                                      $this->DatabaseName);
           
            if($this->conn->connect_errno)
            {
                die("Connection failed  ". $this->conn->connect_error);
            } 
        }   


        public function getConnection() {
            return $this->conn; 
        }   
    }   
    //$database = new Database(); 
    // var_dump($database->getConnection());

?>