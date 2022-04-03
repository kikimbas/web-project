<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getFilledContacts($contactsAll) {
        $contactsArr = [];
        $contactsFilled = User::find(auth()->user()->id)->Contacts;

        foreach ($contactsAll as $contact) {
            $contactsArr[$contact->id] = $contact;
            $contactsArr[$contact->id]->value = '';
            $contactsArr[$contact->id]->is_private = '';
        }

        foreach ($contactsFilled as $contact) {
            $originalVal = $contact->getOriginal();
            $contactsArr[$contact->id]->value = $originalVal['pivot_contact_value'];
            $contactsArr[$contact->id]->is_private = $originalVal['pivot_is_private'];
//            dd($contactsArr[$contact->id]);
        }


        return $contactsArr;
    }
}
