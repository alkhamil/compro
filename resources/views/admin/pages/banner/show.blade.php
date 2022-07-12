@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/banner') }}">Banner</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0 p-0">Form Banner</h5>
                </div>
                <div class="card-body pt-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input disabled type="text" name="name" value="{{ $banner->name }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea disabled name="desc" cols="10" rows="3"
                                    class="form-control @error('desc') is-invalid @enderror">{{ $banner->desc }}</textarea>
                                @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" disabled name="image" value="{{ $banner->image }}"
                                    class="form-control @error('image') is-invalid @enderror">

                                <img width="300" src="{{ asset('storage') . '/' . $banner->image }}" class="mt-3 img-fluid img-thumbnail" alt="">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-12">
                        <a href="{{ url('admin/banner') }}" class="btn btn-danger">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                        <button disabled type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection