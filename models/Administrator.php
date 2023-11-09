<?php
/*
    CRUD creado por Oscar Amado
    Contacto: oscarfamado@gmail.com
*/
require_once('models/db.php');
require_once('models/Administrator.php');

class Administrator extends db {
    private function view_users(){
        try {
            $SQL = "SELECT * FROM tbl_pedidos";
            $result = $this->connect()->prepare($SQL);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_OBJ);	
        } catch (Exception $e) {
            die('Error Administrator(view_users) '.$e->getMessage());
        }
    }

    function get_view_users(){
        return $this->view_users();
    }

    private function register_users($data){
        try {
            $SQL = 'INSERT INTO tbl_pedidos (idPedido, idCliente, fecha, total, metodoDePago, direccion, numeroDeSeguimiento, fechaDeEntrega, idEmpleado) VALUES (?,?,?,?,?,?,?,?,?)';
            $result = $this->connect()->prepare($SQL);
            $result->execute(array(
                $data['idPedido'],
                $data['idCliente'],
                $data['fecha'],
                $data['total'],
                $data['metodoDePago'],
                $data['direccion'],
                $data['numeroDeSeguimiento'],
                $data['fechaDeEntrega'],
                $data['idEmpleado']
            ));
        } catch (Exception $e) {
            die('Error Administrator(register_users) '.$e->getMessage());
        }
    }

    function set_register_user($data){
        $this->register_users($data);
    }

    private function update_user($data){
        try {
            $SQL = 'UPDATE tbl_pedidos SET idCliente = ?, fecha = ?, total = ?, metodoDePago = ?, direccion = ?, numeroDeSeguimiento = ?, fechaDeEntrega = ?, idEmpleado = ? WHERE idPedido = ?';
            $result = $this->connect()->prepare($SQL);
            $result->execute(array(
                $data['idCliente'],
                $data['fecha'],
                $data['total'],
                $data['metodoDePago'],
                $data['direccion'],
                $data['numeroDeSeguimiento'],
                $data['fechaDeEntrega'],
                $data['idEmpleado'],
                $data['idPedido']
            ));
        } catch (Exception $e) {
            die('Error Administrator(update_user) '.$e->getMessage());
        }
    }

    function set_update_user($data){
        $this->update_user($data);
    }

    private function delete_user($idPedido){
        try {
            $SQL = 'DELETE FROM tbl_pedidos WHERE idPedido = ?';
            $result = $this->connect()->prepare($SQL);
            $result->execute(array($idPedido));			
        } catch (Exception $e) {
            die('Error Administrator(delete_user) '.$e->getMessage());
        }
    }

    function set_delete_user($idPedido){
        $this->delete_user($idPedido);
    }	
}
?>
