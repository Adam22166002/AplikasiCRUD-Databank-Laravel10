<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\BankModel;
use App\Models\jenisBank;

class BankController extends Controller
{
    public function index(){
        $items = BankModel::with('jenisBank')->get();
        $data = BankModel::all();
        return view ('dashboard', compact('data'));
    }
   /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $jenis = JenisBank::all();
        return view('create', compact('jenis')); }
    public function store(Request $request): RedirectResponse {
        $validator = validator::make($request->all(), [
            'kode_bank'     => 'required',
            'nama_bank'   => 'required|max:100',
            'jenis_bank'   => 'required',
            'alamat'    => 'required|max:100',
            'kota'    => 'required|max:20',
            'provinsi'    => 'required|max:20',
            'kode_pos'    => 'required|max:5',
            'nomer_telepon'    => 'required',
            'email'    => 'required|max:100',
            'deskripsi'    => 'required']);
        if ($validator->fails()){
            Session::flash('error', "Inputan Harus terisi semua.");
            return redirect('/data/create')->withInput();
        } else { $simpanDatabank = BankModel::create([ 
                'kode_bank'     => $request->input('kode_bank'),
                'nama_bank'   => $request->input('nama_bank'),
                'jenis_bank'   => $request->input('jenis_bank'),
                'alamat'    => $request->input('alamat'),
                'kota'  => $request->input('kota'),
                'provinsi'  => $request->input('provinsi'),
                'kode_pos'  => $request->input('kode_pos'),
                'nomer_telepon' => $request->input('nomer_telepon'),
                'email' => $request->input('email'),
                'deskripsi' => $request->input('deskripsi')]);
            if ($simpanDatabank) {Session::flash('success', 'Proses menambahkan data bank telah berhasil. ');
                return redirect('/data');
            } else {Session::flash('error', 'Proses menambahkan data bank telah gagal. ');
                return redirect('/data/create');
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mengambil data dari tbl_auth berdasarkan ID
        $data = BankModel::find($id);

        // Pemeriksaan Data
        if ($data) {
            // Jika data ditemukan, akan menampilkan detail databank dari setiap data yang dilihat
            return view('/show', ['data' => $data]);
        } else {
            // Jika data tidak ditemukan, menampilkan pesan error
            Session::flash('error', 'Data tidak ditemukan.');
            return redirect('/data');
            }
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id) {
        $jenis = jenisBank::all();
        $data = BankModel::with('jenisBank')->find($id);
        return view('edit', compact('data', 'jenis')); }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id){
    $validator = Validator::make($request->all(), [
        'kode_bank'     => 'max:5',
        'nama_bank'   => 'required|max:100',
        'jenis_bank'   => 'required',
        'alamat'    => 'required|max:100',
        'kota'    => 'required|max:20',
        'provinsi'    => 'required|max:20',
        'kode_pos'    => 'required|max:5',
        'nomer_telepon'    => 'required',
        'email'    => 'required|max:100',
        'deskripsi'    => 'required']);
    if ($validator->fails()) { Session::flash('error', 'Inputan harus terisi semua.');
        return redirect('/data' . '/' . $id . '/edit')->withInput();
    } else { $updateDatabank = BankModel::find($id);
        $updateDatabank->kode_bank = $request->input('kode_bank');
        $updateDatabank->nama_bank = $request->input('nama_bank');
        $updateDatabank->jenis_bank = $request->input('jenis_bank');
        $updateDatabank->alamat = $request->input('alamat');
        $updateDatabank->kota = $request->input('kota');
        $updateDatabank->provinsi = $request->input('provinsi');
        $updateDatabank->kode_pos = $request->input('kode_pos');
        $updateDatabank->nomer_telepon = $request->input('nomer_telepon');
        $updateDatabank->email = $request->input('email');
        $updateDatabank->deskripsi = $request->input('deskripsi');
        if ($updateDatabank->save()) { Session::flash('success', 'Proses update data bank telah berhasil.');
            return redirect('/data');
        } else { Session::flash('error', 'Proses update data bank telah gagal.');
            return redirect('/data' . '/' . $id . '/edit');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mengambil data bank berdasarkan ID
        $idBank = BankModel::find($id);

        if ($idBank->delete()) {
            Session::flash('success', 'Data bank berhasil dihapus.');
            return redirect('/data');
        } else {
            Session::flash('error', 'Data bank gagal dihapus.');
            return redirect('/data');
        } 
    }
}