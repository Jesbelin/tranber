<h1>Modification</h1>


<form method="post" action="">
	<label for="login">Identifiant</label>
	<input type="text" name="login" id="login" required value="<?= $login ?? null ?>">
	<br>
	<label for="password">Mot de Passe</label>
	<input type="password" name="password" id="password" required>
	<br>
	<label for="email">Email</label>
	<input type="email" name="email" id="email" required value="<?= $email ?? null ?>">
	<br>
	<input type="submit" value="Ok">


</form>