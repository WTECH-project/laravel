<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;

class UserController extends Controller
{
    function show()
    {   
        //$userId = Auth::user();
        //$data = DB::table('users')->where('id', $userId)->get();
        //error_log($userId);
        //return view('settings.settings', ['userData'=>$userId]);
    }

    function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'surname' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'phone_number' => ['required', 'digits:10'],
            'country' => ['required'],
            'city' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'street' => ['required', 'max:255', 'regex:/^[A-Za-z0-9]*$/'],
            'postcode' => ['required', 'digits:5'],
        ]);

        $user = Auth::user();

        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->phone_number = $validatedData['phone_number'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->street = $validatedData['street'];
        $user->postcode = $validatedData['postcode'];

        $user->save();
        error_log($user);

        return redirect('settings');
    }

    function reset_password()
    {
        
    }
}
