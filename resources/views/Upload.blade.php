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
                <h5> Dokumen Informasi </h5>
            </div>
            
            <div class="card-body pad">
                <div class="pencarian_data">
                <form>
                <div class="form-group">
                                <label class="ukuran_font">KRI <span class="text-danger">*</span></label>
                                <select class="form-control ukuran_font select2" name="kapal" id="kapal" style="width: 100%;">
                                    <option value=""></option>
                                </select>
                       
                </div>
              
                    <div class="form-group">
                                <label class="ukuran_font">Jenis Dokumen <span class="text-danger">*</span></label>
                                <select class="form-control ukuran_font select2" name="jenisdokumen" id="jenisdokumen" style="width: 100%;">
                                    <option value=""></option>
                                </select>
                       
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label class="ukuran_font">Judul Dokumen <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="juduldokumen" name="juduldokumen">
                                <span class="text-danger"></span>

                            </div>
                </div>
                
                </form>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="/upload" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="file">
                                <button type="submit">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
