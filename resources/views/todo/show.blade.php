@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h1>Berat Tanggal {{ $weight->tanggal }}</h1>
                        <div class="ml-auto">
                            <a href="{{ route('weights.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Tanggal</th>
                            <th>{{ $weight->tanggal }}</th>
                        </tr>
                        <tr>
                            <td>Max</td>
                            <td>{{ number_format($weight->max) }}</td>
                        </tr>
                        <tr>
                            <td>Min</td>
                            <td>{{ number_format($weight->min) }}</td>
                        </tr>
                        <tr>
                            <td>Perbedaan</td>
                            <td>{{ (number_format($weight->max - $weight->min)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
