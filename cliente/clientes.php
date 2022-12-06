<?php
include('../config/config.php'); 
include('../config/database.php'); 


class clientes{
    public $conexion; 

    function __construct(){
        $db= new Database(); 
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombrescompletos= $params['nombrescompletos']; 
        $celular= $params['celular'];
        $email = $params['email'];
        $menu = $params['menu'];
        

        $insert= "INSERT INTO clientes VALUES (NULL, '$nombrescompletos', '$celular', '$email', '$menu')"; 

        return mysqli_query($this->conexion, $insert); 

    }

  function getAll(){
        $basededatos= "SELECT * FROM clientes"; 
        return mysqli_query($this->conexion, $basededatos);
    }

    function getOne($id){
        $sql = "SELECT * FROM clientes WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
      $nombrescompletos= $params['nombrescompletos']; 
      $celular= $params['celular'];
      $email = $params['email'];
      $menu = $params['menu'];
        $id = $params['id'];
  
        $update = " UPDATE clientes SET nombrescompletos='$nombrescompletos', celular='$celular', email='$email', menu='$menu' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM clientes WHERE id = $id"; 
        return mysqli_query($this->conexion, $eliminar);
    }
 
}



?>