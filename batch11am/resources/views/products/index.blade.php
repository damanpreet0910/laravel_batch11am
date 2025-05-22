@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p class="text-center display-4">Manage Product</p>
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
                            <th>Product Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $pro)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$pro->category->categoryName}}</td>
                                <td>{{$pro->productName}}</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="#" method="post">
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