<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    //Raw
    public function insertRaw(){
        $data = DB::insert("INSERT INTO mahasiswa 
        (nim,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir) VALUES ('201063118','Salsabilla','P','Mahkota Regency','Karawang','19 Juni 2002')");
        dump($data);
       }
    public function selectRaw(){
        $data=DB::select("SELECT * FROM Mahasiswa");
        dump($data);
    }
    public function updateRaw(){
        $data = DB::update("UPDATE mahasiswa SET nama='Innayah' WHERE nama='Salsabilla'");
        dump($data);
       }
    public function deleteRaw(){
        $data = DB::delete("DELETE FROM Mahasiswa WHERE nama= 'Innayah'");
        dump($data);
       }
    //QueryBuilder
   public function insertQueryBuilder(){
    $data = DB::table('Mahasiswa')->insert(
        [
            'nim' => '211063123',
            'nama' => 'Yahya',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Kenangan',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '15 Oktober 2003',
        ]
        );
    dump($data);
   }
   public function selectQueryBuilder(){
    $data=DB::table("Mahasiswa")->get();
    dump($data);
   }
   public function updateQueryBuilder(){
    $data = DB::table('mahasiswa')
    ->where('nama', 'Yahya',)
    ->update(
        [
            'updated_at' => now(),
        ]
        );
    dump($data);
   }
   public function deleteQueryBuilder(){
    $data = DB::table('Mahasiswa')
    ->where('nama', 'Yahya')
    ->delete();
    dump($data);
   } 
   //Eloquent
   public function insertEloquent(){
    Mahasiswa::create(
        [
            'nim' => '201063135',
            'nama' => 'Amanda Febrianti',
            'jenis_kelamin' => 'P',
            'alamat' => '?',
            'tempat_lahir' => '?',
            'tanggal_lahir' => '28 Februari 2000',
        ]
        );
    return "Data Berhasil Disimpan";
   }
   public function selectEloquent(){
    $data = Mahasiswa::all();
    dump($data);
   }
   public function updateEloquent(){
    Mahasiswa::where('nama', 'Amanda Febrianti')->first()->update([
        'nama' => 'Amanda'
    ]);
    return "Data Berhasil di Ubah";
   }
   public function deleteEloquent(){
    $data = Mahasiswa::where('nama', 'Amanda')->delete();
    return "Data Berhasil Dihapus";
   }
}