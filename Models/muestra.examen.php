<?php 

class Muestra_Examen
{
    private ?string $URL_Resultado=null;
    private ?int $Id_Muestra=null;
    private ?int $Id_Examen=null;
    private ?int $Estado=null;
    private ?int $Id_Usuario=null;


    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

//metodos 
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM muestra_examen");
        $query->execute();
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function list2($Id_Cita)
{
    try{
        $query = $this->connection->prepare("SELECT Id_Muestra FROM muestra where Id_Cita=?
        ");
        $query->execute(array($Id_Cita));
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function list3($Id_Cita)
{
    try{
        $query = $this->connection->prepare("SELECT Id_Examen FROM cita where Id_Cita=?
        ");
        $query->execute(array($Id_Cita));
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function listResult()
{
    try{
        $Id_Usuario=$_SESSION['user']->getId_Usuario();//esto para que listara nada mas lo del usuario en sesion?
        $query = $this->connection->prepare("SELECT * FROM muestra_examen where Id_Usuario= ?");
        $query->execute(array($Id_Usuario));
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto y permite usar todos los metodos que estan ahi metidos 

    }catch (Exception $e){
        die ($e->getMessage());
    } 
}

public function insert()
{
    try{
    $query = "INSERT INTO muestra_examen (URL_Resultado,Id_Muestra,Estado,Id_Examen,Id_Usuario) VALUES (?,?,?,?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->URL_Resultado,
                            $this->Id_Muestra,
                            $this->Estado,
                            $this->Id_Examen,
                            $this->Id_Usuario
                        ));
                        $this->Id_Examen=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}
/*
public function update()
{
    try{
        $query = "UPDATE muestra_examen SET
                        URL_Resultado = ?,
                        Id_Muestra = ? ,
                        Estado = ?
                        WHERE Id_Empleado = ?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getURL_Resultado(),
                            $this->getId_Muestra(),
                            $this->getEstado(),
                            $this->getId_Empleado()

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}
*/
public function getById($Id_Examen){
    try{
    $query= "SELECT * FROM muestra_examen where Id_Examen=?;";
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
        $query= "DELETE FROM muestra_examen WHERE Id_Empleado=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Empleado));
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
     * Get the value of URL_Resultado
     */ 
    public function getURL_Resultado()
    {
        return $this->URL_Resultado;
    }

    /**
     * Set the value of URL_Resultado
     *
     * @return  self
     */ 
    public function setURL_Resultado($URL_Resultado)
    {
        $this->URL_Resultado = $URL_Resultado;

        return $this;
    }

    /**
     * Get the value of Id_Examen
     */ 
    public function getId_Examen()
    {
        return $this->Id_Examen;
    }

    /**
     * Set the value of Id_Examen
     *
     * @return  self
     */ 
    public function setId_Examen($Id_Examen)
    {
        $this->Id_Examen = $Id_Examen;

        return $this;
    }

    /**
     * Get the value of Estado
     */ 
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * Set the value of Estado
     *
     * @return  self
     */ 
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }

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
}
