<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
	public function index()
    {
        return view('index');
    }
    public function login(Request $request)
    {
    	 $validated = $request->validate([
	        'username' => 'required',
            'password' => 'required',

	    ]);
          // $username = Masyarakat::where('username', $request->username)->first();
        // $username = [
        //     Masyarakat::where('username', $request->username)->first(),
        //     Petugas::where('username', $request->username)->first(),
        // ];

        // if (!$username) {
        //     return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        // }

        // $password = Hash::check($request->password, $username->password);

        // if (!$password) {
        //     return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        // }
            // dd($request->all());
        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        } 
        // dd(Auth::guard('admin'));

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dasboard.index');
        }else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }
        public function logout()
    {
        if(Auth::guard('masyarakat')->check()){
            Auth::guard('masyarakat')->logout();        

        }elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
            return redirect()->route('view.index');


     }
    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nik' => ['required'],
            'nama' => ['required'],
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Masyarakat::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

       return redirect()->back()->with(['berhasil' => 'Data sudah berhasil,Silahkan Login!!']);
    }
    



}
