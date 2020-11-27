<form method="post" action="/panel/user_type/save">
	@csrf
	<input type="hidden" name="id"  value="{{is_null($userType) ? '' : $userType->id}}">
	<div>
		<label for="desc">Descrição*</label>
	<input type="text" id="desc" name="desc" value="{{is_null($userType) ? '' : $userType->desc}}" maxlength="128" required>
	</div>
	<div>
		<label for="level">Nivel*</label>
		<input type="number" id="level" name="level" value="{{is_null($userType) ? '' : $userType->level}}" required>
	</div>
	<button type="submit">Enviar</button>
</form>