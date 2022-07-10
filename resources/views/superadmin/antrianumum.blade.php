@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('title')
<strong>BERANDA</strong>
@endsection
@section('content')
<br />
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">DAFTAR UMUM (PERNAH BEROBAT DI PUSKESMAS INI)</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/daftarantrian/umum/pernah">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK/NAMA</label>
                        <div class="col-sm-10">
                            <select name="pasien_id" class="form-control select2">
                                <option value="">-pilih-</option>
                                @foreach ($pasien as $item)
                                <option value="{{$item->id}}"> {{$item->nik}} - {{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">POLI</label>
                        <div class="col-sm-10">
                            <select name="poli_id" class="form-control">
                                <option value="">-pilih-</option>
                                @foreach ($poli as $item)
                                <option value="{{$item->id}}"> {{$item->nmPoli}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TANGGAL DAFTAR</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">DAFTAR</button><br />
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">DAFTAR UMUM (BELUM PERNAH BEROBAT DI PUSKESMAS INI)</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/daftarantrian/umum">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik" required maxlength="16">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NAMA PASIEN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="L"> Laki-laki</option>
                                <option value="P"> Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">POLI</label>
                        <div class="col-sm-10">
                            <select name="poli_id" class="form-control">
                                <option value="">-pilih-</option>
                                @foreach ($poli as $item)
                                <option value="{{$item->id}}"> {{$item->nmPoli}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TANGGAL DAFTAR</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" readonly>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">DAFTAR</button><br />
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

@push('js')
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
</script>
@endpush