@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/teacher') }}">Teacher</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off" action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 p-0">Form Teacher</h5>
                    </div>
                    <div class="card-body pt-3">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="lesson" class="form-label">Lesson</label>
                                    <input type="text" name="lesson" value="{{ old('lesson') }}"
                                        class="form-control @error('lesson') is-invalid @enderror">

                                    @error('lesson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror">

                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fb" class="form-label">Facebook</label>
                                    <input type="text" name="fb" value="{{ old('fb') }}"
                                        class="form-control @error('fb') is-invalid @enderror">

                                    @error('fb')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tw" class="form-label">Twitter</label>
                                    <input type="text" name="tw" value="{{ old('tw') }}"
                                        class="form-control @error('tw') is-invalid @enderror">

                                    @error('tw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ig" class="form-label">Instagram</label>
                                    <input type="text" name="ig" value="{{ old('ig') }}"
                                        class="form-control @error('ig') is-invalid @enderror">

                                    @error('ig')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea name="bio" cols="10" rows="3"
                                        class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                                    @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" value="{{ old('image') }}"
                                        class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <a href="{{ url('admin/teacher') }}" class="btn btn-danger">
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