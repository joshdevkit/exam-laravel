<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teacher\StoreTeacherRequest;
use App\Http\Requests\Admin\Teacher\UpdateTeacherRequest;
use App\Mail\TeacherCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::role('teacher')->get();
        // dd($teachers);
        return view('admin.users.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $password = $request->input('password');

        $teacher = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('teachers/avatar', 'public');
            $teacher->avatar = $avatarPath;
            $teacher->save();
        }

        $teacher->assignRole('teacher');

        if ($request->has('notify_email')) {
            Mail::to($teacher->email)->send(new TeacherCreated($teacher, $password));
        }
        return redirect()->route('users.index')->with('success', 'Teacher created successfully.');
    }


    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('teachers/avatar', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Teacher updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Teacher deleted successfully.');
    }
}
