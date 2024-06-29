@extends('layout.layout')

@section('content')
<div class="content">
    <div class="content-fluid my-4">
        <div class="alert alert-primary">
            Selamat Datang
            {{auth()->user()->name}}
        </div>
    </div>
</div>
@endsection