@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category Create</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Created By</th>
                                    <th>Updated BY</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>
                                    <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('category.destroy',$category->id)}}" method="POST" onsubmit="alert('Are yo sure')">
                                             @csrf
                                             <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                           
                        </table>
                         {{$categories->links()}}
                    {{-- <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btnsave" class="btn btn-info" value="save">
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()