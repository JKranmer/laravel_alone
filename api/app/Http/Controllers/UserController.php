<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // LIST
    public function index()
    {
		$user = UserModel::get();
		// $this->authorize('list-userType');
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// $this->authorize('save-user');
        $user = new UserModel();
        $input = $request->all();
        $input['password'] =  Hash::make($input['password']);
		$user->fill($input)->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$user = UserModel::withTrashed()->where('id', $id)->get();
			// $this->authorize('list-userType');
			return $user;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 
    public function update(Request $request, $id)
    {
        $user = UserModel::find($request->get('id'));
        $input = $request->all();

		if(!(isset($input['password']) && $input['password'] && isset($input['passwordConf']) && $input['password'] == $input['passwordConf'])){
            unset($input['password']);
            return 1;
		} else{
            $input['password'] =  Hash::make($input['password']);
		}

        
        
		$user::fill($input)->save();
		return $input;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // DELET
    public function destroy($id)
    {
        UserModel::find($id)->delete();
        return ("Deletado");
    }

    // public function enable($id){
	// 	UserModel::withTrashed()
	// 	->where('id', $id)
	// 	->restore();
	// }
}
