@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 m-3">
                        <div class="pull-left">
                            <h2>Edit Articles</h2>
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
                  
                <form action="{{ route('barang.update',$barang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
               
                     <div class="row m-2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title</strong>
                                <input type="text" name="nama" value="{{ $barang->nama }}" class="form-control" placeholder="barang">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Content</strong>
                                <input type="text" name="merk" value="{{ $barang->merk }}" class="form-control" placeholder="barang">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Image</strong>
                                <input type="text" name="spesifikasi" value="{{ $barang->spesifikasi }}" class="form-control" placeholder="barang">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>User ID:</strong>
                                <input type="text" name="lokasi" value="{{ $barang->lokasi }}" class="form-control" placeholder="barang">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Category</strong>
                                <select class="form-control" id="exampleFormControlSelect1" name="kategori_id">
                                  
                                  @foreach($rsKategori as $kategori)
                                      @if ($kategori->id==$barang->kategori_id)
                                          <option value="{{$kategori->id}}" selected>{{$kategori->kategori}}</option>
                                      @else
                                          <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                      @endif
                                      
                                  @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="m-3 mb-2 col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
