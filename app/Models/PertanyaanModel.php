<?php 

namespace App\Models;
use Illuminate\Support\Facades\DB;

class PertanyaanModel {
  public static function get_all() {
    $items = DB::table('pertanyaan')->get();
    return $items;
  }

  public static function save($data) {
    $new_items = DB::table('pertanyaan')->insert($data);
    return $new_items;
  }

  public static function find_by_id($id) {
    $items = DB::table('pertanyaan')->where('id', $id)->first();
    return $items;
  }

  public static function update($data) {
    $update_item = DB::table('pertanyaan')->where('id', $data['id'])->update($data);
    return $update_item;
  }

  public static function delete($id) {
    $item = DB::table('pertanyaan')->where('id', $id)->delete();
  }

  public static function find_by_pertanyaan_id($id_pertanyaan) {
    $items = DB::table('pertanyaan')->where('id', $id_pertanyaan)->get();
    return $items;
  }
}

?>