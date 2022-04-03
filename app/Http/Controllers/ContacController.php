<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactUser;
use App\Models\User;
use Illuminate\Http\Request;

class ContacController extends Controller
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

    public function update(Request $request)
    {

        $contact = new ContactUser();
        $contact->create($request);
        return redirect()->route('edit')->with('status', 'Контакт обновлен!');
    }

    public function add()
    {

        return view('add');
    }

    public function favorite()
    {

        $contactsObj = new Contact;
        $contacts = $contactsObj->all();
        $filledContacts = $contactsObj->getFilledContacts($contacts);

        return view('favorite',
            compact('contacts','filledContacts')
        );
    }

    public function addNew(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->code = $request->input('code');
        $contact->save();
        return redirect()->route('add')->with('status', 'Контакт добавлен!');
    }

    public function edit()
    {
        $contactsObj = new Contact;
        $contacts = $contactsObj->all();
        $filledContacts = $contactsObj->getFilledContacts($contacts);

        return view('edit',
            compact('contacts','filledContacts')
        );
    }

}
