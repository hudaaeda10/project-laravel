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

        $this->_validation($request);
        // menggunakan query builder
        DB::table('data_barang')->insert(
            [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang
            ]
        );
        Alert::success('Ditabahkan', 'Data berhasil ditambahkan');
        return redirect()->route('crud')->with('message', 'Data Berhasil diinput');
    }

    // edit data
    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id', $id)->first();
        return view('edit-data-crud', ['data_barang' => $data_barang]);
    }

    // update data barang
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        DB::table('data_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        Alert::success('Terupdate', 'Data Berhasil Terupdate');
        return redirect()->route('crud')->with('message', 'Data berhasil terupdate');
    }


    // hapus data
    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();
        Alert::success('Terhapus', 'Data Berhasil Dihapus');
        return redirect()->back()->with('message', 'Data Berhasil di hapus');
    }


    // function _validation
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'kode_barang' => 'required|min:3|max:10',
                'nama_barang' => 'required|min:3|max:100'
            ],
            [
                'kode_barang.required' => 'Field harus diisi',
                'kode_barang.min' => 'Minimal diisi 3 digit',
                'kode_barang.max' => 'Field diisi maksimal 10 digit',
                'nama_barang.required' => 'Field harus diisi',
                'nama_barang.min' => 'Minimal diisi 3 digit',
                'kode_barang.max' => 'Field diisi maksimal 10 digit'
            ]
        );
    }
}
