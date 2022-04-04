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
                        <a href="#">pegawai</a>
                    </li>
                </ul>
            </div>




            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addKategori">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>pegawai</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($pegawai as $k )
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $k->nip}}</td>
                                            <td>{{ $k->nama_pegawai}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" href="#modalEditKategori{{ $k->id }}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" href="#modalDeleteKategori{{ $k->id }}" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>

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

<div class="modal fade" id="addKategori" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('createPegawai') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" placeholder="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="Kategori">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" placeholder="pegawai" required>
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



@foreach ( $pegawai as $kt )
<div class="modal fade" id="modalEditKategori{{ $kt->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('updatePegawai', $kt->id) }}" method="post">
                        @csrf

                        <input type="hidden" class="form-control" name="id" value="{{ $kt->id }}">
                        <div class="form-group">
                            <label for="nip">Nama pegawai</label>
                            <input type="text" class="form-control" name="nip" value="{{ $kt->nip }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" value="{{ $kt->nama_pegawai }}">
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
@endforeach

@foreach ($pegawai as $kg )
<div class="modal fade" id="modalDeleteKategori{{ $kg->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('deletePegawai', $kg->id) }}" method="get">
                        @csrf
                        <input type="hidden" class="form-control" value="{{ $kg->id }}">
                        <div class="form-group">
                            <label for="nama">Data Akan dihapus</label>
                            <input type="text" class="form-control" value="{{ $kg->nama_pegawai }}" readonly>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@endsection

