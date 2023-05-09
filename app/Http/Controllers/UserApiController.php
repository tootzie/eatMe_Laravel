<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserApiController extends Controller
{
    public function login(Request $request)
    {
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            $data['user'] = $user;
            $data['token'] = $token;
            return response()->json(['success' => true, 'data' => $data, 'pesan' => 'login berhasil'],200);
        } else {
            return response()->json(['success' => false, 'data' => '', 'pesan' => 'login gagal'],401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:100',
            'email'     => 'required|email',
            'password'  => 'required|min:6|max:25'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['success' => true, 'data' => $user, 'pesan' => 'user terdaftarkan'], 200);
    }

    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        //Cek apakah email sudah terdaftar di database
        $rules = array('email' => 'unique:users,email');
        $validator = Validator::make($credentials,$rules);

        if($validator -> fails()){
            Password::sendResetLink($credentials);
            return response()->json(["msg" => 'Link reset password sudah dikirimkan melalui email.'], 200);
        } else {
            return response()->json(["msg" => 'Email belum terdaftar.'], 401);
        }

        
    }

    public function reset(ResetPasswordRequest $request) {

        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return response()->json(["msg" => "Password has been successfully changed"]);
    }

    //Read
    public function index()
    {   
        $users = User::all();
        return response()->json(['message' => 'Data Read Successfully', 'data' => $users]);
    }

    //Read Detail
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['message' => 'Data Read Successfully', 'data' => $user]);
    }

    //Update
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user -> update($request->all());
        return response()->json(['message' => 'Data Updated Successfully', 'data' => $user]);
    }

}
