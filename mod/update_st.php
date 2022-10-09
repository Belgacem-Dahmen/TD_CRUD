<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="post">
		<label for="">ID :</label>
		<input type="text" name="id" id="" readonly value="<?= $_GET['id'];?> "/>
		<br />
		<label for="">Nom :</label>
		<input type="text" name="nom" id="" value="<?= $_GET['nom'];?>" />
		<br />
		<label for="">Email :</label>
		<input type="text" name="email" id="" value="<?= $_GET['email'];?>" />
		<br />
		<label for="">Adresse : </label>
		<input type="text" name="adresse" id="" value="<?= $_GET['adresse'];?>" />
		<br />
		<input type="submit" value="Modifier" name="btn_modifier" />
	</form>
</body>
</html>
<?php 

include('../lib/student.class.php');

if (isset($_POST['btn_modifier'])){

	$s=new Student('localhost','root','','tsmm02');
	$s->id=$_POST['id'];
	$s->nom=$_POST['nom'];
	$s->email=$_POST['email'];
	$s->adresse=$_POST['adresse'];
	
	if($s->update()) header('location:affiche_st.php');
}





?>