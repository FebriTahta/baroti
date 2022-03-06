<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserCont extends Controller
{
    public function be_user_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'pass'        => 'required',
            'email'       => 'nullable|email',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'message'  => 'Response Gagal',
                'errors' => $validator->messages(),
            ]);

        }else {
            
            $data   = User::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name'      => $request->name,
                    'pass'      => $request->pass,
                    'role'      => 'admin',
                    'password'  => Hash::make($request->pass),
                    'email'     => $request->email,
                ]
            );
        }

        return response()->json(
            [
              'status'  => 200,
              'message' => 'User has been Updated'
            ]
        );
    }
}
