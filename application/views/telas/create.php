<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 22/04/2016
 * Time: 17:56
 */
echo form_open("crud/create");
echo validation_errors('<p>','</p>');
if($this->session->flashdata('cadastrook'))
    echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
echo form_label('Nome completo:');
echo form_input(array('placeholder'=> 'Nome','id'=>'nome','name'=>'nome'),set_value('nome'),'autofocus');
echo form_label('Email:');
echo form_input(array('placeholder'=> 'E-mail','id'=>'email','name'=>'email'),set_value('email'));
echo form_label('Login:');
echo form_input(array('placeholder'=> 'Login','id'=>'login','name'=>'login'),set_value('login'));
echo form_label('Senha:');
echo form_password(array('placeholder'=> 'Senha','id'=>'senha','name'=>'senha'),set_value('senha'));
echo form_label('Repita a senha:');
echo form_password(array('placeholder'=> 'Senha','id'=>'senha2','name'=>'senha2'),set_value('senha2'));
echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
echo form_close();