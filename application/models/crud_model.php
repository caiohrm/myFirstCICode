<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 25/04/2016
 * Time: 14:36
 */

class Crud_model extends CI_Model{

    public function do_insert($dados=NULL)
    {
        if($dados!= NULL):
            $this->db->insert('curso',$dados);
            $this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
            redirect('crud/create');
        endif;
    }

    public function get_all(){
        return $this->db->get('curso');
    }
    public function get_byid($id=NULL){
        if($id != NULL):
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('curso');
         else:
             return false;
        endif;
    }
    public function do_update($dados=NULL,$condicao=NULL){
        if($dados != null && $condicao != null):
            $this->db->update('curso',$dados,$condicao);
            $this->session->set_flashdata('edicaook','Cadastro alterado com sucesso');
        endif;
    }

    public function do_delete($condicao=NULL){
        if($condicao != null):
            $this->db->delete('curso',$condicao);
            $this->session->set_flashdata('excluirok','Registro excluido com sucesso');
        endif;
        redirect('crud/retrieve');
    }



}