@extends('layouts.app')

@section('title', 'Coba')

@section('content')
<div class="card">
    <div class= "card-body">
        <h3>Nama Teman : {{ $group['name'] }}</h3>
        <h3>No Telepon Teman : {{$group['description']}}</h3>
    </div>
</div>
@endsection



