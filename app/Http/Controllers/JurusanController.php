<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $jurusan = Jurusan::
                    where('kode_jur', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('nama_jur', 'LIKE', '%'.$keyword.'%')->get();
        return view('jurusan.index', ['jurusans' => $jurusan]);
    }

    public function create()
    {
        return view('jurusan.jurusan-add');
    }

    public function store(Request $request)
    {
        // must assigment
        $jurusan = Jurusan::create($request->all());
        return redirect('/jurusan');
    }

    public function edit(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.jurusan-edit', ['jurusans' => $jurusan]);
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect('/jurusan');
    }

    public function delete($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.jurusan-delete', ['jurusan' => $jurusan]);
    }

    public function destroy($id)
    {
        $deletedJurusan = Jurusan::findOrFail($id);
        $deletedJurusan->delete();

        if($deletedJurusan) {
            Session::flash('status', 'succes');
            Session::flash('message', 'Jurusan deleted successfully!');
        }

        return redirect('/jurusan');
    }
}
