@php
    use App\Models\Member_groups;
@endphp
@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<div class="container">
    <h3>Tambah Member Group {{$group->name}}</h3>
<form action="{{url('groups/storemember/'. $group->id)}}" method="post">
    @csrf
    <table class="table">
        @foreach ($friends as $f)
        @php
            $cek = Member_groups::where('friends_id', $f->id)
            ->where('groups_id', $group->id)
            ->where('status', 1)
            ->first();
        @endphp
        @if ($cek == NULL)
        <tr>
            <td>

                {{$cek}}
            </td>
            <td>{{$f->nama}}</td>
            <td><div class="form-check">
                <input class="form-check-input" type="checkbox" name="member{{$f->id}}" value="{{$f->id}}" id="{{$f->nama}}">
                <label class="form-check-label" for="{{$f->nama}}">
                    Pilih
                </label>
            </div></td>
        </tr>
        @endif
        @endforeach
    </table>
    <div class="text-right">
        <button type="submit" class="btn btn-success">Tambah Member</button>
    </div>
</form>
</div>
@endsection



