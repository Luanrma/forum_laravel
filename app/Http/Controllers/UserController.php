<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
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
        $request->except(['_token']);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('index.topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function showRegister()
    {
        return view('login.user-register');
    }

    public function showLogin()
    {
        return view('login.user-login');
    }

    public function login(Request $request)
    {
        $credentials = Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
            ]);

        if($credentials) {
            return redirect()->route('index.topics');
        } else {
            return redirect()->back()->withErrors(['Os dados informados não conferem!']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('showLogin.user');
    }

    public function showTopics() 
    {
        $id =  Auth::user()->id;
 
        $user = User::where('id', $id)->first();
        $topics = $user->topics()->get();
                
        return view('user ',[
            'topics' => $topics
        ]);
    }
}
