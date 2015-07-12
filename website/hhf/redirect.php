<?php
session_start();

if($_SESSION['type']=='admin')
{
	header('Location: adminhome.php');
}

if($_SESSION['type']=='partner')
{
	header('Location: partnerhome.php');
}