<?php
namespace App\Domain\Site\Repository;

use App\Domain\Site\Data\NewsletterCreateData;
use PDO;

final class NewsletterRepository{

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

    public function insertNewsletter(NewsletterCreateData $news){
    	$sql = "INSERT INTO newsletter (email,active) VALUES (:email, :active)";
        $sqlUpdate = "UPDATE newsletter SET email = :email, active = :active WHERE idnewsletter = :id";

        // verify if id exists and update it 
        if ( $news->getId() !== null ) {
            try{

                $newsletter = $this->selectNewsletter($news->getId());

                if ( $newsletter !== false ) {
                    $this->connection->beginTransaction();

                    $stmt = $this->connection->prepare( $sqlUpdate );
                    $stmt->bindParam(':id', $news->getId() );
                    $stmt->bindParam(':email', $news->getEmail() );
                    $stmt->bindParam(':active', $news->getActive() );
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
            //verify if email already exists in database
            $emailExists = $this->selectNewsletterByEmail($news->getEmail());

            //insert new newsletter in database
            if ( filter_var($news->getEmail(), FILTER_VALIDATE_EMAIL) && $emailExists === false ) {

                $this->connection->beginTransaction();

                $stmt = $this->connection->prepare( $sql );
                $stmt->bindParam(':email', $news->getEmail());
                $stmt->bindParam(':active', $news->getActive());
                $stmt->execute();
                
                $newId = $this->connection->lastInsertId();
                
                if( $newId !== null){                    
                    $this->connection->commit();
                    return $newId;
                }
                $stmt->rollback();
                return false;
            }
            return false;            

        }catch(PDOException $e){
            echo "Error!: " . $e->getMessage() . "<br/>";
            $stmt->rollback();
            return false;
        }
    }



}

//select a newsletter for id parameter
public function selectNewsletter(int $id)
{
    $sql = "SELECT * FROM newsletter WHERE idnewsletter = :id";

    try{
        if( is_integer($id) && $id > 0 ){
            $stmt = $this->connection->prepare( $sql );
            $stmt->bindParam(':id', $id );
            $stmt->execute();

            if( $stmt->rowCount() === 1 ){
                return $newsletter = $stmt->fetch(PDO::FETCH_ASSOC);
            }

        }
        return false;
    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//select a newsletter by id parameter
public function selectNewsletterByEmail($email)
{
    $sql = "SELECT * FROM newsletter WHERE email = :email";

    try{
        if( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ){

            $stmt = $this->connection->prepare( $sql );
            $stmt->bindParam(':email', $email );
            $stmt->execute();

            if( $stmt->rowCount() > 0 ){
                return $newsletter = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

        }

        return false;

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//return all newsletter
public function selectAllNewsletter()
{
    $sql = "SELECT * FROM newsletter";

    try{            
        $stmt = $this->connection->prepare( $sql );            
        $stmt->execute();
            //var_dump($stmt->rowCount());
        if ($stmt->rowCount() > 0) {
            return $newsletter = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
        return false;    

    }catch(PDOException $e){
        echo "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

//delete newsletter for id
public function delete(int $id){
    $sql = "DELETE FROM newsletter WHERE idnewsletter = :id";

    $newsletter = $this->selectNewsletter($id);

    if ( $newsletter !== false ) {

        $stmt = $this->connection->prepare( $sql );
        $stmt->bindParam(':id', $id );
        return $stmt->execute();
    }

    return false;
}

}