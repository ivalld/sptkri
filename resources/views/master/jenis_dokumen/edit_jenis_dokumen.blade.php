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
    <div class="col-md-6 mt-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5> Form Tambah Jenis Dokumen </h5> 
            </div> 
            <div class="card-body pad">  
                <form method="POST" action="{{route('update_jenis_dokumen',$dokumen->id_dokumen)}}">
                    @csrf
                     <div class="form-group">
                        <label class="ukuran_font" for="jenis_dokumen">Jenis Dokumen</label>
                        <input type="text" class="form-control ukuran_font"  name="jenis_dokumen" id="jenis_dokumen" value="{{$dokumen->jenis_dokumen}}">
                         <span class="text-danger">{{$errors->first('jenis_dokumen')}}</span>
                    </div> 
                     <div class="form-group">
                        <label class="ukuran_font" for="kode_dokumen">Kode Dokumen</label>
                        <input type="text" class="form-control ukuran_font"  name="kode_dokumen" id="kode_dokumen" value="{{$dokumen->kode_dokumen}}">
                         <span class="text-danger">{{$errors->first('kode_dokumen')}}</span>
                    </div> 
                    <div class="form-group">
                        <label class="ukuran_font" for="keterangan">Keterangan</label>
                        <textarea class="form-control ukuran_font" id="keterangan" value="{{$dokumen->keterangan}}" name="keterangan">{{$dokumen->keterangan}}</textarea>
                    </div>  
                    <hr> 
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" style="width:150px" class="btn btn-block bg-gradient-primary btn-sm"><i class="fa fa-save"></i>  Simpan </button>
                        </div>
                        <div class="col-md-4"> 
                            <a href="{{route('jenis_dokumen')}}" style="width:150px" class="btn btn-block bg-gradient-secondary btn-sm"> <i class="fa fa-arrow-circle-left"></i> Kembali </a>
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