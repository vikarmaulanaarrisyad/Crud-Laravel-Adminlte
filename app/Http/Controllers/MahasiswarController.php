<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data mahasiswa
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa.index',compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                // Menampilkan form create
                return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
        ]);
        $array = $request->only([
            'nim', 'nama',
        ]);
        $mahasiswa = mahasiswa::create($array);
        return redirect()->route('mahasiswa.index')
            ->with('success_message', 'Berhasil menambah mahasiswa baru');

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
        //
         //
         $mahasiswa = mahasiswa::find($id);
         if (!$mahasiswa) return redirect()->route('mahasiswa.index')
             ->with('error_message', 'Mahasiswa dengan id'.$id.' tidak ditemukan');
         return view('mahasiswa.edit', [
             'mahasiswa' => $mahasiswa
         ]);
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
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
        ]);

        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')
            ->with('success_message', 'Berhasil mengubah mahasiswa');
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
        $mahasiswa = mahasiswa::find($id);
        if ($mahasiswa) $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
