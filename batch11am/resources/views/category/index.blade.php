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
                            <th>Action</th>
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
                                    <a href="{{ route('category.edit',$cat->id) }}">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy',$cat->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    @if ($cat->status == "Active")
                                        <form action="{{ route('categorySoftDelete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cat->id }}">
                                            <button type="submit" class="btn btn-danger">Inactive</button>
                                        </form>
                                    @else 
                                    <form action="{{ route('categorySoftDelete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cat->id }}">
                                            <button type="submit" class="btn btn-info">Active</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection