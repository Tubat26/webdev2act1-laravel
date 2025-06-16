@extends('base')

@section('title', 'Student Record')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    
    <h2 class="fw-bold">Student Records</h2>

    <!-- Buttons Container -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
            <i class="bi bi-plus-lg"></i> Add Student
        </button>
        <a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $std)
            <tr>
                <th>{{ $std->id }}</th>
                <td>{{ $std->name }}</td>
                <td>{{ $std->age }}</td>
                <td>{{ $std->gender }}</td>
                <td>{{ $std->address }}</td>
                <td>
                    <!-- Update Button -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $std->id }}">Update</button>

                    <!-- Delete Form -->
                    <form action="{{ route('std.delete', $std->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Update Modal -->
            <div class="modal fade" id="editModal{{ $std->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('std.update', $std->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Names</label>
                                    <input type="text" class="form-control" name="name" value="{{ $std->name }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" value="{{ $std->age }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <input type="text" class="form-control" name="gender" value="{{ $std->gender }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $std->address }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Add New Student Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('std.createNew') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter your age">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control" name="gender" placeholder="Enter your gender">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your address">
                        </div>

                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
