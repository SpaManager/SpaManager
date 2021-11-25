<?php
    class connect{
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "nails_room";
        

        public function conexion(){
            $conexion=mysqli_connect($this->server,
                                    $this->user,
                                    $this->password,
                                    $this->database);
            return $conexion;
        }
    }
?>