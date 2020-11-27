<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\UserTypeModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends Controller{
	
	// Método Listar
	function list() {
		$user = UserModel::withTrashed()->with(['userType'])->get();
		// return $user;

		$this->authorize('list-user');

		return view('panel.user.list', ['user'=>$user]);
	}

	// Método Inserir / Update
	function insert(Request $request, $id = null) {
		$user = null;
		$userType = UserTypeModel::orderBy('desc')->get();
		$higher = UserModel::whereHas('userType', function($query){
			$query->where('level', 2);
		})->orderBy('name')->get();

		if (isset($id)) {
			$user = UserModel::find($id);
		}

		$this->authorize('form-user', $user);

		return view('panel.user.form', ['user'=>$user, 'userType' => $userType, 'higher' => $higher]);

	}

	function delete($id){
		$user = UserModel::find($id);
		$this->authorize('delete-user');
		$user->delete();
		// $request::get('id')->where->('id', )delete('id');
		return redirect('/panel/user');
	}

	function enable($id){
		$this->authorize('enable-user');
		UserModel::withTrashed()
		->where('id', $id)
		->restore();
		// $request::get('id')->where->('id', )delete('id');
		return redirect('/panel/user');
	}

	// Método Save
	function save(Request $request) {
		$this->authorize('save-user');
		$user = $request::get('id') ? UserModel::find($request::get('id')) : new UserModel ;
		$input = $request::all();

		if(!(isset($input['password']) && $input['password'] && isset($input['passwordConf']) && $input['password'] == $input['passwordConf'])){
			unset($input['password']);
		} else{
			$input['password'] =  Hash::make($input['password']);
		}

		// return $input;


		$user->fill($input)->save();
		return redirect('/panel/user');
	}
}