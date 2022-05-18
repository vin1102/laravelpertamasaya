@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<div class="container">

  <a href="/friends/create" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Teman</a>

  <div class="row">

  @foreach ($friends as $friend)
  <div class="col-lg-3">
    <div class="card" style="width: 17rem;">
      <div class="card-body">
        <a href="/friends/{{ $friend['id']}}"class="card-title">{{ $friend['nama'] }}</a>
        <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_telp'] }}</h6>
        <p class="card-text">{{ $friend['alamat'] }}</p>
    <a href="/friends/{{$friend['id']}}/edit" class="card-link btn-warning">Edit Teman</a>
    <form action="/friends/{{$friend['id']}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="card-link btn-danger">Delete Teman</a>
      </form>
  </div>
</div>

</div>
@endforeach
</div>
<div class="mt-3">
  {{ $friends->links('paginationcustom') }}

</div>
</div>
@endsection



