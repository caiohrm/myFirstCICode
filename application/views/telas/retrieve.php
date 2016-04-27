<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 22/04/2016
 * Time: 17:56
 */

echo '<h2>Lista de usuários</h2>';
if($this->session->flashdata('excluirok'))
    echo '<p>'.$this->session->flashdata('excluirok').'</p>';

$template = array(
    'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
);

$this->table->set_template($template);
$this->table->set_heading('ID','Nome','E-mail','Login','Operações');
foreach ($usuarios as $linha):
        $this->table->add_row($linha->id,$linha->nome,$linha->email,$linha->login,anchor("crud/update/$linha->id",'Editar').'-'.
            anchor("crud/delete/$linha->id",'Excluir'));
endforeach;
    echo $this->table->generate();