<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<a href="ajout_st.php">Ajouter étudiant</a>
</body>
</html>
<?php 
include('../lib/student.class.php');
$s=new Student('localhost','root','','tsmm02');
$s->retreive();
?>