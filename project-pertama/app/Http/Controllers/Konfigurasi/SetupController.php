<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup = Setup::get();
        return view('konfigurasi/setup', ['setup' => $setup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        Setup::create($request->all());
        return redirect()->back()->with('message', 'Data Berhasil di input');
    }

    // function _validation
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|min:3|max:10',
                'jumlah_hari_kerja' => 'required|min:2|max:100'
            ],
            [
                'nama_aplikasi.required' => 'Field harus diisi',
                'nama_aplikasi.min' => 'Minimal diisi 3 digit',
                'nama_aplikasi.max' => 'Field diisi maksimal 100 digit',
                'jumlah_hari_kerja.required' => 'Field harus diisi',
                'jumlah_hari_kerja.min' => 'Minimal diisi 2 digit',
                'jumlah_hari_kerja.max' => 'Field diisi maksimal 3 digit'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        // $setup = Setup::find($id);
        return view('konfigurasi.setup-edit', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Setup::where('id', $id)->update(['nama_aplikasi' => $request->nama_aplikasi, 'jumlah_hari_kerja' => $request->jumlah_hari_kerja]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUbah()
    {
    }
}
