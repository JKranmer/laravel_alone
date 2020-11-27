@extends('panel.layouts.app')

@section('title', 'User Tipo')

@section('content')

<h1>Lista Tipo de Usuário</h1>
<a href="/panel/user_type/insert">Novo</a>
<table>
	<thead>
		<tr>
			<th style="width: 20px">ID</th>
			<th>Descrição</th>
			<th>Nível</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($userType as $item)		
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->desc}}</td>
				<td>{{$item->level}}</td>
				<td>
					@if ($item->deleted_at !=null)
						<a href="/panel/user_type/enable/{{$item->id}}">Habilitar</a>
					@else
						<a href="/panel/user_type/update/{{$item->id}}">Editar</a>
						<a href="/panel/user_type/delete/{{$item->id}}">Deletar</a>
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection