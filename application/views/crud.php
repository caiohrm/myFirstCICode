<?php
$this->load->view('includes/menu');
$this->load->view('includes/header');
if($tela !='')$this->load->view('telas/'.$tela);
$this->load->view('includes/footer');