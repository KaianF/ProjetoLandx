<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


	public function index()
	{
		//Crrega o Model dos clientes
		$this->load->model('ClientesModel','clientes');

		//Cria um array que armazena os clientes e 
		//executamos a funcao no clientesModel getClientes
		$data['clientes'] = $this->clientes->getClientes();

		//loading our view 
		$this->load->view('listaDeClientes',$data);
		if($_SERVER['REQUEST_METHOD'] == 'POST') { // aqui é onde vai decorrer a chamada se houver um *request* POST
			$clientes =$this;
			$clientes->adicionarCli($_POST);
			header("Refresh:0");
			
		}
	}
	public function update($id){
		$this->load->model('ClientesModel','clientes');
		$query = $this->clientes->getClienteById($id);

		$dados['cliente'] = $query;
		$this->load->view('update',$dados);
	}
	public function adicionarCli(){
		$this->load->model('ClientesModel','clientes');

		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');
		$dados['telefone'] = $this->input->post('telefone'); 
		$dados['endereco'] = $this->input->post('endereco');
		$dados['respovend'] = $this->input->post('respovend');
		$dados['cnpf'] = $this->input->post('cnpf');
		$dados['outros'] = $this->input->post('outros');

		$this->clientes->addCliente($dados);
		
	}

}

