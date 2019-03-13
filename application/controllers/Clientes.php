<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


	public function index()
	{
		//loading our model
		$this->load->model('ClientesModel','clientes');

		//picking data from the model
		$data['clientes'] = $this->clientes->getClientes();

		//loading our view 
		$this->load->view('listaDeClientes',$data);
	}
}
