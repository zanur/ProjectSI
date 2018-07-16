<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\pasien;
use App\User;
use App\Notifications\Pesan;
use Illuminate\Notifications\DatabaseNotification;
use Validator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tugas()
    {
        return view('/pasien/tugas');
    }

    public function index()
    {
        $list = pasien::orderBy('tanggal_kunjungan', 'DESC')->get();
        //dd('$list');
        return view('/pasien', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = User::where('kategori', '2')->get();
        return view('pasien/create', ['list' => $list]);
    }

    public function create1($id)
    {   
        $list = DatabaseNotification::find($id);
        return view('pasien/create1', ['list' => $list->data['isi'], 'id'=>$list->id]);
    }

    public function create2($id)
    {   
        $list = DatabaseNotification::find($id);
        return view('pasien/create2', ['list' => $list->data['isi'], 'id'=>$list->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        pasien::create([
            'tanggal_kunjungan' => date('Y-m-d'),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'user_id' => $request->dokter,
            'diagnosa' => $request->diagnosa,
            'obat' => $request->obat,
            'biaya' => $request->biaya,
        ]);
        $baca = DatabaseNotification::find($request->id);
        $baca->markAsRead();

        return redirect('/pasien')->with('status', 'Pasien Berhasil Ditambahkan!');
    }

    public function kirim(Request $request)
    {  
        $kode =  $request->kode;
        $isi = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pengirim' => $request->pengirim,
        ];

        $user = User::find($request->dokter);
        $user->notify(new Pesan($kode, $isi));        
        return redirect('/pasien')->with('status', 'Data dikirim!');
    }

    public function kirim1(Request $request)
    {
        $kode =  $request->kode;
        $isi = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'user_id' => $request->dokter,
            'diagnosa' => $request->diagnosa,
            'obat' => $request->obat,
        ];
        $baca = DatabaseNotification::find($request->id);
        $baca->markAsRead();

        $user = User::find($request->pengirim);
        $user->notify(new Pesan($kode, $isi));        
        return redirect('/tugas')->with('status', 'Data dikirim!');;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = pasien::where('id_pasien', $id)->first();
        return view('pasien/single', ['pasien' => $pasien]);
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
}
