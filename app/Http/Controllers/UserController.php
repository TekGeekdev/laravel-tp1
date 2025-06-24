<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string||min:2|max:255',
            'email' => 'required|email|exists:students,email|unique:users,email',
            'password' => 'required|min:2|max:20|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'confirm_password' =>  'required|min:2|max:20|string|same:password'
            ],[], [
            'name' => trans('lang.name'),
            'email' => trans('lang.email'),
            'password' => trans('lang.password'),
            'confirm_password' => trans('lang.confirm_password')
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $student = Student::where('email', $request->email)->first();

        if ($student) {
            $student->user_id = $user->id;
            $student->save();
        }

        return redirect()->route('student.index')->with('success', trans('lang.message_success_create_user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
