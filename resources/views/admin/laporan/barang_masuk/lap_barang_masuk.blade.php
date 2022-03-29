@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Master</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Masuk</a>
                    </li>
                </ul>
            </div>




            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Print</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addData">
                                    <i class="fa fa-print"></i>
                                    Print
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addData" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('cetak_lap_barang_masuk') }}" method="get" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label for="tgl_awal">tgl awal</label>
                            <input type="date" class="form-control" name="tgl_awal" placeholder="tanggal awal" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_akhir">tgl akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" placeholder="tanggal akhir" required>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection

