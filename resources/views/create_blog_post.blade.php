{{-- create_blog.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Blog Post</h1>
        <form action="{{ route('blog.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="bank_id">Bank:</label>
                <select id="bank_id" name="bank_id" required class="form-control">
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
