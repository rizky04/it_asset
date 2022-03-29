<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>
    <div class="card-body">
        <p align="center">
            Periode Tanggal {{ $tgl_awal }} s/d {{ $tgl_akhir }}
        </p>
        <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>nomer barang masuk</th>
                        <th>barang</th>
                        <th>kategori</th>
                        <th>tgl masuk</th>
                        <th>harga</th>
                        <th>jumlah</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($sum_total == 0)
                    <tr>
                        <td colspan="8">
                            <center>
                                <b>
                                    Data tidak ada pada periode tanggal {{ date('d F Y', strtotime($tgl_awal)) }}
                                    s/d {{ date('d F Y', strtotime($tgl_akhir)) }}
                                </b>
                            </center>
                        </td>
                    </tr>
                    @else
                            @php
                            $no=1;
                            @endphp
                            @foreach ($brg_msk as $bsk )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $bsk->no_barang_masuk }}</td>
                                <td>{{ $bsk->nama_barang }}</td>
                                <td>{{ $bsk->nama_kategori }}</td>
                                <td>{{ date('d F Y', strtotime($bsk->tgl_brg_masuk)) }}</td>
                                <td>Rp.{{ number_format($bsk->harga) }}</td>
                                <td>{{ $bsk->jml_brg_masuk }}</td>
                                <td>Rp.{{ number_format($bsk->total) }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>-</td>
                                <td colspan="6">Total Harga</td>
                                <td>Rp. {{ number_format($sum_total)}}</td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
