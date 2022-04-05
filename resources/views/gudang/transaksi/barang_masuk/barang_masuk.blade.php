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
                                <h4 class="card-title">Add Data</h4>
                                <a href="{{ route('addMasuk') }}" class="btn btn-primary btn-round ml-auto" >
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </a>
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
                                            <th>lokasi</th>
                                            <th>kondisi</th>
                                            <th>keterangan</th>
                                            <th>tgl masuk</th>
                                            <th>harga</th>
                                            <th>jumlah</th>
                                            <th>total</th>
                                            {{-- <th style="width: 10%">Action</th> --}}
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
                                            <td>{{ $bsk->nama_lokasi }}</td>
                                            <td>{{ $bsk->kondisi }}</td>
                                            <td>{{ $bsk->keterangan }}</td>
                                            <td>{{ date('d F Y', strtotime($bsk->tgl_brg_masuk)) }}</td>
                                            <td>Rp.{{ number_format($bsk->harga) }}</td>
                                            <td>{{ $bsk->jml_brg_masuk }}</td>
                                            <td>Rp.{{ number_format($bsk->total) }}</td>
                                            {{-- <td>
                                                <div class="form-button-action">
                                                    <button type="button" href="#editData{{ $b->id }}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" href="#deleteData{{ $b->id }}" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td> --}}

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
@endsection

