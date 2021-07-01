<?php
namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserCreateData;
use PDO;
use UnexpectedValueException;
use App\Password\Bcrypt;

/**
 * Repository.
 */
class UserCreatorRepository
{
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

    /**
     * Insert user row.
     *
     * @param UserCreateData $user The user
     *
     * @return int The new ID
     */
    public function insertUser(UserCreateData $user): int
    {   
        if ( !empty ( $user->getPassword() ) ) {
           $hash = Bcrypt::hash( '12345' );
        }else{
            $hash = null;
        }
        

        $row = [
            'username' => $user->getUsername(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $hash,
            'update_time' => $user->getUpdate_time(),
            'create_time' => $user->getCreate_time()
        ];

        $sql = "INSERT INTO users (username, first_name, last_name, email, password, update_time, create_time) 
        VALUES (:username, :first_name, :last_name, :email, :password, :update_time, :create_time )";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($row);

        return (int) $this->connection->lastInsertId();            
        
    }

    public function selectUser(Integer $id)
    {
        $sql = 'SELECT username, password, first_name, last_name, create_time, update_time, email, id
        FROM users WHERE id = ?';        

        $stmt = $this->connection->prepare($sql)->execute([$id]);
        return $data = $stmt->fetch(); 

    }

    public function selectAllUsers()     
    {   
        $sql = 'SELECT * FROM users';
        $data = $this->connection->query($sql)->fetchAll();
        if ( !empty( $data ) ) {            
            return $data;
        }else{
            return $data=['user' => 'repo'];
        }
        
    }
}
