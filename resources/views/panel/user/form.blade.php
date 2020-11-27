<form method="post" action="/panel/user/save">
	@csrf
	<input type="hidden" name="id"  value="{{is_null($user) ? '' : $user->id}}">
	<div>
		<label for="name">Nome*</label>
		<input type="text" id="name" name="name" value="{{is_null($user) ? '' : $user->name}}" maxlength="128" required>
	</div>
	<div>
		<label for="email">E-mail*</label>
		<input type="email" id="email" name="email" value="{{is_null($user) ? '' : $user->email}}" required>
	</div>
	<div>
		<label for="password">Senha</label>
		<input type="password" id="password" name="password" value="">
	</div>
	<div>
		<label for="passwordConf">Confirmar Senha</label>
		<input type="password" id="passwordConf" name="passwordConf" value="">
	</div>
	<div>
		<label for="user_type">Tipo</label>
		<select name="user_type_id" id="user_type" @if (!authMenu('panel.user')) disabled @endif>
			<option value="">Selecione</option>
			@foreach ($userType as $item)
				<option value="{{$item->id}}" {{(!is_null($user) && $user->user_type_id == $item->id) ? 'selected' : ''}}>{{$item->desc}}</option>
			@endforeach
		</select>
	</div>
	<div>
		<label for="user_id">Superior</label>
		<select name="user_id" id="user_id" @if (!authMenu('panel.user')) disabled @endif>
			<option value="">Selecione</option>
			@foreach ($higher as $item)
				<option value="{{$item->id}}" {{(!is_null($user) && $user->user_id == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
			@endforeach
		</select>
	</div>
	<button type="submit">Enviar</button>
</form>