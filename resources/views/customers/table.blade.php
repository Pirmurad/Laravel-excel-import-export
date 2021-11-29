<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Full name</th>
        <th scope="col">Email</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
    </tr>
    </thead>
    <tbody>
    @forelse($customers as $customer)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->fullname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created_at }}</td>
            <td>{{ $customer->updated_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="100%">
                <div class="alert alert-danger" role="alert">
                    Not found data
                </div>
            </td>
        </tr>
    @endforelse

    </tbody>
</table>
