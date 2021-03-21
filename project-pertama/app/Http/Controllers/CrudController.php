<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class CrudController extends Controller
{
    // halaman utama crud
    public function index()
    {
        $data_barang = DB::table('data_barang')->paginate(10);
        return view('crud', ['data_barang' => $data_barang]);
    }

    // halaman tambah data
    public function tambah()
    {
        return view('tambah-data-crud');
    }

    // simpan data
    public function simpan(Request $request)
    {
        //menggunakan cara builder
        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);          

        // menggunakan query builder
        DB::table('data_barang')->insert(
            [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang
            ]
        );
        return redirect()->route('crud');
    }

    // edit data

    // hapus data
    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();
        Alert::success('Terhapus', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
