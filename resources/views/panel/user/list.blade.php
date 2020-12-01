@extends('panel.layouts.app')

@section('title', 'User')

@section('content')
	<h1>Lista Usuário</h1>
	<a href="/panel/user/insert">Novo</a>
	<table>
		<thead>
			<tr>
				<th style="width: 20px">ID</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Cargo</th>
				<th>Superior</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($user as $item)		
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->email}}</td>
					{{-- <td>{{$item->user->name}}</td> --}}
					<td>{{$item->userType->desc}}</td>
					<td>--</td>
					<td>
						@if ($item->deleted_at !=null)
							<a href="/panel/user/enable/{{$item->id}}">Habilitar</a>
						@else
							<a href="/panel/user/update/{{$item->id}}">Editar</a>
							<a href="/panel/user/delete/{{$item->id}}">Deletar</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/panel/login/logout">Logout</a>
@endsection