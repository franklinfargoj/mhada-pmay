<?php
// include head 
$this->load->view('template_new/header');

// include header 
$this->load->view('template_new/topbar');

$this->load->view($middle);

// include footer
$this->load->view('template_new/footer');