@extends('layouts.apps')
@section('content')
@if (session('info'))
<div class="alert alert-success alert-dismissible mb-2 mt-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center">
        <i class="bx bx-like"></i>
        <span>
            {{ session('info') }}
        </span>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12 mt-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5> Form Edit Kapal </h5>
            </div>
            <div class="card-body pad">
                <form method="POST" action="{{route('update_kapal', $data_kapal->id_kapal)}}">
                    @csrf
                    <div class="form-group">
                        <label class="ukuran_font">Kelompok <span class="text-danger">*</span></label>
                        <select class="form-control ukuran_font select2" name="jenis_kapal" id="jenis_kapal">
                            <option value="{{$data_kapal->jenis_kapal}}">{{$data_kapal->nama_jenis_kapal}}</option>
                            @foreach ($jenis_kapal as $item)
                            <option value="{{$item->kode_jenis_kapal}}">{{$item->nama_jenis_kapal}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->first('jenis_kapal')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="nama_kapal" class="ukuran_font">Nama Kapal</label>
                        <input type="text" class="form-control ukuran_font" value="{{$data_kapal->nama_kapal}}" name="nama_kapal" id="nama_kapal">
                        <span class="text-danger">{{$errors->first('nama_kapal')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="no_lambung" class="ukuran_font">No Lambung Kapal</label>
                        <input type="text" class="form-control ukuran_font" value="{{$data_kapal->no_lambung}}" name="no_lambung" id="no_lambung">
                        <span class="text-danger">{{$errors->first('no_lambung')}}</span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" style="width:150px" class="btn btn-block bg-gradient-primary btn-sm">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('kapal')}}" style="width:150px" class="btn btn-block bg-gradient-secondary btn-sm">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">

    </div>
</div>
@endsection