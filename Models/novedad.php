<?php

class Barrio
{
    private ?int $Id_Novedad=null;
    private ?int $Id_Cita=null;
    private ?date $Fecha_Modificacion=null;
    private ?time $Hora_Modificacion=null;
    private ?string $Descripcion_Modificacion=null;
    private ?int $Id_T_Novedad=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM novedad");
            $query->execute();
           return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO novedad (Id_Cita,Fecha_Modificacion,Hora_Modificacion,Descripcion_Modificacion,Id_T_Novedad) VALUES (?,?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Id_Cita,
                                $this->Fecha_Modificacion,
                                $this->Hora_Modificacion,
                                $this->Descripcion_Modificacion,
                                $this->Id_T_Novedad
                            ));
                            $this->Id_Novedad=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE novedad SET
                            Id_Cita = ?,
                            Fecha_Modificacion = ? ,
                            Hora_Modificacion = ?,
                            Descripcion_Modificacion = ?
                            Id_T_Novedad=?
                            WHERE Id_Novedad = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getId_Cita(),
                                $this->getFecha_Modificacion(),
                                $this->getHora_Modificacion(),
                                $this->getDescripcion_Modificacion(),
                                $this->getId_T_Novedad(),
                                $this->getId_Novedad()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Novedad){
        try{
        $query= "SELECT * FROM novedad where Id_Novedad=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Novedad));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM novedad WHERE Id_Novedad=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Novedad));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }
    //getters y setters 
    

    /**
     * Get the value of Id_Novedad
     */ 
    public function getId_Novedad()
    {
        return $this->Id_Novedad;
    }

    /**
     * Set the value of Id_Novedad
     *
     * @return  self
     */ 
    public function setId_Novedad($Id_Novedad)
    {
        $this->Id_Novedad = $Id_Novedad;

        return $this;
    }
    

    /**
     * Get the value of Id_Cita
     */ 
    public function getId_Cita()
    {
        return $this->Id_Cita;
    }

    /**
     * Set the value of Id_Cita
     *
     * @return  self
     */ 
    public function setId_Cita($Id_Cita)
    {
        $this->Id_Cita = $Id_Cita;

        return $this;
    }
    

    /**
     * Get the value of Fecha_Modificacion
     */ 
    public function getFecha_Modificacion()
    {
        return $this->Fecha_Modificacion;
    }

    /**
     * Set the value of Fecha_Modificacion
     *
     * @return  self
     */ 
    public function setFecha_Modificacion($Fecha_Modificacion)
    {
        $this->Fecha_Modificacion = $Fecha_Modificacion;

        return $this;
    }
    

    /**
     * Get the value of Hora_Modificacion
     */ 
    public function getHora_Modificacion()
    {
        return $this->Hora_Modificacion;
    }

    /**
     * Set the value of Hora_Modificacion
     *
     * @return  self
     */ 
    public function setHora_Modificacion($Hora_Modificacion)
    {
        $this->Hora_Modificacion = $Hora_Modificacion;

        return $this;
    }
    

    /**
     * Get the value of Descripcion_Modificacion
     */ 
    public function getDescripcion_Modificacion()
    {
        return $this->Descripcion_Modificacion;
    }

    /**
     * Set the value of Descripcion_Modificacion
     *
     * @return  self
     */ 
    public function setDescripcion_Modificacion($Descripcion_Modificacion)
    {
        $this->Descripcion_Modificacion = $Descripcion_Modificacion;

        return $this;
    }
    

    /**
     * Get the value of Id_T_Novedad
     */ 
    public function getId_T_Novedad()
    {
        return $this->Id_T_Novedad;
    }

    /**
     * Set the value of Id_T_Novedad
     *
     * @return  self
     */ 
    public function setId_T_Novedad($Id_T_Novedad)
    {
        $this->Id_T_Novedad = $Id_T_Novedad;

        return $this;
    }
}