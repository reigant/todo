@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Create Todo</h2>
                        <div class="ml-auto">
                            <a href="{{ route('todo.index') }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.store') }}" method="post">
                        @csrf
                        @php
                        @endphp
                        <div class="form-group row">
                            <label for="todo-do_at" class="col-md-5">Tanggal</label>
                            <div class="col-md-7 input-group">
                                @if (!empty($date))
                                <input type="hidden" name="do_at" value="{{ $date }}">
                                <input type="text" id="todo-do_at" value="{{ $date }}" class="form-control" disabled>
                                @else
                                <input type="date" name="do_at" id="todo-do_at" value="{{ old('do_at') }}" class="form-control {{ $errors->has('do_at') ? 'is-invalid': '' }}">
                                @endif
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
                                <input type="text" name="task" id="todo-task" value="{{ old('task') }}" class="form-control {{ $errors->has('task') ? 'is-invalid': '' }}">
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
                                <textarea name="note" id="todo-note" class="form-control {{ $errors->has('note') ? 'is-invalid': '' }}">{{ old('note') }}</textarea>
                                @if ($errors->has('note'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
