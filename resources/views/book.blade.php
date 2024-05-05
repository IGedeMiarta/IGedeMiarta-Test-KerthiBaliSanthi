@extends('app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between">
                <h4>Table Book</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Book</button>
            </div>

            <hr>
            <livewire:book.table />
        </div>
    </div>

    <livewire:book.add />
    <livewire:book.edit />
@endsection
