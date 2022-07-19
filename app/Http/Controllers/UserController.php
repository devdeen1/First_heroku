<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
  
    public function index()
    {
    $users = user::all();
        return view ('users.index')->with('users', $users);
    }

  
    public function create()
    {
        return view ('users.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        user::create($input);
        return redirect('user')->with('flash_message', 'User Added!');  
    }

   
    public function show($id)
    {
        $users = user::find($id);
        return view('users.show')->with('user', $users);
    }

    public function edit($id)
    {
        $users = user::find($id);
        return view('users.edit', compact('users'));
    }
  
    public function update(Request $request, $id)
    {
        $users = user::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('user')->with('flash_message', 'user Updated!');  
    }
  
    public function destroy($id)
    {
        $delete = user::find($id);
        $delete->delete();
        return redirect('user')->with('flash_message', 'User deleted!');  
    }
}
