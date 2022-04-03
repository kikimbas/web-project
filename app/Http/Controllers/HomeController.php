<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contactsObj = new Contact;
        $contacts = $contactsObj->all();
        $filledContacts = $contactsObj->getFilledContacts($contacts);

        return view('welcome',
            compact('contacts','filledContacts')
        );
    }

}
