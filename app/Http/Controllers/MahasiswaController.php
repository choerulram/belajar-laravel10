<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $mahasiswa = Mahasiswa::with('jurusan')
                        ->where('nama', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('nim', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('alamat', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('jurusan', function($query) use($keyword) {
                            $query->where('nama_jur', 'LIKE', '%'.$keyword.'%');
                        })->get();
        // $mahasiswa = Mahasiswa::with('jurusan')->get();
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswa]);
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.mahasiswa-add', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required|max:255',
            'id_jurusan' => 'required|exists:jurusans,id',
            'alamat' => 'required|max:255',
        ]);

        // buat mahasiswa new
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::with('jurusan')->findOrFail($id);
        $jurusan = Jurusan::where('id', '!=', $mahasiswa->id_jurusan)->get(['id', 'nama_jur']);
        return view('mahasiswa.mahasiswa-edit', ['mahasiswas' => $mahasiswa, 'jurusan' => $jurusan]);
    }

    public function update(Request $request, $id)
    {
        // validasi
        $request->validate([
            'nim' => 'required|max:10|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|max:255',
            'id_jurusan' => 'required|exists:jurusans,id',
            'alamat' => 'required|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Mahasiswa deleted successfully!');

        return redirect('/mahasiswa');
    }
}
