@extends('layout.main')
@section('content')
    <form action="{{ url('category') }}" method="post" class="w-[500px]">
        @csrf
        <form-group class="flex flex-col gap-3">
            <label for="name">Nama kategory</label>
            <input name="name" type="text" class="rounded " class="mb-6">
            <div>

                <button type="submit"
                    class="bg-sky-600 px-6 py-2 rounded hover:bg-sky-700 text-white transition-all">Submit</button>
            </div>
        </form-group>
    </form>
@endsection
