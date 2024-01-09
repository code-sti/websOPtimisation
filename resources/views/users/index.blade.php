@extends('layouts.app')

@section('content')

<div class="card">
    <a href="{{ route('notifications.create') }}" class="btn btn-primary">Send Notification</a>
    <div class="card-header">Users</div>
    <div class="card-body">
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.index') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' }
                ]

            });
    })
</script>
@endsection
