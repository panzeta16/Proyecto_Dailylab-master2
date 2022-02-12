<?php

class Examen
{
    private ?int $Id_Examen=null;
    private ?string $Nombre_Examen=null;
    private ?string $Descripcion_Examen=null;
    private ?string $Tiempo_Examen=null;
    private ?string $Valor_Examen=null;
    private ?int $Id_T_Muestra=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM examen");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO examen (Nombre_Examen,Descripcion_Examen,Tiempo_Examen,Valor_Examen,Id_T_Muestra) VALUES (?,?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Nombre_Examen,
                                $this->Descripcion_Examen,
                                $this->Tiempo_Examen,
                                $this->Valor_Examen,
                                $this->Id_T_Muestra
                            ));
                            $this->Id_Examen=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE examen SET
                            Nombre_Examen = ?,
                            Descripcion_Examen = ? ,
                            Tiempo_Examen = ?,
                            Valor_Examen = ?
                            Id_T_Muestra=?
                            WHERE Id_Examen = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getNombre_Examen(),
                                $this->getDescripcion_Examen(),
                                $this->getTiempo_Examen(),
                                $this->getValor_Examen(),
                                $this->getId_T_Muestra(),
                                $this->getId_Examen()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Examen){
        try{
        $query= "SELECT * FROM examen where Id_Examen=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Examen));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM examen WHERE Id_Examen=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Examen));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    
    //getters y setters 
    public function getId_Examen()
    {
        return $this->Id_Examen;
    }

    public function setId_Examen($Id_Examen)
    {
        $this->Id_Examen = $Id_Examen;

        return $this;
    }


    public function getNombre_Examen()
    {
        return $this->Nombre_Examen;
    }

 
    public function setNombre_Examen($Nombre_Examen)
    {
        $this->Nombre_Examen = $Nombre_Examen;

        return $this;
    }
    

    public function getDescripcion_Examen()
    {
        return $this->Descripcion_Examen;
    }

    public function setDescripcion_Examen($Descripcion_Examen)
    {
        $this->Descripcion_Examen = $Descripcion_Examen;

        return $this;
    }
    
 
    public function getTiempo_Examen()
    {
        return $this->Tiempo_Examen;
    }


    public function setTiempo_Examen($Tiempo_Examen)
    {
        $this->Tiempo_Examen = $Tiempo_Examen;

        return $this;
    }
    

    public function getValor_Examen()
    {
        return $this->Valor_Examen;
    }


    public function setValor_Examen($Valor_Examen)
    {
        $this->Valor_Examen = $Valor_Examen;

        return $this;
    }
    

    public function getId_T_Muestra()
    {
        return $this->Id_T_Muestra;
    }

    public function setId_T_Muestra($Id_T_Muestra)
    {
        $this->Id_T_Muestra = $Id_T_Muestra;

        return $this;
    }
}