<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.nama_role')
            ->get();

        $roles = DB::table('roles')->select('id', 'name')->get();
        return view('admin.user', compact('users', 'roles'));
    }

    public function destroy($id)
    {
        $user = DB::delete('delete users, model_has_roles, reports from users inner join model_has_roles on users.id = model_has_roles.model_id inner join reports on users.id = reports.user_id where users.id = ' . $id);
        return back();
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('model_has_roles')
            ->where('model_id', $id)
            ->update(['role_id' => $request->role]);
        return back();
    }
}
