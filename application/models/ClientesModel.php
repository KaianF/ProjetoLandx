<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//todos os metodos aqui estao relacionados com o banco de dados
class ClientesModel extends CI_Model{
    //Bsuca de todos os clientes no banco de dados
    public function getClientes(){  
        //metodo get usa como parametro o nome da tabela
        $query = $this->db->get('clientes');
        //retorna os dados obtidos da tabela
        return $query->result();
    }

    //adiciona o cliente
    public function addCliente($dados){
        //verifica se os dados não são nulos
        if($dados!=null){
            //metodo insert utiliza dois parametros (Nome da tabela,os dados que devem inserir)
           $this->db->insert('clientes',$dados);
        }
    }

    //Busca o cliente por Id 
    public function getClientePorId($id){
        //verificamo se o id não é igual a nulo
        if($id!=null){
            //aqui o metodo where faz o select que nem o get Clientes porem com um 
            //where assim verificando se a id existe no banco
            $this->db->where('id',$id);
            //limite de resultados para voltar apenas um cliente e não varios
            $this->db->limit(1);
            //pega o resultado
            $query = $this->db->get("clientes");
            //retorna o cliente
            return $query->row();
        }

    }

    //atualiaza dos dados do cliente no banco de dados
    public function atualizarCliente($dados,$id){
        if($id != null && $dados != null){
            //se foi passado os dados ele atualiza
            $this->db->update('clientes',$dados,array('Id'=>$id));
        }
    }
    
    //apaga o cliente do banco de dados 
    public function apagarCliente($id){
        if($id!=null){
            //se o id for passado ele deleta o cliente
            $this->db->delete('clientes',array('Id'=>$id));
        }
    }
}