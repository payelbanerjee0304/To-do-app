
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error) 
                                    <li>{{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                <form method="post" action="{{route('todos.update')}}">
                    @csrf
                    <input type="text" name="uid" id="" value="{{$todo->id}}" hidden>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$todo->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{$todo->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
