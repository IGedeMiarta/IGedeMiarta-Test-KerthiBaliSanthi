@extends('app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between">
                <h4>Table {{ $title }}</h4>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add
                    {{ $title }}</button>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($table as $a)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $a->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('category.delete', $a->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-warning editBtn" data-name="{{ $a->name }}"
                                        data-url="{{ route('category.update', $a->id) }}" data-bs-toggle="modal"
                                        data-bs-target="#editModal">Edit</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data to display</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add {{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ $title }}</label>
                            <input type="text" class="form-control" id="title" name="name" placeholder="name..."
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{ $title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="updateForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">{{ $title }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name..."
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <script>
            $(document).ready(function() {

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ Session::get('success') }}",

                });

            });
        </script>
    @endif
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                $('#updateForm').attr('action', $(this).data('url'));
                $('#name').val($(this).data('name'))
            })
        });
    </script>
@endpush
