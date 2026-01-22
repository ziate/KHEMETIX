@extends("layouts.admin")
@section("title", __("messages.plans"))
@section("header", __("messages.plans"))
@section("content")
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary">Create New Plan</button>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h3>Starter</h3>
                <p class="h4">$10/mo</p>
                <hr>
                <p>1,000 Credits</p>
                <button class="btn btn-outline-primary">Edit Plan</button>
            </div>
        </div>
    </div>
</div>
@endsection