<div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" wire:ignore>
            <div class="modal-content" wire:ignore>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Add Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save" wire:ignore>
                    <div class="modal-body" wire:ignore>
                        <div class="mb-3" wire:ignore>
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="title" wire:model="title"
                                placeholder="English 123" required>
                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="year" class="form-label">Book Year</label>
                            <input type="number" class="form-control" id="year" wire:model="year"
                                placeholder="2024" required>
                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="author" class="form-label">Author</label>
                            <select name="author" id="author" class="form-control" wire:model="author_id" required>
                                <option>Select</option>
                                @foreach ($authors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="author" class="form-label">Author</label>
                            <select name="author" id="author" class="form-control" wire:model="category_id"
                                required>
                                <option>Select</option>

                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" id="closeModalEdit"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
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
        $wire.on('closeModalEdit', () => {
            document.getElementById("closeModalEdit").click();
        });
    </script>
@endscript
