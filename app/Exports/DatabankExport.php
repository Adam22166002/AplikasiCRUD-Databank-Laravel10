<?php

namespace App\Exports;

use App\Models\BankModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DatabankExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export',[
            'data' =>BankModel::all()
        ]);
    }

    // public function map($data): array
    // {
    //     return [
    //         $data->kode_bank,
    //         $data->nama_bank,
    //         $data->jenisBank->nama_jenis,
    //         $data->alamat,
    //         $data->kota,
    //         $data->provinsi,
    //         $data->kode_pos,
    //         $data->nomer_telepon,
    //         $data->email,
    //         $data->deskripsi
    //     ];
    // }
    // public function headings(): array
    // {
    //     return [
    //     'No',
    //     'Kode Bank',
    //     'Nama Bank',
    //     'Jenis Bank',
    //     'Alamat',
    //     'Kota',
    //     'Provinsi',
    //     'Kode Pos',
    //     'Nomer Telepon',
    //     'Email',
    //     'Deskripsi'
    //     ];
    // }
}
