<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\UserModel;

date_default_timezone_set("Asia/Makassar");

class AuthController extends Controller
{
    public function auth_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik'      => 'required|numeric',
            'password' => 'required|string',
        ]);

        $user = UserModel::join('tb_level', 'tb_employee.level_id', '=', 'tb_level.id')
        ->where('tb_employee.nik', $request->nik)
        ->select('tb_employee.*', 'tb_level.level_name')
        ->first();

        if ($user && $user->password === md5($request->password))
        {
            Auth::login($user);

            $token = Str::random(60);

            UserModel::where('nik', $request->nik)->update([
                'remember_token' => $token
            ]);

            Session::put([
                'nik'            => $user->nik,
                'full_name'      => $user->full_name,
                'level_id'       => $user->level_id,
                'level_name'     => $user->level_name,
                'remember_token' => $token,
                'is_logged_in'   => true
            ]);

            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'NIK atau password salah!']);
    }


    public function logout()
    {
        Auth::logout();

        Session::flush();

        return redirect()->route('login');
    }
}
