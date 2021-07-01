<?php
namespace App\Domain\Site\Repository;

use App\Domain\Site\Data\SellerCreateData;
use PDO;

final class SellerRepository{

	/**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;        
    }

    public function insert(SellerCreateData $seller){
    	$sql = "INSERT INTO cadRevendedor (revendedor,name,email,tel,cidade,estado,cep,trabArea,msg) VALUES (:revendedor, :name, :email, :tel, :cidade, :estado, :cep, :trabArea, :msg)";

        $sqlUpdate = "UPDATE cadRevendedor SET revendedor = :revendedor, name = :name, email = :email, tel = :tel, cidade = :cidade, estado = :estado, cep = :cep, trabArea = :trabArea, msg = :msg WHERE idcadRevendedor = :id";

        // verify if id exists and update it 
        if ( $seller->idcadRevendedor !== null ) {
            try{
                //continuar aqui
                $seller = $this->selectById($seller->idcadRevendedor);

                if ( $seller !== false ) {
                    $this->connection->beginTransaction();

                    $stmt = $this->connection->prepare( $sqlUpdate );
                    $stmt->bindParam(':id', $seller->idcadRevendedor);
                    $stmt->bindParam(':revendedor', $seller->revendedor);
                    $stmt->bindParam(':name', $seller->name);
                    $stmt->bindParam(':email', $seller->email);
                    $stmt->bindParam(':tel', $seller->tel);
                    $stmt->bindParam(':cidade', $seller->cidade);
                    $stmt->bindParam(':estado', $seller->estado);
                    $stmt->bindParam(':cep', $seller->cep);
                    $stmt->bindParam(':trabArea', $seller->trabArea);
                    $stmt->bindParam(':msg', $seller->msg);
                    $stmt->execute();
                    
                    $this->connection->commit();
                    return true;                        
                }

                return false;

            }catch(PDOException $e){
                // fazer aqui monolog
                $stmt->rollback();
                $e->getMessage();
                return false;
            }

        }else{

         try{

            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare( $sql );

            $stmt->bindParam(':revendedor', $seller->revendedor);
            $stmt->bindParam(':name', $seller->name);
            $stmt->bindParam(':email', $seller->email);
            $stmt->bindParam(':tel', $seller->tel);
            $stmt->bindParam(':cidade', $seller->cidade);
            $stmt->bindParam(':estado', $seller->estado);
            $stmt->bindParam(':cep', $seller->cep);
            $stmt->bindParam(':trabArea', $seller->trabArea);
            $stmt->bindParam(':msg', $seller->msg);
            $stmt->execute();

            $newId = $this->connection->lastInsertId();

            if( $newId !== null){                    
                $this->connection->commit();
                return $newId;
            }

            $stmt->rollback();
            return false;                        

        }catch(PDOException $e){
            echo "Error!: " . $e->getMessage() . "<br/>";
            $stmt->rollback();
            return false;
        }
    }



}

//select a seller for id parameter
public function selectById(int $id)
{
    $sql = "SELECT * FROM cadRevendedor WHERE idcadRevendedor = :id";

    try{
        if( is_integer($id) && $id > 0 ){
            $stmt = $this->connection->prepare( $sql );
            $stmt->bindParam(':id', $id );
            $stmt->execute();

            if( $stmt->rowCount() === 1 ){
                return $seller = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        return false;

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//return all seller
public function selectAllSeller()
{
    $sql = "SELECT * FROM cadRevendedor";

    try{            
        $stmt = $this->connection->prepare( $sql );            
        $stmt->execute();
            
        if ($stmt->rowCount() > 0) {
            return $seller = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

        return false;    

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//delete seller for id
public function delete(int $id){
    $sql = "DELETE FROM cadRevendedor WHERE idcadRevendedor = :id";

    $seller = $this->selectById($id);

    if ( $seller !== false ) {

        $stmt = $this->connection->prepare( $sql );
        $stmt->bindParam(':id', $id );
        return $stmt->execute();
    }

    return false;
}

}