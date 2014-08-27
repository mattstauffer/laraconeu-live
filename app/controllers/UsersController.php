<?php

class UsersController extends BaseController
{
    public function index()
    {
        $users = User::all();

        return View::make('admin.users.index', compact('users'));
    }

    public function create()
    {
        return View::make('admin.users.create');
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'username'   => 'required|unique:users',
            'password'   => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
        }

        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->username = Input::get('username');
        $user->password = Input::get('password');
        $user->save();

        return Redirect::route('users');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return View::make('admin.users.edit', compact('user'));
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email,'.$id,
            'username'   => 'required|unique:users,username,'.$id,
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
        }

        $user = User::find($id);
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->username = Input::get('username');

        if (Input::has('password')) {
            $user->password = Input::get('password');
        }

        $user->save();

        return Redirect::route('users');
    }

    public function delete($id)
    {
        $user = User::find($id);

        return View::make('admin.users.delete', compact('user'));
    }

    public function destroy($id)
    {
        // Never remove the primary user
        if ($id !== 1) {
            $user = User::find($id);

            // Remove user from messages
            $user->messages()->detach($id);

            $user->delete();
        }

        return Redirect::route('users');
    }
}
