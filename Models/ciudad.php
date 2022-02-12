<?php

class Ciudad
{
    private ?int $Id_Ciudad=null;
    private ?string $Nombre_Ciudad=null;
    private ?int $Id_Departamento=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }
//metodos 
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM ciudad");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function insert()
{
    try{
    $query = "INSERT INTO ciudad (Nombre_Ciudad,Id_Departamento) VALUES (?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Nombre_Ciudad,
                            $this->Id_Departamento

                        ));
                        $this->Id_Ciudad=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}
public function update()
{
    try{
        $query = "UPDATE ciudad SET
                        Nombre_Ciudad = ?,
                        Id_Departamento = ?
                        WHERE Id_Ciudad=?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getNombre_Ciudad(),
                            $this->getId_Departamento(),
                            $this->getId_Ciudad(),

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}
public function getById($Id_Ciudad){
    try{
    $query= "SELECT * FROM ciudad where Id_Ciudad=?;";
    $query= $this-> connection-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($Id_Ciudad));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM ciudad WHERE Id_Ciudad=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Ciudad));
    }catch(Exception $e){
        die($e->getMessage());

    }
} 


//getter y setters 
    public function getId_Ciudad()
    {
        return $this->Id_Ciudad;
    }

 
    public function setId_Ciudad($Id_Ciudad)
    {
        $this->Id_Ciudad = $Id_Ciudad;

        return $this;
    }

     
    public function getNombre_Ciudad()
    {
        return $this->Nombre_Ciudad;
    }
 
    public function setNombre_Ciudad($Nombre_Ciudad)
    {
        $this->Nombre_Ciudad = $Nombre_Ciudad;

        return $this;
    }


    public function getId_Departamento()
    {
        return $this->Id_Departamento;
    }

    public function setId_Departamento($Id_Departamento)
    {
        $this->Id_Departamento = $Id_Departamento;

        return $this;
    }


}