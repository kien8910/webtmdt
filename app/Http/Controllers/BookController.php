<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //
    function laythongtintheloai(){
        //$the_loai_sach = DB::table("the_loai")->get();
        $the_loai_sach = Category::all();
        return view("qlsach.the_loai",compact("the_loai_sach"));
    }

    function laythongtinsach(){
        //$sach = DB::table("sach")->select("tieu_de","tac_gia")
        //->where("nha_xuat_ban","Văn Học")->get();
        $sach = Book::where("nha_xuat_ban","Văn Học")
                    ->where("gia_ban",">","50000")
                    ->where("gia_ban","<","90000")->get();
        return view("qlsach.thong_tin_sach",compact("sach"));
    }

    function nhapdulieu()
    {
        return view("qlsach.nhapdulieu");
    }

    function luudulieu(Request $request)
    {
        $id = $request->input("id");
        $ten_the_loai = $request->input("ten_the_loai");
        $data = ["id"=>$id,"ten_the_loai"=>$ten_the_loai];
        DB::table("the_loai")->insert($data);
        return "Thêm thành công";
    }

     function nhapdulieu2()
    {
        return view("qlsach.nhapdulieu2");
    }

    function luutheloai(Request $request)
    {
        $id = $request->input("id"); //["5","6"]
        $ten = $request->input("ten"); //["Viễn tưởng","Truyện ngắn"]

        $data = [];
        foreach($id as $key=>$value)
        {
            $data[] = ["id"=>$value,"ten_the_loai"=>$ten[$key]];
            
        }

      
        DB::table("the_loai")->insert($data);
        echo "Thêm thành công";

    }
}
