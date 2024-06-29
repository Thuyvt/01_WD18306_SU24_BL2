<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    // Lấy danh sách sản phẩm
    public function list() {
        // echo 'Danh sách sản phẩm';
        // $listsp = DB::table('sanpham')->get();
        $listsp = DB::table('sanpham')
        ->join('danhmuc', 'sanpham.iddm', '=', 'danhmuc.id')
        ->select('sanpham.*', 'danhmuc.id as id_danhmuc', 'danhmuc.name as name_danhmuc')->get();
        // dd($sql);
        // $listsp = $sql->get();
        // echo '<pre>';
        // print_r($listsp);
        // Top 3 sản phẩm được xem nhiều nhất
        $top3 = DB::table('sanpham')->select('id', 'name', 'price')
        ->orderBy('luotxem', 'DESC')->limit(3)->get();

        return view('list', compact('listsp', 'top3'));
    }

    // Lấy chi tiết sản phẩm
    public function detail($idsp) {
        echo 'Chi tiết sản phẩm' . $idsp;
        // Lấy thông tin chi tiết trong DB bằng ID
        $detail = DB::table('sanpham')->where('id', '=', $idsp)->first();
        if (!$detail) {
            echo 'Không tìm thấy bản ghi';
        } else {
            return view('sanpham.detail', compact('detail'));
        }
    }

    // phương thức xóa
    public function delete($id) {
        $sql = DB::table('sanpham')->where('id', '=', $id)->delete();
        // Xóa xong quay lại trang list
        return redirect()->route('san-pham.list');
    }

}
