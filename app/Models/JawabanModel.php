<?php 

namespace App\Models;
use Illuminate\Support\Facades\DB;

class JawabanModel {
  public static function get_all() {
    $items = DB::table('jawaban')->get();
    return $items;
  }

  public static function save($data) {
    $new_item = DB::table('jawaban')->insert($data);
    return $new_item;
  }

  public static function find_by_pertanyaan_id($id_pertanyaan) {
    $items = DB::table('jawaban')->where('pertanyaan_id', $id_pertanyaan)->first();
    return $items;
  }
}

?>