@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="card-header">
                        <h3>Category</h3>
                    </div>
                    <div class="col-lg-12 m-3">
                        <div class="float-left">
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success btn-sm" href="{{ route('kategori.create') }}"> New Category</a>
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- <br /> --}}
                
               
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                
                @endif
                
                @if ($message = Session::get('failed'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
               @endif
               
               
                <table class="table table-bordered m-3">
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th width="180px">Action</th>
                    </tr>
                    @foreach ($rsKategori as $kategori)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td>{{ $kategori->keterangan }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy',$kategori->id) }}" method="POST">
               
                                <a class="btn btn-info btn-sm" href="{{ route('kategori.show',$kategori->id) }}">Show</a>
                
                                <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit',$kategori->id) }}">Edit</a>
               
                                @csrf
                                @method('DELETE')
                  
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
              
                <!-- {!! $rsKategori->links() !!} -->
            </div>
                {{-- {{ $rsKategori->links('vendor.pagination.bootstrap-4') }} --}}
            
        </div>
    </div>
</div>
@endsection
