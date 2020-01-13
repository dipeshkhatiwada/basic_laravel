@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">POat List</div>

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
                                    <th>Category Name</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Updated BY</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{\App\Category::find($post->category_id)->name}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>
                                    <td>
                                       @if($post->status ==0)
                                       <span class="alert alert-danger">Deactive</span>
                                       @else
                                       <span class="alert alert-success">Active</span>
                                       @endif
                                    </td>
                                    <td>{{$post->created_at}}</td>
                                    <td>{{$post->updated_at}}</td>
                                    <td>
                                    {{-- <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('post.destroy',$post->id)}}" method="POST" onsubmit="alert('Are yo sure')">
                                             @csrf
                                             <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                           
                        </table>
                         {{$posts->links()}}
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