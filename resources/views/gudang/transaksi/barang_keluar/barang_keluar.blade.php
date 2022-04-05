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
                        <a href="#">Barang Keluar</a>
                    </li>
                </ul>
            </div>




            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <a href="{{ route('addKeluar') }}" class="btn btn-primary btn-round ml-auto" >
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
                                            <th>nomer barang keluar</th>
                                            <th>no asset</th>
                                            <th>barang</th>
                                            <th>lokasi</th>
                                            <th>departemen</th>
                                            <th>pegawai</th>
                                            <th>tgl keluar</th>
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
                                        @foreach ($brg_klr as $bk )
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $bk->no_barang_keluar }}</td>
                                            <td>{{ $bk->no_asset }}</td>
                                            <td>{{ $bk->nama_barang }}</td>
                                            <td>{{ $bk->nama_lokasi }}</td>
                                            <td>{{ $bk->nama_departemen }}</td>
                                            <td>{{ $bk->nama_pegawai }}</td>
                                            <td>{{ date('d F Y', strtotime($bk->tgl_brg_keluar)) }}</td>
                                            <td>Rp.{{ number_format($bk->harga) }}</td>
                                            <td>{{ $bk->jml_brg_keluar }}</td>
                                            <td>Rp.{{ number_format($bk->total) }}</td>
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

