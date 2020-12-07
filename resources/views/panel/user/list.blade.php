@extends('panel.layouts.app')

@section('title', 'User')

@section('content')
	<h1 class="my-5">Lista Usuário</h1>
	@if (Auth::user()->can('form-user'))		
		<a href="/panel/user/insert">Novo</a>
	@endif
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Superior</th>
				<th scope="col">Cargo</th>
				<th scope="col">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($user as $item)		
				<tr>
					<td scope="row">{{$item->id}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->email}}</td>
					<td>{{isset($item->user) ? $item->user->name : '--'}}</td>
					<td>{{$item->userType->desc}}</td>
					<td>
						@if (Auth::user()->can('form-user', $item) && !$item->deleted_at !=null)
							<a href="/panel/user/update/{{$item->id}}" class="btn btn-info" title="Editar">
								<svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
									<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
								</svg>
							</a>
						@elseif (Auth::user()->can('enable-user', $item) && $item->deleted_at !=null)
							<a href="/panel/user/enable/{{$item->id}}" title="Habilitar" class="btn btn-info">
								<svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
									<path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
								</svg>
							</a>
						@endif

						@if(Auth::user()->can('delete-user', $item))
							<a href="/panel/user/delete/{{$item->id}}" class="btn btn-danger" title="Deletar">
								<svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
									<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
								</svg>
							</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection