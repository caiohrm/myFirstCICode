<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 22/04/2016
 * Time: 17:56
 */
$iduser = $this->uri->segment(3);
if($iduser == NULL) redirect('crud/retrieve');
$query = $this->crud->get_byid($iduser)->row();
echo form_open("crud/update/$iduser");
echo validation_errors('<p>','</p>');
if($this->session->flashdata('edicaook'))
    echo '<p>'.$this->session->flashdata('edicaook').'</p>';
echo form_label('Nome completo:');
echo form_input(array('placeholder'=> 'Nome','id'=>'nome','name'=>'nome'),set_value('nome',$query->nome),'autofocus');
echo form_label('Email:');
echo form_input(array('placeholder'=> 'E-mail','id'=>'email','name'=>'email'),set_value('email',$query->email),'disabled="disabled"');
echo form_label('Login:');
echo form_input(array('placeholder'=> 'Login','id'=>'login','name'=>'login'),set_value('login',$query->login),'disabled="disabled"');
echo form_label('Senha:');
echo form_password(array('placeholder'=> 'Senha','id'=>'senha','name'=>'senha'),set_value('senha'));
echo form_label('Repita a senha:');
echo form_password(array('placeholder'=> 'Senha','id'=>'senha2','name'=>'senha2'),set_value('senha2'));
echo form_submit(array('name'=>'cadastrar'),'Alterar');
echo form_hidden('idusuario',$query->id);
echo form_close();