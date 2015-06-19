<?php 
	session_start();
	unset($_SESSION[adminuser]);
        unset($_SESSION[adminpass]);
        unset($_SESSION[tipe]);
        session_destroy();
	header('location:../index.php');
