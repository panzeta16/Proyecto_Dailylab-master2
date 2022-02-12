<?php 

class Departamento 
{
    private ?int $Id_Departamento=null;
    private ?string $Nombre_Departamento=null; 

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }
    
//metodos 
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM departamento");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}
public function insert()
{
    try{
    $query = "INSERT INTO departamento (Id_Departamento,Nombre_Departamento) VALUES (?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Id_Departamento,
                            $this->Nombre_Departamento
                        ));
                        $this->Id_Departamento=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}
public function update()
{
    try{
        $query = "UPDATE departamento SET
                        Nombre_Departamento = ?
                        WHERE Id_Departamento=?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getNombre_Departamento(),
                            $this->getId_Departamento(),

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}
public function getById($Id_Departamento){
    try{
    $query= "SELECT * FROM departamento where Id_Departamento=?;";
    $query= $this-> connection-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($Id_Departamento));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM departamento WHERE Id_Departamento=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Departamento));
    }catch(Excepcion $e){
        die($e->getMessage());

    }
}
//getters y setters
    public function getId_Departamento()
    {
        return $this->Id_Departamento;
    }

    public function setId_Departamento($Id_Departamento)
    {
        $this->Id_Departamento = $Id_Departamento;

        return $this;
    }
    

    public function getNombre_Departamento()
    {
        return $this->Nombre_Departamento;
    }

    public function setNombre_Departamento($Nombre_Departamento)
    {
        $this->Nombre_Departamento = $Nombre_Departamento;

        return $this;
    }
}