@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p class="text-center display-4">Manage Category</p>
                @if (Session::get('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>                
                @endif
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $cat)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$cat->categoryName}}</td>
                                <td>{{$cat->description}}</td>
                                <td>{{$cat->status}}</td>
                                <td>
                                    <button class="btn btn-success">Edit</button>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy',$cat->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection