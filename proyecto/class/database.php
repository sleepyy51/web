<?php
    class Database{
        private ?PDO $PDOlocal;
        private $user = "root";
        private $password = "";
        private $server = "mysql:host=localhost;dbname=empresa;";

        public function conectarDB(){
            try{
                $this -> PDOlocal=new PDO($this->server, $this->user, $this->password);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function desconectarDB(){
            try{
                $this->PDOlocal=null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function seleccionar(string $consulta){
            try{
                $res = $this->PDOlocal->query($consulta);
                $fila = $res->fetchAll(PDO::FETCH_OBJ);
                return $fila;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function ejecutar(string $comando){
            try{
                $this ->PDOlocal->query($comando);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>