<div>
    <form wire:submit="save" method="POST">
        <div style="display: flex; justify-content: end; gap: 20px">
            <div style="display: flex; gap: 10px">
                <div class="mb-3">
                    <label for="year" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="year" wire:model="title" placeholder="type..">
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Book Year</label>
                    <input type="number" class="form-control" id="year" wire:model="year" placeholder="type..">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <select name="author" id="author" class="form-control" wire:model="author_id">
                        <option value="null">Select</option>
                        @foreach ($authors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <select name="author" id="author" class="form-control" wire:model="category_id">
                        <option value="null">Select</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label"></label>
                <br>
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </div>

        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($table as $book)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->getAuthor->name }}</td>
                        <td>{{ $book->getCategory->name }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-warning" wire:click.prevent="edit({{ $book->id }})"
                                    data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                <button class="btn btn-danger"
                                    wire:click.prevent="delete({{ $book->id }})">Delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data to display</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{ $table->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>


@push('script')
    @script
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
                    },
                    didClose: () => {
                        window.location.reload();
                    }
                });
                $wire.on('toast', (rs) => {
                    Toast.fire({
                        icon: "success",
                        title: rs.title,

                    });
                });

            });
        </script>
    @endscript
@endpush
