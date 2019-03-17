<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends CI_Controller
{


	public function index()
	{
		//Crrega o Model dos clientes
		$this->load->model('ClientesModel', 'clientes');

		//Cria um array que armazena os clientes e 
		//executamos a funcao no clientesModel getClientes
		$data['clientes'] = $this->clientes->getClientes();

		//loading our view 
		$this->load->view('listaDeClientes', $data);
	}
	public function detalhes($id){
		// carregando o model
		$this->load->model('ClientesModel','cliente');
		//pegando os dados do cliente
		$query = $this->cliente->getClientePorId($id);
		//transformando esses dados em um objeto
		$dados['cliente'] = $query;
		// carregando a view e passando o objeto pra ela
		$this->load->view('detalhes',$dados);
		//se nao tiver dados retornados da query sera redirecionado para o começo
		if($query == null){
			redirect('/');
		}
	}
	public function deletar($id)
	{
		if ($id != null) {

			//carrega o model do cliente
			$this->load->model('ClientesModel', 'clientes');
			//pega os dados do cliente
			$query = $this->clientes->getClientePorId($id);
			//passa o id do cliente como parametro para excluir
			$this->clientes->apagarCliente($query->Id);
			redirect('/');
		}
	}
	public function update($id)
	{	//verificando se possui o id
		if ($id != null) {
			//carregando o model
			$this->load->model('ClientesModel', 'cliente');
			// pegando os dados do cliente
			$query = $this->cliente->getClientePorId($id);
			//fazendo um objeto com os dados do cliente
			$dados['cliente'] = $query;
			//mandando para pagina de atualizar dados
			$this->load->view('AlterarDados', $dados);
			// se os dados estiverem vazios retorna pra pagina principal
			if ($query == null) {
				redirect('/');
			}
		}
	}
	public function adicionarCli()
	{
		//carregando o model 
		$this->load->model('ClientesModel', 'clientes');
		//pegando os dados passados por post e transformando em um objeto para enviar para o banco
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['endereco'] = $this->input->post('endereco');
		$dados['respovend'] = $this->input->post('respovend');
		$dados['cnpf'] = $this->input->post('cnpf');
		$dados['outros'] = $this->input->post('outros');
		//aqui verifica se existe um campo id junto com o objeto se tiver é o processo de update nao 
		//de inserir
		if ($this->input->post('Id') != null) {
			//chamamos o metodo do model atualizar cliente e passamos os parametros
			$this->clientes->atualizarCliente($dados, $this->input->post('Id'));
		} else {
			//chamando o metodo do model adicionar cliente e passando seu parametro
			$this->clientes->addCliente($dados);
			//atualizando a pagina
			redirect('/');
		}
	}
}
