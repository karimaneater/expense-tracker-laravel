<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {

        return view('users.create', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {

        $user->create($request->validated());

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function profile()
    {
        $userId = auth()->user()->id;

        return view('users.profile', compact('userId'));
        // , [
        //     'user' => $user,
        //     'userRole' => $user->roles->pluck('name')->toArray(),
        //     'roles' => Role::latest()->get()
        // ]
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if ($request->validated()){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,

            ]);

            $user->syncRoles($request->get('role'));

            return redirect()->route('users.index')
                ->withSuccess(__('User updated successfully.'));
        }else{
            $request->validated();
        }



    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function password(Request $request){

        $user = User::find($request->id);


        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                    'status'  => 404,
                    'message' => $validator->errors()->first().'!',
            ]);
        }else{
            if (Hash::check($request->old_password, $user->password)){
                User::find($request->id)->update([
                    'password' => $request->new_password,
                ]);
                return response()->json([
                    'status'  => 200,
                    'message' => 'Password changed successfully!',
                ]);
            }
            else{
                return response()->json([
                    'status'  => 404,
                    'message' => 'Old password is incorrect!',
                ]);
            }
        }

    }
}
