@extends('app')
@section('contect')
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between">
                <h4>Table {{ $title ?? '' }}</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add
                    {{ $title ?? '' }}</button>
            </div>

            <hr>
            <livewire:book.table />
        </div>
    </div>

    <livewire:book.add />
@endsection
