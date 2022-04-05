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
                        <a href="#">Barang</a>
                    </li>
                </ul>
            </div>




            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addData">
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
                                            <th>nama barang</th>
                                            <th>kategori</th>
                                            <th>merk</th>
                                            <th>spek</th>
                                            <th>harga</th>
                                            <th>stok</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($barang as $b )
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $b->nama_barang }}</td>
                                            <td>{{ $b->nama_kategori }}</td>
                                            <td>{{ $b->nama_merk }}</td>
                                            <td>{{ $b->spek }}</td>
                                            <td>{{ number_format($b->harga) }}</td>
                                            <td>{{ $b->stok }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" href="#editData{{ $b->id }}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" href="#deleteData{{ $b->id }}" data-toggle="modal" title="" class="btn btn-link btn-danger" data-original-title="hapus">
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
                    <form action="{{ route('createBarang') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="id_kategori">kategori</label>
                            <select name="id_kategori" class="form-control">
                                @foreach ( $kategori as $ki )
                                <option value="{{ $ki->id }}">{{ $ki->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_merk">merk</label>
                            <select name="id_merk" class="form-control">
                                @foreach ( $merk as $kik )
                                <option value="{{ $kik->id }}">{{ $kik->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">spek</label>
                            <textarea type="text" class="form-control" name="spek" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" name="harga" placeholder="harga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="stok" placeholder="stok" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">unit</span>
                                </div>
                            </div>
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



@foreach ( $barang as $brg )
<div class="modal fade" id="editData{{ $brg->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('updateBarang', $brg->id) }}" method="post">
                        @csrf

                        <input type="hidden" class="form-control" value="{{ $brg->id }}">

                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="{{ $brg->nama_barang }}">
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">kategori</label>
                            <select name="id_kategori" class="form-control">
                                <option value="{{ $brg->id_kategori }}">{{ $brg->nama_kategori}}</option>
                                @foreach ( $kategori as $k )
                                <option value="{{ $k->id }}">{{ $k->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_merk">merk</label>
                            <select name="id_merk" class="form-control">
                                <option value="{{ $brg->id_merk }}">{{ $brg->nama_merk }}</option>
                                @foreach ( $merk as $m )
                                <option value="{{ $m->id }}">{{ $m->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">spek</label>
                            <textarea type="text" class="form-control" name="spek" required cols="30" rows="10">{{ $brg->spek }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="number" class="form-control" name="harga" value="{{ $brg->harga }}" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" value="{{ $brg->stok }}" required>
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

@foreach ($barang as $br )
<div class="modal fade" id="deleteData{{ $br->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ route('hapusbarang', $br->id) }}" method="get">
                        @csrf
                        <input type="hidden" class="form-control" value="{{ $br->id }}">
                        <div class="form-group">
                            <label for="nama">Data Akan dihapus</label>
                            <input type="text" class="form-control" value="{{ $br->nama_barang }}" readonly>
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

