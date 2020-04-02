<?php
namespace App\Domain\Pessoa\Repository;

use App\Domain\Pessoa\Data\PessoaCreateData;
use App\Domain\Pessoa\Data\EnderecoCreateData;
use App\Domain\Pessoa\Data\EmailCreateData;
use App\Domain\Pessoa\Data\TelefoneCreateData;
use PDO;
use UnexpectedValueException;
use App\ie\Bcrypt;
/**
 * Repository.
 */
class PessoaRepository
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
     * Insert pessoa row.
     *
     * @param pessoaCreateData $pessoa The pessoa
     *
     * @return int The new ID
     */
    public function insertPessoa(PessoaCreateData $pessoa): int
    {   
        /* CONFIGURA DATA DE INCLUSAO E USUARIO QUE INCLUIU */
        $pessoa->setInclusao( $pessoa->getDateNow() );
        $pessoa->setUltima_alteracao( $pessoa->getDateNow() );
        $pessoa->setIncluido_por('PessoaRepository:insertPessoa');
        $pessoa->setAlterado_por('PessoaRepository:insertPessoa');        

        /* CONFIGURA ARRAY COM DADOS DA PESSOA QUE SERÁ INSERIDO NO BANCO */
        $row = [
            'nome' => $pessoa->getNome(),
            'nome_abreviado' => $pessoa->getNome_abreviado(),
            'contato' => $pessoa->getContato(),
            'cnpj_cpf' => $pessoa->getCnpj_cpf(),
            'ie' => $pessoa->getIe(),
            'im' => $pessoa->getIm(),
            'tipo_atividade' => $pessoa->getTipo_atividade(),
            'inclusao' => $pessoa->getInclusao(),
            'ultima_alteracao' => $pessoa->getUltima_alteracao(),
            'incluido_por' => $pessoa->getIncluido_por(),
            'alterado_por' => $pessoa->getAlterado_por()  
        ];

        /* QUERY PARA INSERIR NO BANCO */
        $sql = "INSERT INTO pessoas (nome, nome_abreviado, contato, cnpj_cpf, ie, im, tipo_atividade, inclusao, ultima_alteracao, incluido_por, alterado_por) 
        VALUES (:nome, :nome_abreviado, :contato, :cnpj_cpf, :ie, :im, :tipo_atividade, :inclusao, :ultima_alteracao, :incluido_por, :alterado_por)";


        if ( !empty ( $pessoa->getNome() ) ) {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($row);
            return (int) $this->connection->lastInsertId();  
        }else{
            return 0;
        }

    }

    public function insertEndereco(EnderecoCreateData $endereco): int
    {           
        /* CONFIGURA ARRAY COM DADOS DA PESSOA QUE SERÁ INSERIDO NO BANCO */
        $row = [
            'id_pessoa' => $endereco->getId_pessoa(),
            'endereco' => $endereco->getEndereco(),
            'numero' => $endereco->getNumero(),
            'cidade' => $endereco->getCidade(),
            'estado' => $endereco->getEstado(),
            'bairro' => $endereco->getBairro(),
            'cep' => $endereco->getCep()            
        ];

        /* QUERY PARA INSERIR NO BANCO */
        $sql = "INSERT INTO endereco (endereco, numero, cidade, estado, bairro, cep ) 
        VALUES (:endereco, :numero, :cidade, :estado, :bairro, :cep )";

        if ( !empty ( $endereco ) ) {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($row);
            return (int) $this->connection->lastInsertId();  
        }else{
            return 0;
        }
    }

    public function insertEmail(EmailCreateData $email): int
    {           
        /* CONFIGURA ARRAY COM DADOS DA PESSOA QUE SERÁ INSERIDO NO BANCO */
        $row = [
            'id_pessoa' => $email->getId_pessoa(),
            'email' => $email->getEmail()                        
        ];

        /* QUERY PARA INSERIR NO BANCO */
        $sql = "INSERT INTO email (id_pessoa, email ) 
        VALUES (:id_pessoa, :email )";

        if ( !empty ( $email->getEmail() ) ) {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($row);
            return (int) $this->connection->lastInsertId();  
        }else{
            return 0;
        }
    }

    public function insertTelefone(TelefoneCreateData $telefone): int
    {           
        /* CONFIGURA ARRAY COM DADOS DA PESSOA QUE SERÁ INSERIDO NO BANCO */
        $row = [
            'id_pessoa' => $telefone->getId_pessoa(),
            'telefone' => $telefone->getTelefone()                        
        ];

        /* QUERY PARA INSERIR NO BANCO */
        $sql = "INSERT INTO telefone (id_pessoa, telefone ) 
        VALUES (:id_pessoa, :telefone )";

        if ( !empty ( $telefone->getTelefone() ) ) {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($row);
            return (int) $this->connection->lastInsertId();  
        }else{
            return 0;
        }
    }

    public function insertFlags(FlagsCreateData $flags): int
    {           

    }


    public function selectPessoa(Integer $id)
    {
        $sql = 'SELECT *
        FROM pessoas WHERE id = ?';        

        $stmt = $this->connection->prepare($sql)->execute([$id]);
        return $data = $stmt->fetch(); 
    }

    public function selectAllpessoas()     
    {   
        $sql = 'SELECT * FROM pessoas';
        $data = $this->connection->query($sql)->fetchAll();
        if ( !empty( $data ) ) {            
            return $data;
        }else{
            return $data=['pessoa' => 'repo'];
        }

    }
}
