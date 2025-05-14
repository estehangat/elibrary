<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kbm\Semester;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function register(Request $request){
        // Validasi inputan dulu (optional, tapi penting)
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
        ]);

        // Simpan user baru ke database
        $user = User::create([
            'username' => $request->username,
            'user_id' => 1,
            'password' => Hash::make($request->password),
            'status' => "aktif",
            "role_id" => 36
        ]);

        if (Auth::login($user)) {
            // if($request->user()->pegawai && $request->user()->pegawai->remainingPeriod == 'Habis'){
            //     Session::flash('danger', 'Sisa masa kerja Anda sudah habis. Mohon hubungi Administrator.');
            //     Auth::logout();
            //     return redirect()->route('login');
            // }

            $role = Auth::user()->role->name;
            if($role == 'keulsi') return redirect()->route('keuangan.index');
            elseif($role == 'ortu') return redirect()->route('psb.index');

            $semester = Semester::where('is_active', 1)->first();
            Session::put('semester_aktif', $semester->id);

            // return view('login.sso');
        } else {
            Session::flash('danger', 'Terjadi kesalahan saat login.');
            return redirect()->route('login');
        }
    }
}