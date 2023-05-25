@extends('layout.main')
@section('content')
    <form action="{{ url('category/' . $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">nama</label>
        <input type="text" name="name" value="{{ $data->name }}">
        <button type="submit">submit</button>
    </form>
@endsection
