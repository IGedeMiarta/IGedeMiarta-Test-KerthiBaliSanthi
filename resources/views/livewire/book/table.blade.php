<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Year</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->getAuthor->name }}</td>
                    <td>{{ $book->getCategory->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: end">
        {{ $table->links() }}
    </div>
</div>
