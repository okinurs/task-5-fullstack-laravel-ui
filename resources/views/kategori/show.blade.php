@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="card-header">
                        
                        <h3>Detail Category</h3>
                    </div>
                    <div class="col-lg-12 m-3">
                        <div class="pull-left">
                        </div>
                         <div class="pull-left">
                            <table class="table">
                                <tr>
                                    <td>Category</td>               		
                                    <td>{{$recKategori}}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$recKeterangan}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                {{-- </div> --}}
               
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
               
                <table class="table table-bordered m-3">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        
                    </tr>
                    @foreach ($rsBarang as $barang)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->merk }}</td>
                        <td>{{ $barang->spesifikasi }}</td>
             
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
