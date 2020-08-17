@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Todo</h2>
                        <div class="ml-auto">
                            <a href="{{ route('todo.create') }}" class="btn btn-outline-secondary">Create Todo</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include ('layouts.messages')
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Total To Do</th>
                            <th>Action</th>
                        </tr>
@if (sizeof($todos) === 0)
                        <tr>
                            <td colspan="4">
                                No Data, Create One
                            </td>
                        </tr>
@endif
@foreach ($todos as $key => $todo)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $todo->do_at }}</td>
                            <td>{{ $todo->total }}</td>
                            <td>
                                <a href="{{ route('todo.showByDate', $todo->do_at) }}" class="btn btn-sm btn-outline-primary float-left">View</a>
                                <form class="float-left ml-1" method="post" action="{{ route('todo.destroyByDate', $todo->do_at) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
