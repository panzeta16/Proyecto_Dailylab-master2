<?php

class Muestra
{
    private ?int $Id_Muestra=null;
    private ?string $Referencia=null;
    private ?int $Id_Cita=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM muestra");
            $query->execute();
           return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO muestra (Referencia,Id_Cita) VALUES (?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Referencia,
                                $this->Id_Cita
                            ));
                            $this->Id_Muestra=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE muestra SET
                            Referencia = ?,
                            Id_Cita = ? 
                            WHERE Id_Muestra= ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getReferencia(),
                                $this->getId_Cita(),
                                $this->getId_Muestra()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Muestra){
        try{
        $query= "SELECT * FROM muestra where Id_Muestra=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Muestra));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM muestra WHERE Id_Muestra=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Muestra));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    //getters y setters 


    /**
     * Get the value of Id_Muestra
     */ 
    public function getId_Muestra()
    {
        return $this->Id_Muestra;
    }

    /**
     * Set the value of Id_Muestra
     *
     * @return  self
     */ 
    public function setId_Muestra($Id_Muestra)
    {
        $this->Id_Muestra = $Id_Muestra;

        return $this;
    }
    

    /**
     * Get the value of Referencia
     */ 
    public function getReferencia()
    {
        return $this->Referencia;
    }

    /**
     * Set the value of Referencia
     *
     * @return  self
     */ 
    public function setReferencia($Referencia)
    {
        $this->Referencia = $Referencia;

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

}