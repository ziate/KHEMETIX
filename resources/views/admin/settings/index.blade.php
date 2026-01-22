@extends("layouts.admin")
@section("title", __("messages.settings"))
@section("header", __("messages.settings") . " (AI & Site)")
@section("content")
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">General Settings</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">App Name</label>
                        <input type="text" class="form-control" value="Khemetix">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">AI Configuration</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Default Temperature</label>
                        <input type="number" step="0.1" class="form-control" value="0.7">
                    </div>
                    <button type="submit" class="btn btn-primary">Update AI Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection