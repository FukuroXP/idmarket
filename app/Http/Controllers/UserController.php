<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        $users =  DB::table('users')
            ->join('roles','roles.id','=','role_id')
            ->select('users.*','roles.title AS role_name')
            ->whereIn('roles.id',[1,2])
            ->get();

        return view('user_show', compact('users'));
    }

    public function showUser()
    {
        $users =  DB::table('users')
            ->join('roles','roles.id','=','role_id')
            ->select('users.*','roles.title AS role_name')
            ->where('roles.id','3')
            ->get();

        return view('user_show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')
            ->join('roles','roles.id','=','role_id')
            ->select('users.*','roles.title as rolename')
            ->where('users.id',$id)
            ->get();
        $roles = Role::all();

        return view('user_update',['users' => $users, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required'
        ]);

        $users = User::where('id', $id)->first();
        $users->name =  $request->name;
        $users->role_id = $request->role_id;

        $users->save();
//        dd($users);
        if ($users->role_id == 3){
            return redirect('/user_show');
        }
        else{
            return redirect('/admin_show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
