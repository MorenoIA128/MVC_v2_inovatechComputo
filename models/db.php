<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class db{    
    public function connect(){
        try {
            $connect = new PDO('mysql:host=localhost;dbname=bdinovatech;charset=utf8;','root','');
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connect;    
        } catch (Exception $e) {
            die('Error db(connect) '.$e->getMessage());
        }
    }
}

?>