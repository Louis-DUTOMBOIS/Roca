<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function filtered(Request $request) {
        $userName = $request->input('name');

        $user = User::where('name', $userName)->first();

        if (!$user) {
            return redirect()->route('index')
            ->with('type', 'warning')
                ->with('msg', 'Aucun utilisateur trouvé avec le nom : ' . $userName);
        }

        $stories = Histoire::where('user_id', $user->id)->get();

        return view('welcome', ['user' => $user,'stories' => $stories]);


    }
}
