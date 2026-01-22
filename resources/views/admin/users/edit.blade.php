@extends("layouts.admin")
@section("title", "Edit User")
@section("header", "Edit User")
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
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
            </div>
            <div class="col-md-3">
                <label class="form-label">Locale</label>
                <select name="locale" class="form-select">
                    <option value="" @selected(old('locale', $user->locale) === null)>Default</option>
                    <option value="ar" @selected(old('locale', $user->locale) === 'ar')>Arabic (ar)</option>
                    <option value="en" @selected(old('locale', $user->locale) === 'en')>English (en)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                    <option value="customer" @selected(old('role', $user->role) === 'customer')>Customer</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
