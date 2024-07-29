<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index(){

        return view('dashboard.index')->with([
            'title' => 'About',
        ]);
    }

    public function update(Request $request){
        $validasi = $request->validate([
            'foto' => 'image|file|max:1024',
            'name' => 'required',
            'email' => 'required|email',
            'telpon' => 'required|numeric',
            'alamat' => 'required',
            'keahlian' => 'required',
            'words' => 'required',
        ],[
            'foto.image' => 'file yang anda upload bukan gambar',
            'foto.max' => 'maximal ukuran file 1mb',
            'name.required' => 'nama penulis harus ada',
            'email.required' => 'email penulis harus ada',
            'email.email' => 'masukkan email yang valid',
            'telpon.required' => 'nomor telpon harus ada',
            'telpon.numeric' => 'nomor telpon harus angka',
            'alamat.required' => 'alamat harus ada',
            'keahlian.required' => 'keahlian harus ada',
            'words.required' => 'words harus ada',
        ]);

        if ($request->file('foto')) {
            if ($request->fotoLama) {
                File::delete(public_path('images/'). $request->fotoLama);
            }
            $nama_foto = $request->file('foto')->hashName();
            $request->file('foto')->move(public_path('images', $nama_foto));
            $validasi['foto'] = $nama_foto;
        }

        User::where('id', auth()->user()->id)->update($validasi);
        
        return back()->with('info', 'Profile penulis telah diperbarui');
    }
}
