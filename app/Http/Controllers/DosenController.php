<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Dosen $dosens)
    {
        $dosens = Dosen::get();
        return view('dosen/index', ['dosens' => $dosens] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens',
            'nama' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'. $request->nama . '-'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('img/', $filenameSimpan);
        }


        $dosen = new Dosen;
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jenis_kelamin = $request->input('jenis_kelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->ttl = $request->input('ttl');
        $dosen->photo = $filenameSimpan;
        $dosen->save();

        return redirect()->route('dosen.index')->with('message', "Data {$request['nama']} berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.detail', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::find($id);
        return view('dosen.edit', [
            'dosen' => $data
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
        $request->validate([
            'nidn' => 'required|unique:dosens',
            'nama' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dosen = Dosen::find($id);
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jenis_kelamin = $request->input('jenis_kelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->ttl = $request->input('ttl');

        if($request->hasFile('photo')){

            $destination = 'public'. $request->gambar;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'. $request->nama . '-'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public', $filenameSimpan);
            $dosen->photo = $filenameSimpan;
        }
        
        $dosen->update();

        return redirect()->route('dosen.index')->with('message', "Data dosen berhasil diubah!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if($dosen->photo){
            Storage::delete($dosen->photo);
        }
        $dosen->delete();

        return redirect()->route('dosen.index')->with('message', "Data {$dosen['nama']} berhasil dihapus!");
    }
}
