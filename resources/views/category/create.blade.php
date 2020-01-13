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

                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                            @if($errors->has('name'))
                           <span class="bg bg-danger"> {{$errors->first('name')}}</span>
                            @endif
                            {{-- @foreach($errors->all() as $error)
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