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

                    <form action="{{route('post.store')}}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">select category</option>
                                @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                           <span class="bg bg-danger"> {{$errors->first('category_id')}}</span>
                            @endif
                            {{-- @foreach($errors->all() as error)
                            {{$error}}
                            @endforeach --}}
                        </div>
                        
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                            @if($errors->has('title'))
                           <span class="bg bg-danger"> {{$errors->first('title')}}</span>
                            @endif
                            {{-- @foreach($errors->all() as error)
                            {{$error}}
                            @endforeach --}}
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            {{-- <input type="text" name="content" class="form-control"> --}}
                            <textarea name="content" class="form-control"></textarea>
                            {{-- @if($errors->has('content'))
                           <span class="bg bg-danger"> {{$errors->first('content')}}</span>
                            @endif --}}
                            {{-- @foreach($errors->all() as error)
                            {{$error}}
                            @endforeach --}}
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="radio" name="status"  value="1">Active
                            <input type="radio" name="status"  value="0" checked="">De active
                            @if($errors->has('status'))
                           <span class="bg bg-danger"> {{$errors->first('status')}}</span>
                            @endif
                            {{-- @foreach($errors->all() as error)
                            {{$error}}
                            @endforeach --}}
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btnsave" class="btn btn-info" value="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()