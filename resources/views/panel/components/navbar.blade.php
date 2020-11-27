<nav>
	<a href="/panel/user/update/{{ Auth::user()->id}}">
		<h3>Usuário: {{ Auth::user()->name}}</h3>
		{{-- <pre>{{Auth::user()}}</pre> --}}
	</a>
	<ul>
		@if (authMenu('panel.home'))
			<li><a href="/panel">Home</a></li>
		@endif
		@if (authMenu('panel.user'))
			<li><a href="/panel/user">Usuários</a></li>	
		@endif
		@if (authMenu('panel.userType'))	
			<li><a href="/panel/user_type">Tipos de Usuários</a></li>
		@endif
		<li><a href="/panel/login/logout">Logout</a></li>
		@if (authMenu('panel.vendas'))	
			<li><a href="#">Vendas</a></li>
		@endif
		@if (authMenu('panel.relatorio'))	
			<li><a href="#">Relatório</a></li>
		@endif
		@if (authMenu('panel.clientes'))	
			<li><a href="#">Lista de Clientes</a></li>
		@endif
	</ul>
</nav>