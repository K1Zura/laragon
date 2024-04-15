@extends('template.app')
@section('content')
@section('title', 'Home')
<h1 style="font-family: 'Times New Roman', Times, serif">Dashboard</h1>
<br>
<div class="row">
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
</div>

@endsection
