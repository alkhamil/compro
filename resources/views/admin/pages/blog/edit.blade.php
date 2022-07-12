@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/blog') }}">Blog</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 p-0">Form Blog</h5>
                    </div>
                    <div class="card-body pt-3">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ $blog->title }}"
                                        class="form-control @error('title') is-invalid @enderror">

                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <div class="quill-editor-full">{{ strip_tags($blog->body) }}</div>
                                    @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                        
                                    <img width="300" src="{{ asset('storage') . '/' . $blog->image }}" class="img-fluid img-thumbnail mt-3" alt="">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <a href="{{ url('admin/blog') }}" class="btn btn-danger">
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

@section('script')
<script>
    $(document).ready(function() {
        $('form').on('submit', function() {
            var editor = $('.ql-editor');
            $(this).append(`<textarea name="body" style="display:none">`+editor.html()+`</textarea>`);
        })
    });
</script>
@endsection