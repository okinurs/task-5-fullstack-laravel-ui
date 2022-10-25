@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 m-3">
                        <div class="pull-left">
                            <h2>Edit Kategori</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('kategori.index') }}"> Back</a>
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
                  
                  <?php   
                      $aKeterangan=array(' '=>'',
                                         'Modal'=>'Modal',
                                         'Alat'=>'Alat',
                                         'Bahan Habis Pakai'=>'Bahan Habis Pakai',
                                         'Bahan Tidak Habis Pakai'=>'Bahan Tidak Habis Pakai');   
            ?> 
                  
                <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
               
                     <div class="row m-2">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category</strong>
                                <input type="text" name="kategori" value="{{ $kategori->kategori }}" class="form-control" placeholder="Category">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group mt-2">
                                <strong>Description</strong>
                                <select class="form-control" id="exampleFormControlSelect1" name="keterangan">
                                  
                                  @foreach($aKeterangan as $ket)
                                      @if ($ket==$kategori->keterangan)
                                          <option value="{{$ket}}" selected>{{$ket}}</option>
                                      @else
                                          <option value="{{$ket}}">{{$ket}}</option>
                                      @endif
                                      
                                  @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="mt-3 mb-2 col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
               
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
