@extends('layout.main')
@section('content')
    <form action="{{ url('category') }}" method="post">
        @csrf
        <form-group>
            <label for="name">Nama kategory</label>
            <input name="name" type="text">
            <button type="submit">Submt</button>
        </form-group>
    </form>
@endsection
