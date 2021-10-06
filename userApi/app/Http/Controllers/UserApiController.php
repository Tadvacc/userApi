<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return response()->jason($task);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'handset' => 'required',
        ]);

        return User::create([
            'name' => request('name'),
            'handset' => request('handset'),
        ]);
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'handset' => 'required',
        ]);

        $success = $user->update([
            'name' => request('name'),
            'handset' => request('handset'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(User $user)
    {
        $success = $user->delete();

        return [
            'success' => $success
        ];
    }
}
