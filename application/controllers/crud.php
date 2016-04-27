<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 22/04/2016
 * Time: 17:22
 */
class Crud extends  CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->model('crud_model','crud');
        $this->load->library('table');
    }

    public function index(){
    $dados = array(
        'titulo' => 'Crud com CodeIgniter',
        'tela' => '',
    );
    $this ->load->view('crud',$dados);
}
    private function chamada($tela='',$data=NULL)
    {
        $dados = array(
            'titulo' => 'Crud &raquo; '.ucwords(strtolower($tela)),
            'tela' => $tela,
        );
        if($data != NULL)
            $dados = array_merge($dados,$data);
        $this ->load->view('crud',$dados);

    }

    public function create(){
        $this->form_validation->set_rules('nome','NOME','trim|required|alpha_numeric_spaces|max_length[50]|ucwords');
        $this->form_validation->set_rules('email','EMAIL','trim|required|strtolower|valid_email|is_unique[curso.email]|max_length[50]');
        $this->form_validation->set_rules('login','LOGIN','trim|max_length[50]|strtolower|required|is_unique[curso.login]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');
        if($this->form_validation->run()):
            $dados = elements(array('nome','email','login','senha'),$this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->crud->do_insert($dados);
        endif;
        $this->chamada('create');
    }

    public function retrieve(){
        $data = array(
          'usuarios' =>  $this->crud->get_all()->result(),
    );
        $this->chamada('retrieve',$data);
    }

    public function update(){
        $this->form_validation->set_rules('nome','NOME','trim|required|alpha_numeric_spaces|max_length[50]|ucwords');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');
        if($this->form_validation->run()):
            $dados = elements(array('nome','senha'),$this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->crud->do_update($dados, array('id'=> $this->input->post('idusuario')));
        endif;
        $this->chamada('update');
    }

    public function delete(){
        if($this->input->post('idusuario')>0):
            $this->crud->do_delete(array('id'=> $this->input->post('idusuario')));
        endif;
        $this->chamada('delete');
    }




}