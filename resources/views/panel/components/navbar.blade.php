<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav mr-auto">
			@if (authMenu('panel.home'))
			<li class="nav-item"><a class="nav-link" href="/panel">Home</a></li>
			@endif
			@if (authMenu('panel.user'))
			<li class="nav-item"><a class="nav-link" href="/panel/user">Usuários</a></li>	
			@endif
			@if (authMenu('panel.userType'))	
			<li class="nav-item"><a class="nav-link" href="/panel/user_type">Tipos de Usuários</a></li>
			@endif
			@if (authMenu('panel.vendas'))	
			<li class="nav-item"><a class="nav-link" href="#">Vendas</a></li>
			@endif
			@if (authMenu('panel.relatorio'))	
			<li class="nav-item"><a class="nav-link" href="#">Relatório</a></li>
			@endif
			@if (authMenu('panel.clientes'))	
			<li class="nav-item"><a class="nav-link" href="#">Lista de Clientes</a></li>
			@endif
		</ul>
		<a class="nav-link " href="/panel/user/update/{{ Auth::user()->id}}" title="{{ Auth::user()->name}}">
			<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
				<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
			</svg>
			{{ Auth::user()->name}}
		</a>
		<a class="nav-link btn btn-danger" href="/panel/login/logout" title="Logout">
			<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
				<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
			</svg>
		</a>
  </div>
</nav>