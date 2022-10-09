<?php 
include('../lib/student.class.php');
$s=new Student('localhost','root','','tsmm02');
//print 'id = '.$_GET['id'];
$s->id=$_GET['id'];


if($s->delete()) header('location:affiche_st.php');


?>