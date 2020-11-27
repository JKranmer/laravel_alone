<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

class HomeController extends Controller{
	
	// Método Listar
	function list() {
		return view('panel.home.view');
	}
}