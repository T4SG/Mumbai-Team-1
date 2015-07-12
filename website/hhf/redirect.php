<?php
session_start();

//redirects to relevant home page

if($_SESSION['type']=='admin')
{
	header('Location: adminhome.php');
}

if($_SESSION['type']=='partner')
{
	header('Location: partnerhome.php');
}