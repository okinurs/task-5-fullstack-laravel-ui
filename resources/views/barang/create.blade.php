@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 m-3">
                        <div class="pull-left">
                            <h2>Create New Articles</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('barang.index') }}"> Back</a>
                        </div>
                    </div>
                {{-- </div> --}}
                   
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                    
                    
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                  
                     <div class="row m-2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="nama" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Content</strong>
                                <input type="text" name="merk" class="form-control" placeholder="Content">
                            </div>
                            <div class="form-group mt-2">
                                <strong>Image</strong>
                                <input type="text" name="spesifikasi" class="form-control" placeholder="image.png">
                            </div>
                            <div class="form-group mt-2">
                                <strong>User ID</strong>
                                <input type="text" name="lokasi" class="form-control" placeholder="user id">
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Category</strong>
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="kategori_id">
                                      @foreach ($rsKategori as $kategori)
                                          <option value="{{$kategori->id}}">{{ $kategori->kategori }}</option>
                                      @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3 mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
