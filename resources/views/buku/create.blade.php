@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm6"> 
        <h1 class="m-0">Tambah Buku</h1> 
        </div>
        <!-- /.col --> 
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right"> 
        <li class="breadcrumb-item"> 
            <a href="#">Buku</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
        </ol>
        </div>
        <!-- /.col -->
        </div> 
        <!-- /.row --> 
    </div>
    <!-- /.container-fluid -->
</div> 
<!-- /.content-header --> 
    <!-- Main content --> 
<div class="content">
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-12">
                <div class="card"> 
                    <div class="card-body"> 
                        <form action="{{ route('buku.store') }}" method="POST"
                        enctype="multipart/form-data"> 
                            @csrf 
                            <div class="form-row"> 
                                <div class="form-group col-md-12">
                                    <label class="font-weightbold">Judul Buku</label> 
                                    <input type="text" class="form-control @error('judul')is-invalid @enderror" 
                                    name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Buku">
                                    @error('judul') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> 
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6"> 
                                    <label class="font-weightbold">Penulis</label> 
                                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                                    name="penulis" value="{{old('penulis') }}" placeholder="Masukkan Penulis">
                                    @error('penulis')
                                    <div class="invalid-feedback">x
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection