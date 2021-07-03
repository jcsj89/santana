<?php
namespace App\Domain\Site\Repository;

use App\Domain\Site\Data\ResearchCreateData;
use PDO;

final class ResearchRepository{

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

    public function insert(ResearchCreateData $research){
    	$sql = "INSERT INTO sugestao (nossocliente,recomendaproduto,sugestao) VALUES (:nossocliente,:recomendaproduto,:sugestao)";

        $sqlUpdate = "UPDATE sugestao SET nossocliente=:nossocliente, recomendaproduto=:recomendaproduto, sugestao=:sugestao WHERE idsugestao=:id";

        // verify if id exists and update it 
        if ( $research->idsugestao !== null ) {
            try{
                //for verify if exists id                
                $research1 = $this->selectById($research->idsugestao);            

                if ( $research1 !== false ) {
                    
                    $this->connection->beginTransaction();

                    $stmt = $this->connection->prepare( $sqlUpdate );
                    
                    $stmt->bindParam(':id', $research->idsugestao);
                    $stmt->bindParam(':nossocliente', $research->nossocliente);
                    $stmt->bindParam(':recomendaproduto', $research->recomendaproduto);
                    $stmt->bindParam(':sugestao', $research->sugestao);
                    
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

            $stmt->bindParam(':nossocliente', $research->nossocliente);
            $stmt->bindParam(':recomendaproduto', $research->recomendaproduto);
            $stmt->bindParam(':sugestao', $research->sugestao);            
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
    $sql = "SELECT * FROM sugestao WHERE idsugestao = :id";

    try{
        if( is_integer($id) && $id > 0 ){
            $stmt = $this->connection->prepare( $sql );
            $stmt->bindParam(':id', $id );
            $stmt->execute();

            if( $stmt->rowCount() === 1 ){                
                return $research = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        return false;

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//return all seller
public function selectAll()
{
    $sql = "SELECT * FROM sugestao";

    try{            
        $stmt = $this->connection->prepare( $sql );            
        $stmt->execute();
            
        if ($stmt->rowCount() > 0) {
            return $research = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

        return false;    

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//delete seller for id
public function delete(int $id){
    $sql = "DELETE FROM sugestao WHERE idsugestao = :id";

    $research = $this->selectById($id);

    if ( $research !== false ) {

        $stmt = $this->connection->prepare( $sql );
        $stmt->bindParam(':id', $id );
        return $stmt->execute();
    }

    return false;
}

}