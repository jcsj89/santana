<?php

namespace App\Domain\Pessoa\Service;

use App\Domain\Pessoa\Data\PessoaCreateData;
use App\Domain\Pessoa\Data\EnderecoCreateData;
use App\Domain\Pessoa\Data\EmailCreateData;
use App\Domain\Pessoa\Data\TelefoneCreateData;
use App\Domain\Pessoa\Repository\PessoaRepository;

/**
 * Service.
 */
final class PessoaCreator
{
    /**
     * @var PessoaRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param PessoaRepository $repository The repository
     */
    public function __construct(PessoaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new pessoa.
     *
     * @param PessoaCreateData $pessoa The pessoa data
     *
     * @return int The new pessoa ID
     */
    public function createPessoa(PessoaCreateData $pessoa, EnderecoCreateData $endereco, EmailCreateData $email, TelefoneCreateData $telefone ): int
    {
        // Validation pessoa
        if ( empty( $pessoa->getNome() ) ) {
            return false;
        }
        // Insert pessoa
        $pessoaId = $this->repository->insertPessoa($pessoa);

        //Insere endereco, email, telefone
        if ( $pessoaId > 0 ) {
            $endereco->setId_pessoa( $pessoaId );
            $email->setId_pessoa( $pessoaId );
            $telefone->setId_pessoa( $pessoaId );
            
            $this->repository->insertEndereco( $endereco );
            $this->repository->insertEmail( $email );
            $this->repository->insertTelefone( $telefone );
        }

        // Logging here: pessoa created successfully
        return $pessoaId;
    }
}