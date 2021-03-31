<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Mail\VerifikasiEmailUntukRegistrasiPengaduanMasyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;


class LoginController extends Controller
{
	public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('dasboard.index');
        }
        $pengaduanAll =Pengaduan::all()->count();

        return view('index',['pengaduanAll'=>$pengaduanAll]);
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
        // $petugas =Petugas::all();

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        } 
        // dd(Auth::guard('admin'));

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dasboard.index');
        }else {
            return redirect()->back()->with(['pesan' => 'Username atau Password Salah!']);
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
        $validated = $request->validate([
            // 'nik' => ['required','size:16', 'integer'],
            'nik' => ['required','size:16'],
            'nama' => ['required'],            
            'email' => ['required'],
            'username_register' => ['required'],
            'register_password' => ['required','confirmed'],
            'telp' => ['required'],

        ]);
        // dd(1);
        // $validate = Validator::make($data, [
        //     'nik' => ['required'],
        //     'nama' => ['required'],
        //     'email' => ['required'],
        //     'username' => ['required'],
        //     'password' => ['required'],
        //     'telp' => ['required'],
        //     // 'jenis_kelamin' => ['required'],

        // ]);

        // if ($validate->fails()) {
        //     return redirect()->back()->with(['pesan' => $validate->errors()]);
        // }
        // dd((int)'123adsa');
        $username = Masyarakat::where('username', $request->username_register)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username_register'],
            'password' => Hash::make($data['register_password']),
            'telp' => $data['telp'],
            // 'jenis_kelamin' => $data['jenis_kelamin'],
            
        ]);
        // Kirim link verifikasi email
        $link = URL::temporarySignedRoute('pekat.verify', now()->addMinutes(30), ['nik' => $data['nik']]);
        Mail::to($data['email'])->send(new VerifikasiEmailUntukRegistrasiPengaduanMasyarakat($data['nama'], $link));

        // return redirect()->view()
       // return redirect()->back();

       return redirect()->back()->with(['berhasil' => 'Data sudah berhasil,Silahkan Login dengan akun yang telah didaftarkan!!']);
    }
    
    //     public function sendVerification()
    // {
    //     $nik = Auth::guard('masyarakat')->user()->nik;
    //     $email = Auth::guard('masyarakat')->user()->email;
    //     $nama = Auth::guard('masyarakat')->user()->nama;
    //     $link = URL::temporarySignedRoute('verify', now()->addMinutes(30), ['nik' => $nik]);
    //     Mail::to($email)->send(new VerifikasiEmailUntukRegistrasiPengaduanMasyarakat($nama, $link));

    //     return redirect()->back();
    // }

    // public function verify($nik, Request $request)
    // {
    //     $masyarakat = Masyarakat::where('nik', $nik)->first();

    //     if ($masyarakat->email_verified_at == null) {
    //         if ($request->hasValidSignature()) {

    //             date_default_timezone_set('Asia/Bangkok');

    //             $masyarakat->update(['email_verified_at' => date('Y-m-d h:i:s')]);

    //             return view('masyarakat.success');
    //         } else {
    //             return view('masyarakat.failed');
    //         }
    //     } else {
    //         return view('masyarakat.failed');
    //     }
    // }


}
