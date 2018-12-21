<?php
// include head 
$this->load->view('template/header');

// include header 
$this->load->view('template/topbar');

// include sidebar
$this->load->view('template/sidebar');

$this->load->view($middle);

// include downbar
$this->load->view('template/downbar');

// include footer
$this->load->view('template/footer');