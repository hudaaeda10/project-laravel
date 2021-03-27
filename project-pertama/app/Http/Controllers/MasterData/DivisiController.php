<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Divisi::get();
        return view('masterdata/divisi', ['data' => $data]);
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
        Divisi::create($request->all());
        return redirect()->back()->with('message', 'Data Berhasil di input');
    }

    // function _validation
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|min:3|max:20',
            ],
            [
                'nama.required' => 'Field harus diisi',
                'nama.min' => 'Minimal diisi 3 digit',
                'nama.max' => 'Field diisi maksimal 20 digit',
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
        $this->_validation($request);
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
