<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanModel;
use App\Models\PertanyaanModel;

class JawabanController extends Controller
{
    public function store($pertanyaan_id, Request $request) {
        $data = $request->all();
        // dd($data);
        unset($data["_token"]);
        JawabanModel::save($data);
        return redirect()->route('jawaban.index', $pertanyaan_id)->with('success', 'Jawaban berhasil diposting');
    }

    public function index($pertanyaan_id) {
        $pertanyaan = PertanyaanModel::find_by_pertanyaan_id($pertanyaan_id);
        $datapertanyaan = $pertanyaan[0];
        // dd($datapertanyaan);
        $jawaban = JawabanModel::find_by_pertanyaan_id($pertanyaan_id);
        return view('detail', compact('jawaban', 'datapertanyaan'));
    }
}