@extends("layouts.admin")
@section("title", __("messages.users"))
@section("header", __("messages.users"))
@section("content")
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Admin User</td>
                    <td>admin@khemetix.com</td>
                    <td><span class="badge bg-danger">Admin</span></td>
                    <td><button class="btn btn-sm btn-primary">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection