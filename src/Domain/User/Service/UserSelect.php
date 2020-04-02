<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserCreateData;
use App\Domain\User\Repository\UserCreatorRepository;


/**
 * Service.
 */
final class UserSelect
{
    /**
     * @var UserCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserCreatorRepository $repository The repository
     */
    public function __construct(UserCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param UserCreateData $user The user data
     *
     * @return int The new user ID
     */
    public function selectUser(int $id)
    {
        // Validation
        if ( is_int( $id ) && $id > 0 ) {
            $user = $this->repository->selectUser( $id );
            return $user;
        }else{
            return $user=['user'=>'servico'];
        }    
        // Logging here: User created successfully        
    }

    public function selectAllUsers()
    {
        $users = $this->repository->selectAllUsers();
        // Validation
        if (!empty($users) ) {            
            return $users;
        }else{
            return $users=['user'=>'servico'];
        }    
        // Logging here: User created successfully        
    }
}