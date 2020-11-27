<h1>Tela de Login</h1>
<form method="POST" action="/panel/login/authenticate">
	@csrf
	<div>
		<label for="email">E-mail*</label>
		<input type="email" id="email" name="email" required>
	</div>
	<div>
		<label for="password">Senha*</label>
		<input type="password" id="password" name="password" required>
	</div>
	<button type="submit">Enviar</button>
</form>
