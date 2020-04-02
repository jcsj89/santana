<?php
namespace App\Domain\Pessoa\Data;

//use App\Domain\Pessoa\Data\EmailCreateData;
//use App\Domain\Pessoa\Data\EnderecoCreateData;
//use App\Domain\Pessoa\Data\TelefoneCreateData;
use DateTime;

/**
 * Description of PessoaCreateData
 *
 * @author Junior
 */
final class PessoaCreateData
{
	private $id;
	private $nome;
	private $nome_abreviado;
	private $contato;
	private $cnpj_cpf;	
	private $ie;
	private $im;
	private $tipo_atividade;

	private $emails=[];
	private $enderecos=[];
	private $telefones=[];
	private $tags=[];	

	private $inclusao;
	private $ultima_alteracao;
	private $incluido_por;
	private $alterado_por;

	public function __construct()
	{
		$this->nome ='';
		$this->nome_abreviado ='';
		$this->contato ='';
		$this->cnpj_cpf ='';	
		$this->ie ='';
		$this->im ='';
		$this->tipo_atividade ='';

		$this->emails=[];	
		$this->enderecos=[];
		$this->telefones=[];
		$this->tags = [];	

		$this->inclusao;
		$this->setUltima_alteracao( $this->getDateNow() );
		$this->incluido_por;
		$this->alterado_por;
	}

	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getNome_abreviado() {
		return $this->nome_abreviado;
	}

	public function getContato() {
		return $this->contato;
	}

	public function getCnpj_cpf() {
		return $this->cnpj_cpf;
	}

	public function getIe() {
		return $this->ie;
	}

	public function getIm() {
		return $this->im;
	}

	public function getTipo_atividade() {
		return $this->tipo_atividade;
	}

	public function getEmails() {
		return $this->emails;
	}

	public function getEnderecos() {
		return $this->enderecos;
	}

	public function getTelefones() {
		return $this->telefones;
	}

	public function getTags() {
		return $this->tags;
	}

	public function getInclusao() {
		return $this->inclusao;
	}

	public function getUltima_alteracao() {
		return $this->ultima_alteracao;
	}

	public function getIncluido_por() {
		return $this->incluido_por;
	}

	public function getAlterado_por() {
		return $this->alterado_por;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setNome_abreviado($nome_abreviado) {
		$this->nome_abreviado = $nome_abreviado;
	}

	public function setContato($contato) {
		$this->contato = $contato;
	}

	public function setCnpj_cpf($cnpj_cpf) {
		$this->cnpj_cpf = $cnpj_cpf;
	}

	public function setIe($ie) {
		$this->ie = $ie;
	}

	public function setIm($im) {
		$this->im = $im;
	}

	public function setTipo_atividade($tipo_atividade) {
		$this->tipo_atividade = $tipo_atividade;
	}

	public function setEmails($emails) {
		$this->emails[] = $emails;
	}

	public function setEnderecos($enderecos) {
		$this->enderecos[] = $enderecos;
	}

	public function setTelefones($telefones) {
		$this->telefones[] = $telefones;
	}

	public function setTags($tags) {
		$this->tags[] = $tags;
	}

	public function setInclusao($inclusao) {
		$this->inclusao = $inclusao;
	}

	public function setUltima_alteracao($ultima_alteracao) {
		$this->ultima_alteracao = $ultima_alteracao;
	}

	public function setIncluido_por($incluido_por) {
		$this->incluido_por = $incluido_por;
	}

	public function setAlterado_por($alterado_por) {
		$this->alterado_por = $alterado_por;
	}

        //função retorna data formato para salvar no banco
	public function getDateNow()
	{
		$now = new DateTime();
		$today = $now->format('Y-m-d H:i:s');
		return $today;
	}
	
}