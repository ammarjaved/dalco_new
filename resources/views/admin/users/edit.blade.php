@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $user->type }}" required>
            </div>

            <div class="mb-3">
                <label for="area" class="form-label">Area</label>
                <input type="text" class="form-control" id="area" name="area" value="{{ $user->area }}" required>
            </div>

            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <input type="text" class="form-control" id="project" name="project" value="{{ $user->project }}" required>
            </div>

            <div class="mb-3">
                <label for="vendor" class="form-label">Vendor</label>
                <input type="text" class="form-control" id="vendor" name="vendor" value="{{ $user->vendor }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
