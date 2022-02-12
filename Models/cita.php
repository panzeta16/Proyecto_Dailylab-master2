<?php

class Cita
{
    private ?int $Id_Cita=null;
    private ?string $Fecha_Cita=null;
    private ?string $Hora_Cita=null;  
    private ?string $Estado_Cita=null;
    private ?int $Id_Sucursal=null;
    private ?int $Id_Examen=null;
    private ?int $Id_Usuario=null;    

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list1($Id_Cita)
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM cita where Id_Cita=?;");//con esto solo mostramos las citas que no estan vencidas
            $query->execute(array($Id_Cita));
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Fecha_Cita >= NOW() AND Estado_Cita=1;");//con esto solo mostramos las citas que no estan vencidas
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function listAsist()//lista de la gente que ya asistio a las citas
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Estado_Cita=2;");//con esto solo mostramos las citas que no estan vencidas
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

/* este metodo hay que perfeccionarlo pq por ahora no tiene mucho sentido
   public function controlNumCitas(){//con este metodo controlamos el numero de citas que se pueden pedir al dia
        try{
            $query = $this->connection->prepare("SELECT COUNT(*) FROM cita WHERE Fecha_Cita = CURDATE();
            ");
            $query->execute();
            return $query;
if ($query >= 330 ){
    return false; 
    echo "no puede pedir mas citas por hoy"; 

}

        }catch (Exception $e){
            die ($e->getMessage());
        }
    }
*/
    public function dupliCitas($Id_Examen,$Id_Usuario){//esto evita que se pidan 2 citas de la misma especialidad si 1 de ella no se ha vencido todavia 

        try{
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Fecha_Cita >= NOW() AND Id_Examen=? AND Id_Usuario=?;");
            $query->execute(array($Id_Examen,$Id_Usuario));
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function listHistorial()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Fecha_Cita < NOW();");//con esto solo mostramos las citas que no estan vencidas
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function listHistorialPac($Id_Usuario)
    {
        try{
            $Id_Usuario=$_GET['Id_Usuario'];
           // =$_SESSION['user']->getId_Usuario();
            $query = $this->connection->prepare("SELECT * FROM cita WHERE Fecha_Cita < NOW() AND Id_Usuario=? OR  Estado_Cita=0;");//con esto solo mostramos las citas que no estan vencidas
            $query->execute(array($Id_Usuario));
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    
    public function listUnic()
    {
        try{ 
            $Id_Usuario=$_SESSION['user']->getId_Usuario();//esto para que listara nada mas lo del usuario en sesion?
            $query = $this->connection->prepare("SELECT * FROM cita where Fecha_Cita >= NOW()  AND Estado_Cita=1 AND Id_Usuario= ?");
            $query->execute(array($Id_Usuario));
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function listAnalisis()
    {
        try{ 
           $query = $this->connection->prepare("SELECT * FROM cita where Fecha_Cita < NOW()  AND Estado_Cita=2 ");
            $query->execute(array());
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function agendarUnic()
    {
        try{
     //   $query = "INSERT INTO `cita` (`Id_Cita`, `Fecha_Cita`, `Hora_Cita`, `Estado_Cita`, `Id_Sucursal`, `Id_Examen`, `Id_Usuario`) VALUES (NULL, '2021-12-12', '12:12:12', 'agendado', '1', '1', '2');";
        $query = "INSERT INTO cita ( Fecha_Cita, Hora_Cita, Estado_Cita, Id_Sucursal, Id_Examen, Id_Usuario) VALUES (?,?,?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Fecha_Cita,
                                $this->Hora_Cita,
                                $this->Estado_Cita,
                                $this->Id_Sucursal,
                                $this->Id_Examen,
                                $this->Id_Usuario
                            )); //esto funciona bien hasta aca lo de abajo es solo otra forma de hacerlo para devolver el id
                            $this->Id_Cita=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function agendarUnicPac()
    {
        try{
     //   $query = "INSERT INTO `cita` (`Id_Cita`, `Fecha_Cita`, `Hora_Cita`, `Estado_Cita`, `Id_Sucursal`, `Id_Examen`, `Id_Usuario`) VALUES (NULL, '2021-12-12', '12:12:12', 'agendado', '1', '1', '2');";
        $query = "INSERT INTO cita ( Fecha_Cita, Hora_Cita, Estado_Cita, Id_Sucursal, Id_Examen,Id_Usuario) VALUES (?,?,?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Fecha_Cita,
                                $this->Hora_Cita,
                                $this->Estado_Cita,
                                $this->Id_Sucursal,
                                $this->Id_Examen,
                                $this->Id_Usuario
                            )); //esto funciona bien hasta aca lo de abajo es solo otra forma de hacerlo para devolver el id
                            $this->Id_Cita=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }
    
    public function update()//ACTUALICZR
    {
        try{
            $query = "UPDATE cita SET
                            Fecha_Cita = ?,
                            Hora_Cita = ? ,
                            Estado_Cita=?,
                            Id_Sucursal=?,
                            Id_Examen = ?
                          
                            WHERE Id_Cita = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getFecha_Cita(),
                                $this->getHora_Cita(),
                                $this->getEstado_Cita(),
                                $this->getId_Sucursal(),
                                $this->getId_Examen(),
                               
                                $this->getId_Cita()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Cita){
        try{
        $query= "SELECT * FROM cita where Id_Cita=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Cita));
        return $query->fetch();

    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function deleteCita(){
        try{
            $query= "DELETE FROM cita WHERE Id_Cita=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Cita));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    public function updateState()//para cancelar
    {
        try{
            $query="UPDATE cita SET Estado_Cita =0 WHERE Id_Cita = ?;";
            $this->connection->prepare($query)
            ->execute(array(
                $this->Id_Cita
            ));
         return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function asistido()//para asistido
    {
        try{
            $query="UPDATE cita SET Estado_Cita =2 WHERE Id_Cita = ?;";
            $this->connection->prepare($query)
            ->execute(array(
                $this->Id_Cita
            ));
         return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function noAsistido()//para asistido
    {
        try{
            $query="UPDATE cita SET Estado_Cita =3 WHERE Id_Cita = ?;";
            $this->connection->prepare($query)
            ->execute(array(
                $this->Id_Cita
            ));
         return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    /*   public function updateState() //no borrar este metodo, dirve commo guia
    {
        try{
            $query="UPDATE cita SET Estado_Cita =? WHERE Id_Cita = ?;";
            $this->connection->prepare($query)
            ->execute(array(
                !$this->Estado_Cita,
                $this->Id_Cita
            ));
         return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }*/ 
//getters y setters 


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
     * Get the value of Fecha_Cita
     */ 
    public function getFecha_Cita()
    {
        return $this->Fecha_Cita;
    }

    /**
     * Set the value of Fecha_Cita
     *
     * @return  self
     */ 
    public function setFecha_Cita($Fecha_Cita)
    {
        $this->Fecha_Cita = $Fecha_Cita;

        return $this;
    }

    /**
     * Get the value of Hora_Cita
     */ 
    public function getHora_Cita()
    {
        return $this->Hora_Cita;
    }

    /**
     * Set the value of Hora_Cita
     *
     * @return  self
     */ 
    public function setHora_Cita($Hora_Cita)
    {
        $this->Hora_Cita = $Hora_Cita;

        return $this;
    }

    /**
     * Get the value of Estado_Cita
     */ 
    public function getEstado_Cita()
    {
        return $this->Estado_Cita;
    }

    /**
     * Set the value of Estado_Cita
     *
     * @return  self
     */ 
    public function setEstado_Cita($Estado_Cita)
    {
        $this->Estado_Cita = $Estado_Cita;

        return $this;
    }

    /**
     * Get the value of Id_Sucursal
     */ 
    public function getId_Sucursal()
    {
        return $this->Id_Sucursal;
    }

    /**
     * Set the value of Id_Sucursal
     *
     * @return  self
     */ 
    public function setId_Sucursal($Id_Sucursal)
    {
        $this->Id_Sucursal = $Id_Sucursal;

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
    
    
