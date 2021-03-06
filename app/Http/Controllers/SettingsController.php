<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.settings');
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
    function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'regex:/^[A-Z][a-z]*$/'],
            'surname' => ['required', 'max:255', 'regex:/^[A-Z][a-z]*$/'],
            'phone_number' => ['required', 'digits:10'],
            'country' => ['required', 'in:CZ,SK'],
            'city' => ['required', 'max:255', 'regex:/^[A-Z][a-z]+$/'],
            'street' => ['required', 'max:255', 'regex:/^[A-Z][a-z]* [A-Za-z0-9]+$/'],
            'postcode' => ['required', 'digits:5'],
        ]);

        $user = Auth::user();
        $oldUser = $user->replicate();

        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->phone_number = $validatedData['phone_number'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->street = $validatedData['street'];
        $user->postcode = $validatedData['postcode'];

        if ($user->save()) {
            Log::info('Pouzivatel si zmenil osobne udaje', ['old' => $oldUser, 'new' => $user]);
        } else {
            Log::error('Pouzivatelovi sa nepodarilo zmenit osobne udaje', ['old' => $oldUser, 'new' => $user]);
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
        }

        return redirect('account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
