<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

class PertanyaanController extends Controller
{
    public function index() {
        $pertanyaan = PertanyaanModel::get_all();
        return view('pertanyaan', compact('pertanyaan'));
    }

    public function store(Request $request) {
        $data = $request->all();
        unset( $data["_token"]);
        // dd($data);
        PertanyaanModel::save($data);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan telah berhasil ditambahkan');
    }

    public function edit($id) {
        $pertanyaan = PertanyaanModel::find_by_id($id);
        return view('editpertanyaan', compact('pertanyaan'));
    }

    public function update(Request $request) {
        $data = $request->all();
        unset( $data["_token"]);
        unset( $data["_method"]);
            
        // dd($data);
        PertanyaanModel::update($data);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
    }

    public function delete($id) {
        PertanyaanModel::delete($id);
        return redirect('/pertanyaan')->with('success', 'Data berhasil dihapus');
    }
}