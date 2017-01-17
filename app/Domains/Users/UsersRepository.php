<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:01
 */

namespace App\Domains\Users;
use AppHelper;
use Illuminate\Support\Facades\Hash;

class UsersRepository implements UsersRepositoryInterface
{
        public function combo()
    {
        $colections = User::all();
        $data = array();
        $data[''] = 'Selecione';
        foreach ($colections as $colection):
            $data[$colection->id] = $colection->name;
        endforeach;
        return $data;
    }
    public function store($request){}
    public function update($request){}
    public function destroy($id){}

    public static function customer_user_store($request)
    {
        $array = new User([
            'name'      => $request->user_name,
            'email'     => $request->user_email,
            'password'  => Hash::make($request->user_password),
            'is_admin'  => 'NO',
            'status_id' => $request->status_id
        ]);
        $array->save();
        return $array->id;
    }
    public static function customer_user_update($request)
    {
        $user = User::findOrFail($request->user_id);
        $array = [
            'name'      => $request->user_name,
            'email'     => $request->user_email,
            'password'  => $request->user_password  ? Hash::make($request->user_password) : $user->password,
            'is_admin'  => $user->is_admin,
            'status_id' => $request->status_id
        ];
        $user->fill($array)->save();
    }
    public static function customer_user_destroy($id)
    {
        try{
            $user =  User::findOrFail($id);
            $user->delete();
            $msg = ['status'=>1, 'response'=>\Lang::get('messages.successdestroy')];
            return json_encode($msg);
        }catch(\Exception $e){
            $msg = ['status'=>2, 'response'=>\Lang::get('messages.relationshipdestroy')];
            return json_encode($msg);
        }
    }
}