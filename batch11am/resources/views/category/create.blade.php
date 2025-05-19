@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @if (Session::get('success'))
                    <div class="alert alert-info">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection