<?php

class Usuario
{
    private ?int $Id_Usuario=null;
    private ?string $Correo_Electronico=null;
    private ?string $Contrasena_Usuario=null;
    private ?string $Documento_Identificacion=null;
    private ?string $Telefono_Usuario=null;
    private ?int $Id_RH=null;
    private ?string $Nombres_Usuario=null;
    private ?string $Apellidos_Usuario=null;
    private ?int $Id_Rol=null;

 
    
    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }
//metodos
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM usuario");
        $query->execute();
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function verPerfil()//($Id_Usuario) intentar esto
{
    try{
        $Id_Usuario=$_SESSION['user']->getId_Usuario();
        $query = $this->connection->prepare("SELECT * FROM usuario where Id_Usuario=?;");
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Usuario));
        echo(var_dump($Id_Usuario));
       return $query->fetch();
       
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function insert()
{
    try{
    $query = "INSERT INTO usuario (Correo_Electronico,Contrasena_Usuario,Documento_Identificacion,Telefono_Usuario,Id_RH,Nombres_Usuario,Apellidos_Usuario,Id_Rol) VALUES (?,?,?,?,?,?,?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Correo_Electronico,
                            $this->Contrasena_Usuario,
                            $this->Documento_Identificacion,
                            $this->Telefono_Usuario,
                            $this->Id_RH,
                            $this->Nombres_Usuario,
                            $this->Apellidos_Usuario,
                            $this->Id_Rol
                        ));
                        $this->Id_Usuario=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}

public function listHistorial(){
    
        try{
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Fecha_Cita < NOW();");//con esto solo mostramos las citas que no estan vencidas
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }


public function insertPac()
{
    try{
    $query = "INSERT INTO usuario (Correo_Electronico,Contrasena_Usuario,Documento_Identificacion,Telefono_Usuario,Id_RH,Nombres_Usuario,Apellidos_Usuario,Id_Rol) VALUES (?,?,?,?,?,?,?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Correo_Electronico,
                            $this->Contrasena_Usuario,
                            $this->Documento_Identificacion,
                            $this->Telefono_Usuario,
                            $this->Id_RH,
                            $this->Nombres_Usuario,
                            $this->Apellidos_Usuario,
                            $this->Id_Rol
                        ));
                        $this->Id_Usuario=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}


public function login ($Correo_Electronico, $Contrasena_Usuario) 
    {
          //  die(var_dump($this));
        try{
            $query = $this->connection  -> prepare("SELECT * FROM usuario WHERE Correo_Electronico=? AND Contrasena_Usuario=?;");
            $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($Correo_Electronico,$Contrasena_Usuario));
            $result = $query->fetch();
//$this->getId_Usuario=$this->connection->lastInsertId();

            if($result)// metodo para verificar la contraseña, compara el password que estamos ingresando con el que esta en la bd
                                {   
                                    $result->connection = null;
                                    $_SESSION['user']=$result;
                                    return $result;  
                                }else{
                                    
                                    return false;
                                }

        }catch(Exception $e){
            die($e->getMessage());
        } //QUEDAMOS EN 1:04:47
    }

    public function dupli ($Correo_Electronico, $Documento_Identificacion) 
    {
          //  die(var_dump($this));
        try{
            $query = $this->connection  -> prepare("SELECT * FROM usuario WHERE Correo_Electronico=? AND Documento_Identificacion=?;");
            $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($Correo_Electronico,$Documento_Identificacion));
            $result = $query->fetch();
            $this->getId_Usuario=$this->connection->lastInsertId();

            if($result)// metodo para verificar la contraseña, compara el password que estamos ingresando con el que esta en la bd
                                {   
                                    $result->connection = null;
                                    $_SESSION['user']=$result;
                                    return $this;  
                                }else{
                                    
                                    return false;
                                }

        }catch(Exception $e){
            die($e->getMessage());
        } //QUEDAMOS EN 1:04:47
    }



