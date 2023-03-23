<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtSiswa = Siswa::latest()->paginate(2);
        return view('Siswa.datasiswa', compact('dtSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Siswa.createsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Siswa::create([
            'nama' => $request->nama,
            'tgllhr' => $request->tgllhr,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
    
        return redirect('datasiswa')->with('toast_success', 'Data Berhasil tersimpan');;
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
    public function edit($id)
    {   
        $sis = Siswa::findorfail($id);
        return view('Siswa.editsiswa', compact('sis'));
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
        $sis = Siswa::findorfail($id);
        $sis->update($request->all());
        return redirect('datasiswa')->with('toast_success', 'Data Berhasil Update');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sis = Siswa::find($id);
        $sis->delete();
        return redirect('datasiswa')->with('info', 'Data Berhasil Dihapus');;

    }
}
