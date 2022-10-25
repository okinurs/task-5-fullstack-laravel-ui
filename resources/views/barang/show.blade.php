@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="col-lg-12 m-3">
                        <div class="pull-left">
                            <h2>Detail Articles</h2>
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
               
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            
                            <table class="table m-2 mb-2">
                                
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $barang->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{ $barang->merk }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>{{ $barang->spesifikasi }}</td>
                                </tr>
                                <tr>
                                    <td>User ID</td>
                                    <td>{{ $barang->lokasi }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $keterangan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
