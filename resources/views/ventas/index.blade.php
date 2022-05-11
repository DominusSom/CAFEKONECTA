@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if (session('status'))
                <div class="alert alert-info">
                    <ul>
                        <h4>{{ session('status') }}</h4>
                    </ul>
                </div>
            @endif
        </div>
    </div>
    @livewire('admin-ventas.ventas')
@endsection
