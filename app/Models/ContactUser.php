<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactUser extends Model
{
    use HasFactory;

    protected $table = 'contact_user';


    public function create(Request $request) {
        $user = auth()->user();


        $inputs = $this->getInputs($request);
        $contacts = Contact::all()->toArray();
        $contactUserArr = $this->getContactUserByUserId($user->id);

        foreach ($inputs['inputs'] as $code => $value) {
            $contactId = $this->getIdByCode($contacts, $code);
            if(!isset($contactUserArr[$contactId])) {
                $contactUser = new ContactUser();
                $contactUser->user_id = $user->id;
            } else {
                $contactUser = $contactUserArr[$contactId];
            }

            $contactUser->contact_id = $contactId;
            $contactUser->contact_value = $value;
            $contactUser->is_private = isset($inputs['is_private'][$code]) ? 1 : 0;
            $contactUser->save();
        }

    }

    private function getInputs($request) {
        $inputs = $request->all();
        $inputsNew = [];

        foreach ($inputs as $code => $input) {
            if($code == '_token' or !$input) continue;

            if(strpos($code,'is_private_') !== false) {
                $inputsNew['is_private'][str_replace('is_private_','',$code)] = $input;
            } else {
                $inputsNew['inputs'][$code] = $input;
            }
        }

        return $inputsNew;
    }

    private function getContactUserByUserId($userId) {

        $contactUser = ContactUser::where('user_id', $userId)->get();
        $array = [];
        foreach ($contactUser as $item) {
            $array[$item->contact_id] = $item;
        }
        return $array;
    }

    private function getIdByCode($contacts, $code) {
        foreach ($contacts as $contact) {
            if($contact['code'] == $code) {
                return $contact['id'];
            }
        }
        // TODO: throw exception
        return '';
    }
}
