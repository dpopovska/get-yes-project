<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $mainmenu = 'users';
    
    private $submenu  = 'list-users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of table: Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::AllOrderBy('created_at', 'desc');

        return view('users.list')->with(array('users' => $users, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::allRolesWitnIdNaziv();

        return view('users.create')->with(array('roles' => $roles, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $users)
    {
        $this->validate($request, User::$userRules);

        $request->merge(array_map("trim", array_map("strip_tags", $request->except('_token'))));

        $users->create($request->only('name', 'password', 'email', 'roles_id'));
        
        return redirect()->route('users.index')->with('success', 'You have successfully created new user entry.');
    }

    /**
     * Get the (INNER) view for users change password functionality
     *
     * @param  \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function changeUserPassword(User $users)
    {
        return view('users.change-password')->with(array('id' => $users->id, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
   public function edit(User $korisnici)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\User $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(User $korisnici, Request $request)
    {

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

    /**
     * Post the (INNER) form for changing user's password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function postChangedUserPassword(Request $request, User $users)
    {
        $this->validate($request, $users->getResetValidationRules());

        $users->update($request->only('password'));
        
        return redirect()->route('users.index')->with('success', 'User\'s password has been successfully changed.');
    }
   
}
