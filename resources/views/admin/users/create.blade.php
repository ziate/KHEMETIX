@extends("layouts.admin")
@section("title", "Create User")
@section("header", "Create User")
@section("content")
<div class="card">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.users.store') }}" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Locale</label>
                <select name="locale" class="form-select">
                    <option value="">Default</option>
                    <option value="ar" @selected(old('locale') === 'ar')>Arabic (ar)</option>
                    <option value="en" @selected(old('locale') === 'en')>English (en)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    <option value="customer" @selected(old('role') === 'customer')>Customer</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection
