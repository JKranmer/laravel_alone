<?php

namespace App\Http\Controllers;

use App\Models\UserTypeModel;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // LIST
    public function index()
    {
				$userType = UserTypeModel::get();
				// $this->authorize('list-userType');
        return $userType;
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
        $userType = new UserTypeModel();
		$userType->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$userType = UserTypeModel::withTrashed()->where('id', $id)->get();
			// $this->authorize('list-userType');
			return $userType;
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
        UserTypeModel::find($id)->fill($request->all())->save();
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
        UserTypeModel::find($id)->delete();
        return ("Deletado");
    }

    // public function enable($id){
	// 	UserTypeModel::withTrashed()
	// 	->where('id', $id)
	// 	->restore();
	// }
}
