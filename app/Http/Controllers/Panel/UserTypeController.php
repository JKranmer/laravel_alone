<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\UserTypeModel;
use Illuminate\Support\Facades\Request;

class UserTypeController extends Controller{
	
	// Método Listar
	function list() {
		$userType = UserTypeModel::withTrashed()->get();
		// return $userType;
		$this->authorize('list-userType');
		return view('panel.userType.list', ['userType'=>$userType]);
	}

	// Método Inserir / Update
	function insert(Request $request, $id = null) {
		$userType = null;
		if (isset($id)) {
			$userType = UserTypeModel::find($id);
		}
		$this->authorize('form-userType');
		return view('panel.userType.form', ['userType'=>$userType]);

	}

	function delete($id){
		$this->authorize('delete-user');
		$userType = UserTypeModel::find($id);
		$userType->delete();
		// $request::get('id')->where->('id', )delete('id');
		return redirect('/panel/user_type');
	}

	function enable($id){
		$this->authorize('enable-user');
		UserTypeModel::withTrashed()
		->where('id', $id)
		->restore();
		// $request::get('id')->where->('id', )delete('id');
		return redirect('/panel/user_type');
	}

	// Método Save
	function save(Request $request) {
		$this->authorize('save-user');
		$userType = $request::get('id') ? UserTypeModel::find($request::get('id')) : new UserTypeModel ;
		$userType->fill($request::all())->save();
		return redirect('/panel/user_type');
	}
}