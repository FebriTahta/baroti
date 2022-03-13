<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactCont extends Controller
{
    public function contact()
    {
        $contact = Contact::first();
        return view('fe.contact',compact('contact'));
    }

    public function be_contact()
    {
        $contact = Contact::first();
        return view('be.contact',compact('contact'));
    }

    public function be_contact_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'map'       => 'required',
            'telp'   => 'required',
            'alamat'   => 'required',
            'email'   => 'required',
            'haribuka'   => 'required',
            'jambuka'   => 'required',
            'jamtutup'   => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            $data   = Contact::updateOrCreate(
                [
                    'id' => 1
                ],
                [
                    'map'      => $request->map,
                    'alamat' => $request->alamat,
                    'telp'      => $request->telp,
                    'email'      => $request->email,
                    'haribuka'      => $request->haribuka,
                    'jambuka'      => $request->jambuka,
                    'jamtutup'      => $request->jamtutup,
                    
                ]
            );
        
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Contact has been Added'
                ]
            );
        }
    }
}
