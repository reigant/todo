@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Update Todo</h2>
                        <div class="ml-auto">
                            <a href="{{ route('todo.showByDate', $todo->do_at) }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.update', $todo->id) }}" method="post">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group row">
                            <label for="todo-do_at" class="col-md-5">Tanggal</label>
                            <div class="col-md-7 input-group">
                                <input type="hidden" name="id" value="{{ $todo->id }}">
                                <input type="text" id="todo-do_at" value="{{ $todo->do_at }}" class="form-control" disabled>
                                @if ($errors->has('do_at'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('do_at') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todo-task" class="col-md-5">Task</label>
                            <div class="col-md-7 input-group">
                                <input type="text" name="task" id="todo-task" value="{{ $todo->task }}" class="form-control {{ $errors->has('task') ? 'is-invalid': '' }}">
                                @if ($errors->has('task'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('task') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todo-note" class="col-md-5">Note</label>
                            <div class="col-md-7 input-group">
                                <textarea name="note" id="todo-note" class="form-control {{ $errors->has('note') ? 'is-invalid': '' }}">{{ $todo->note }}</textarea>
                                @if ($errors->has('note'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="todo-status" class="col-md-5">Status</label>
                            <div class="col-md-7 input-group">
                                <select name="status" id="todo-status" class="form-control {{ $errors->has('status') ? 'is-invalid': '' }}">
                                @foreach (config('task.status') as $key => $status)
                                    <option value="{{ $key }}" {{ ($key === $todo->status) ? 'selected' : '' }}>{{ $status['title'] }}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Update Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
