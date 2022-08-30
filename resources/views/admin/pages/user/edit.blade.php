@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/user') }}">User</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 p-0">Form User</h5>
                    </div>
                    <div class="card-body pt-3">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="fullname" class="form-label">Fullname</label>
                                    <input type="text" name="fullname" value="{{ $user->fullname }}"
                                        class="form-control @error('fullname') is-invalid @enderror">

                                    @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input disabled type="text" autocomplete="new-email" name="email" value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror">
    
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input disabled type="text" name="username" value="{{ $user->username }}"
                                        class="form-control @error('username') is-invalid @enderror">
    
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" autocomplete="new-email" name="password"
                                        value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror">
    
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label">Role</label>
    
                                    <select class="form-select @error('role') is-invalid @enderror"
                                        aria-label="Select Data" name="role">
                                        <option value="ADMIN" @if ($user->role =='ADMIN' ) selected @endif>ADMIN
                                        </option>
                                        <option value="USER" @if ($user->role =='USER' ) selected @endif>USER</option>
                                    </select>
    
                                    @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <a href="{{ url('admin/user') }}" class="btn btn-danger">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection