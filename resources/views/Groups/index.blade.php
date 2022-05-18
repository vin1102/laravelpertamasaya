@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<a href="/groups/create" class="btn btn-primary mb-2 btn-sm"><i class="fas fa-plus"></i> Tambah Group</a>
<div class="row">
    
  
@foreach ($groups as $group)
<div class="col-lg-3">
  
<div class="card" style="width: 17rem;">
  <div class="card-body">
    <a href="/groups/{{ $group['id']}}"class="card-title">{{ $group['name'] }}</a>
    <p class="card-text">{{ $group['description'] }}</p>
  <hr>
  <a href="{{url('groups/createmember/'. $group['id'])}}" class="card-link btn-primary">Tambah Anggota</a>

@foreach ($group->member_groups as $friend)
@if ($friend->status == 1)
  <li class="mt-2"> {{$friend->friends->nama}} | <a href="{{url('groups/deletemember/'. $friend->id)}}" class="btn btn-warning btn-sm text-white">hapus</a></li>  
@endif
@endforeach
@php
    $jumlah = $group->member_groups->where('status', 1)->count();
    $jumlah_keluar = $group->member_groups->where('status', 2)->count();
@endphp <br>
<p>Anggota : {{$jumlah}} anggota
  <br>
  Anggota Keluar : {{$jumlah_keluar}} anggota</p>




  <hr>
    <a href="/groups/{{$group['id']}}/edit" class="card-link btn-warning">Edit Group</a>
    <form action="/groups/{{$group['id']}}" method="POST">
      @csrf
      @method('DELETE')
    <button class="card-link btn-danger">Delete Group</a>
    </form>
  </div>
</div>
</div>
@endforeach
</div>

<div class="mt-3">
  {{ $groups->links('paginationcustom') }}

</div>
@endsection



