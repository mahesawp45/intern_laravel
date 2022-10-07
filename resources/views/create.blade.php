@extends('layouts.layout')

@section('content')
    <div class="todo-form">
        <h2>{{ $title }} </h2>
        <form  action="{{ route('todo.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label @error('title') is-invalid @enderror">
                    <p>Title</p>
                </label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" autofocus value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label @error('content') is-invalid @enderror">
                    <p>Content</p>
                </label>
                <textarea type="text" class="form-control todo-content-input" id="content" name="content">{{ old('content') }} </textarea>
                @error('content')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="container-button mt-5 fixed-bottom mb-5 pe-5">
                <a href="/" class="btn btn-poli p-3 mx-4">Back</a>
                <button type="submit" class="btn p-3 btn-save">Save</button>
            </div>
        </form>
    </div>
@endsection
