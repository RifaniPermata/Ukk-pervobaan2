<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;


class SocialController extends Controller
{

        public function redirectToProvider($provider){
            // return Socialite::driver('google')->redirect();
            // return redirect()->route('view.index')->with(['berhasil' => 'Data sudah berhasil,Silahkan Login dengan akun yang telah didaftarkan!!']);   
            return Socialite::driver($provider)->redirect();
                     


        }

        public function handleProviderCallback($provider){
            $user = Socialite::driver($provider)->user();

            $authUser = $this->findOrCreateUser($user, $provider);

            Auth::guard('masyarakat')->login($authUser, true);
            // if(Auth::guard('masyarakat')->login($authUser, true)){
                return redirect()->route('view.index');

            // }else{
            // return redirect()->route('view.index')->with(['berhasil' => 'Data sudah berhasil,Silahkan Login dengan akun yang telah didaftarkan!!']);            
                
            // }
            // return redirect()->route('view.index');
            
            // // Auth::guard('masyarakat')->login($authUser, true);
            // try{
            //  $user = Socialite::driver($provider)->user();

            //  // dd($user);

            //  $findUser = Masyarakat::where('provider_id', $user->getId())->first();
            //  if($findUser){
            //     Auth::login($findUser);
            //      return redirect()->back();
            //  }else{
            //     $newUser = Masyarakat::create([
            //         'nik'=>$user->id,
            //         'nama'=>$user->name,
            //         'email'=>$user->email,
            //         'username'=>$user->email,
            //         'password'=>bcrypt('12345'),
            //         // 'telp',
            //         'provider_id'=>$user->id,
            //         // 'provider'=>$user->getName(),
            //     ]);
            //     Auth::login($newUser);
            //      return redirect('/');

            //  }
            // }catch(\Throwable $th){

            // }

            // dd(1);
        }
        public function findOrCreateUser($user, $provider)
        {
            $authUser = Masyarakat::where('provider_id', $user->getId())->first();

            if ($authUser) {
                return $authUser;
            } else {

                $mockNIK = mt_rand(1000000000000, 9999999999999);

                $index = strpos($user->getEmail(), '@');
                $username = substr($user->getEmail(), 0, $index);

                date_default_timezone_set('Asia/Bangkok');

                $dataUser = Masyarakat::create([
                    'nik' => $mockNIK,
                    'nama' => $user->getName(),
                    'email' => $user->getEmail(),
                    'email_verified_at' => date('Y-m-d h:i:s'),
                    'username' => $username,
                    // 'username' => $user->getNickname(),
                    'password' => '',
                    'telp' => '',
                    // 'jenis_kelamin' => $user->getAvatar(),
                    'provider_id' => $user->getId(),
                    'provider' => $provider,
                ]);

                return $dataUser;
            }
        }
}
