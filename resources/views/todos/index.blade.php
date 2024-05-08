@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('todos.create') }}" class="btn btn-warning">Create New Task</a>
                @if(isset($todos))
                @if(session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">SL.No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=1;
                        @endphp
                        @foreach($todos->all() as $all)
                        <tr>
                        <th scope="row">@php echo $i; $i++; @endphp</th>
                        <td>{{$all->title}}</td>
                        <td>{{$all->description}}</td>
                        <td>@if ($all->is_completed == 1)
                            <a class="btn btn-sm btn-success" href="">completed</a>
                            @else
                            <a class="btn btn-sm btn-danger" href="{{ route('todos.task', $all->id) }}">incompleted</a>
                            @endif
                        </td>
                        <td id="outer">
                            <a class="inner btn btn-sm btn-success" href="{{ route('todos.show', $all->id) }}">View</a>
                            <a class="inner btn btn-sm btn-info" href="{{ route('todos.edit', $all->id) }}">Edit</a>
                            <a href="{{ route('todos.destroy', $all->id) }}" class="inner btn btn-sm btn-danger">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
