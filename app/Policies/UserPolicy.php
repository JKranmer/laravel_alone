<?php

namespace App\Policies;

use App\Models\UserModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    // 1 - Diretor tem acesso TOTAL
    // 2 - Gerente pode EDITAR ELE e SEU VENDEDOR
    // 3 - Vendedor só pode editar ELE MESMO
    // Nomenclatura de superior user_id

    public function list(UserModel $user){
        return in_array($user->userType->level, [99, 1, 2]);
    }
    
    public function form(UserModel $user, UserModel $data = null){
        return (in_array($user->userType->level, [99, 1]) ? true : (is_null($data) ? false : ($user->id == $data->user_id ? true : $user->id == $data->id)));
    }

    public function save(UserModel $user, UserModel $data = null){
        return (in_array($user->userType->level, [99, 1]) ? true : (is_null($data) ? false : ($user->id == $data->user_id ? true : $user->id == $data->id)));
    }

    public function delete(UserModel $user, UserModel $data = null){
        return (in_array($user->userType->level, [99, 1]) ? true : (is_null($data) ? false : $user->id == $data->user_id));
    }

    public function enable(UserModel $user, UserModel $data = null){
        return (in_array($user->userType->level, [99, 1]) ? true : (is_null($data) ? false : $user->id == $data->user_id));
    }
    

}
