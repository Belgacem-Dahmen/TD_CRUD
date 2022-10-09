<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		<label for="">Nom :</label>
		<input type="text" name="nom" id="" />
		<br />
		<label for="">Email :</label>
		<input type="text" name="email" id="" />
		<br />
		<label for="">Adresse : </label>
		<input type="text" name="adresse" id="" />
		<br />
		<input type="submit" value="Enregistrer" name="btn_enregistrer" />
	</form>
</body>
</html>

<?php
if(isset($_POST['btn_enregistrer'])): 
include('../lib/student.class.php');
$s=new Student('localhost','root','','tsmm02');

$s->nom=$_POST['nom'];
$s->email=$_POST['email'];
$s->adresse=$_POST['adresse'];

if($s->create()) header('location:affiche_st.php');

endif;
?>