public function update()
{
    try{
        $query = "UPDATE usuario SET
                        Contrasena_Usuario = ? ,
                        Telefono_Usuario = ?,
                        Nombres_Usuario = ?,
                        Apellidos_Usuario = ?
                        WHERE Id_Usuario = ?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getContrasena_Usuario(),
                            $this->getTelefono_Usuario(),
                            $this->getNombres_Usuario(),
                            $this->getApellidos_Usuario(),
                            $this->getId_Usuario()

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}


public function buscarId($Documento_Identificacion){
    try{
        $query = $this->connection  -> prepare("SELECT * FROM usuario WHERE Documento_Identificacion=?;");
        $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $query->execute(array($Documento_Identificacion));
        $result = $query->fetch();
        return $result;
    
    }catch(Exception $e){
        die($e->getMessage());
        }
}

public function getById($Id_Usuario){
    try{
    $query= "SELECT * FROM usuario where Id_Usuario=?;";
    $query= $this-> connection-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($Id_Usuario));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM usuario WHERE Id_Usuario=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Usuario));
    }catch(Exception $e){
        die($e->getMessage());

    }
}
    
//getters y setters


    /**
     * Get the value of Id_Usuario
     */ 
    public function getId_Usuario()
    {
        return $this->Id_Usuario;
    }

    /**
     * Set the value of Id_Usuario
     *
     * @return  self
     */ 
    public function setId_Usuario($Id_Usuario)
    {
        $this->Id_Usuario = $Id_Usuario;

        return $this;
    }

    /**
     * Get the value of Contrasena_Usuario
     */ 
    public function getContrasena_Usuario()
    {
        return $this->Contrasena_Usuario;
    }

    /**
     * Set the value of Contrasena_Usuario
     *
     * @return  self
     */ 
    public function setContrasena_Usuario($Contrasena_Usuario)
    {
        $this->Contrasena_Usuario = $Contrasena_Usuario;

        return $this;
    }

    /**
     * Get the value of Documento_Identificacion
     */ 
    public function getDocumento_Identificacion()
    {
        return $this->Documento_Identificacion;
    }

    /**
     * Set the value of Documento_Identificacion
     *
     * @return  self
     */ 
    public function setDocumento_Identificacion($Documento_Identificacion)
    {
        $this->Documento_Identificacion = $Documento_Identificacion;

        return $this;
    }

    /**
     * Get the value of Correo_Electronico
     */ 
    public function getCorreo_Electronico()
    {
        return $this->Correo_Electronico;
    }

    /**
     * Set the value of Correo_Electronico
     *
     * @return  self
     */ 
    public function setCorreo_Electronico($Correo_Electronico)
    {
        $this->Correo_Electronico = $Correo_Electronico;

        return $this;
    }

    /**
     * Get the value of Telefono_Usuario
     */ 
    public function getTelefono_Usuario()
    {
        return $this->Telefono_Usuario;
    }

    /**
     * Set the value of Telefono_Usuario
     *
     * @return  self
     */ 
    public function setTelefono_Usuario($Telefono_Usuario)
    {
        $this->Telefono_Usuario = $Telefono_Usuario;

        return $this;
    }

    /**
     * Get the value of Id_RH
     */ 
    public function getId_RH()
    {
        return $this->Id_RH;
    }

    /**
     * Set the value of Id_RH
     *
     * @return  self
     */ 
    public function setId_RH($Id_RH)
    {
        $this->Id_RH = $Id_RH;

        return $this;
    }

    /**
     * Get the value of Nombres_Usuario
     */ 
    public function getNombres_Usuario()
    {
        return $this->Nombres_Usuario;
    }

    /**
     * Set the value of Nombres_Usuario
     *
     * @return  self
     */ 
    public function setNombres_Usuario($Nombres_Usuario)
    {
        $this->Nombres_Usuario = $Nombres_Usuario;

        return $this;
    }

    /**
     * Get the value of Apellidos_Usuario
     */ 
    public function getApellidos_Usuario()
    {
        return $this->Apellidos_Usuario;
    }

    /**
     * Set the value of Apellidos_Usuario
     *
     * @return  self
     */ 
    public function setApellidos_Usuario($Apellidos_Usuario)
    {
        $this->Apellidos_Usuario = $Apellidos_Usuario;

        return $this;
    }

    /**
     * Get the value of Id_Rol
     */ 
    public function getId_Rol()
    {
        return $this->Id_Rol;
    }

    /**
     * Set the value of Id_Rol
     *
     * @return  self
     */ 
    public function setId_Rol($Id_Rol)
    {
        $this->Id_Rol = $Id_Rol;

        return $this;
    }
}