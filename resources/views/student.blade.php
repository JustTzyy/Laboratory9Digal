@extends('Layouts.studentLayout')

@section('content')


<h1 class="text-start mb-4">Student</h1>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="mb-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<div class="text-end mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
    <i class="bi bi-file-plus-fill"></i> Add User
  </button>
</div>

<div class="table-responsive">
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>MIddle Name</th>
        <th>Last Name</th>
        <th>email</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->firstName }}  </td>
      <td>{{ $user->middleName }}</td>
      <td>{{ $user->lastName }}</td>
      <td>{{ $user->email }}</td>
      </tr>
    @empty

      <tr>
      <td colspan="5">No Student available</td>
      </tr>
    @endforelse
    </tbody>
  </table>
</div>


<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- larger modal for tabs -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('student') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
              </div>
              <div class="mb-3">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="middleName">
              </div>
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success w-100 mt-3">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection