<!DOCTYPE html>
<html>
    <head>
        <title>PDF Databank</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            table tr td,
            table tr th {
                font-size: 10pt;
            }
        </style>
    </head>

    <body>

        <h2 class="text-center mb-3">Laporan Data Bank</h2>
        <table class='table table-bordered'>
            <thead>
                <tr>
                <th>No</th>
                        <th>Kode Bank</th>
                        <th>Nama Bank</th>
                        <th>Jenis Bank</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th>Nomer Telepon</th>
                        <th>Email</th>
                        <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->kode_bank }}</td>
                        <td>{{ $item->nama_bank}}</td>
                        <td>{{ $item->jenisBank->nama_jenis}}</td>
                        <td>{{ $item->alamat}}</td>
                        <td>{{ $item->kota}}</td>
                        <td>{{ $item->provinsi}}</td>
                        <td>{{ $item->kode_pos}}</td>
                        <td>{{ $item->nomer_telepon}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->deskripsi}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </body>
</html>