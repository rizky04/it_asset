@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
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
                            <div class="card-title">add barang keluar</div>
                        </div>
                        <form action="{{ route('createKeluar') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">No. Barang Keluar</label>
                                <input type="text" class="form-control" name="no_barang_keluar" value="{{ 'NBK-'.date('d-m-Y').'-'.$kd }}" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="tgl_brg_keluar">Tgl barang keluar</label>
                                <input type="date" class="form-control" name="tgl_brg_keluar" id="tgl_brg_keluar">
                            </div>
                            <div class="form-group">
                                <label for="no_asset">no asset</label>
                                <input type="text" class="form-control" name="no_asset" id="no_asset">
                            </div>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" >
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <select name="id_barang" id="id_barang" class="form-control">
                                    <option value="">-- Pilih Barang--</option>
                                    @foreach ($barang as $b )
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_lokasi">Nama Lokasi</label>
                                <select name="id_lokasi" id="id_lokasi" class="form-control">
                                    <option value="">-- Pilih Lokasi--</option>
                                    @foreach ($lokasi as $bi )
                                    <option value="{{ $bi->id }}">{{ $bi->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_departemen">Nama Departemen</label>
                                <select name="id_departemen" id="id_departemen" class="form-control">
                                    <option value="">-- Pilih Departemen--</option>
                                    @foreach ($departemen as $bi )
                                    <option value="{{ $bi->id }}">{{ $bi->nama_departemen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pegawai">Nama Pegawai</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control">
                                    <option value="">-- Pilih Pegawai--</option>
                                    @foreach ($pegawai as $bi )
                                    <option value="{{ $bi->id }}">{{ $bi->nama_pegawai }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="detail_barang"></div>
                           <div class="form-group">
                                <label>Jumlah barang</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="jml_brg_keluar" id="jml_brg_keluar" placeholder="jml_brg_keluar" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">unit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>total</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control" id="total" name="total" placeholder="total" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
                $(document).ready(function(){
                    $("#jml_brg_keluar").keyup(function(){
                        var jml_brg_keluar = $("#jml_brg_keluar").val();
                        var harga = $("#harga").val();

                        var total = parseInt(harga) * parseInt(jml_brg_keluar);
                        $("#total").val(total);
                    });
                });
</script>

<script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>


<script type="text/javascript">
            $("#id_barang").change(function(){
                var id_barang = $("#id_barang").val();
                $.ajax({
                    type: "GET",
                    url : "/barangkeluar/ajax",
                    data: "id_barang="+id_barang,
                    chache:false,
                    success: function(data){
                        $('#detail_barang').html(data);
                    }
                });
            });
</script>
@endsection

