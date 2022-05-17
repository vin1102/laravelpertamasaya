
@extends('layouts.app')

@section('title', 'Urutan')

@section('content')

@foreach ($friends as $friend)
     <h1>Urutan ke - {{ $friend['ke'] }}</h1>
     <h3>Nomor ke - {{ $friend['nomer'] }}</h3>

@endforeach
    
@endsection