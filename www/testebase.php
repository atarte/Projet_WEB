<html>
	<head>
		<title>Test</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>BDD</h1>

		<form action="suivant.php" method="post">
			<label for="Login"> Login : </label>
			<input type="text" id="username" name="username">
			<br>
			<label for="Password"> Password : </label>
			<input type="password" id="passwd" name="passwd">
			<br>
			<input type="submit" id="envoyer" value="Envoyer">
		</form>

		<br>
		<br>
		<br>
		
		<form action="suivant.php" method="post" id="envoi" style="display:none">
			<input type="hidden" id="id_users" name="id_users">
			<input type="submit" id="sub">
		</form>
	</body>
	<script src="connexion.js"></script>
</html>