@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="m-3 mb-2 col-xs-12 col-sm-12 col-md-12 text-center">
                        <a href="{{ route('barang.index') }}"><button  class="btn btn-primary">Article</button></a>
                        <a href="{{ route('kategori.index') }}"><button  class="btn btn-primary">Category</button></a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
