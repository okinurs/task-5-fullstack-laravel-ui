@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="row"> --}}
                    <div class="card-header">
                        <h3>Posts Articles</h3>
                    </div>
                    <div class="col-lg-12 m-3">
                        <div class="float-left">
                            
                        </div>
                        <div class="">
                            <a class="btn btn-success btn-sm" href="{{ route('barang.create') }}"> <i class="fa-regular fa-folder-plus">New Article</i></a>
                        </div>
                    </div>
                {{-- </div> --}}
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
               
             <div class="card m-3">
                 <table class="table table-bordered">
                     <tr>
                         <th>No</th>
                         <th>Title</th>
                         <th>Content</th>
                         <th>Image</th>
                         <th>User ID</th>
                         <th>Kategori</th>
                         <th width="180px">Aksi</th>
                     </tr>
                     @foreach ($rsBarang as $barang)
                     <tr>
                         <td>{{ ++$i }}</td>
                         <td>{{ $barang->nama }}</td>
                         <td>{{ $barang->merk }}</td>
                         <td>{{ $barang->spesifikasi }}</td>
                         <td>{{ $barang->lokasi }}</td>
                         <td>{{ $barang->kategori->kategori }}</td>
                         <td>
                             <form action="{{ route('barang.destroy',$barang->id) }}" method="POST">
                
                                 <a class="btn btn-info btn-sm" href="{{ route('barang.show',$barang->id) }}">Show</a>
                 
                                 <a class="btn btn-primary btn-sm" href="{{ route('barang.edit',$barang->id) }}">Edit</a>
                
                                 @csrf
                                 @method('DELETE')
                   
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>
                         </td>
                     </tr>
                     @endforeach
                 </table>
             </div>
              
                {!! $rsBarang->links() !!}

            
            </div>
        </div>
    </div>
</div>
@endsection
