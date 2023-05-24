<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules( Request $request )
    {
        $contact = Contact::findOrFail( $request->segment( 2 ) );
        return [
            'name' => 'required|string|min:5',
            'contact' => 'required|digits:9|unique:contacts,id,'. $contact->id,
            'email' => 'required|email|unique:contacts,id,'. $contact->id
        ];
    }
}
