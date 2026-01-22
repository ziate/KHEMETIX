@extends("layouts.admin")
@section("title", "AI Models")
@section("header", "AI Models")
@section("content")
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Model ID</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>llama-3.3-70b-versatile</td>
                    <td>Production</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td><button class="btn btn-sm btn-secondary">Configure</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection