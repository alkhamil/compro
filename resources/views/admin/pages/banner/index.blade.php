@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        List Banner
                        <a href="{{ url('admin/banner/create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i> Create New
                        </a>
                    </h5>

                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $item)
                            @php
                            $i = ($banners->currentPage() - 1) * $banners->count() + $key;
                            @endphp
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>
                                    <img src="{{ asset('storage') . '/' . $item->image }}" width="100" alt="image">
                                </td>
                                <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('banner.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('banner.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"
                                        class="btn btn-sm btn-danger btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure delete this data {{ $item->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ route('banner.destroy', $item->id) }}"
                                                class="btn btn-primary">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @if ($banners->count() == 0)
                            <tr>
                                <td class="text-center" colspan="6">Data not found!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    {{ $banners->links() }}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script>
    $(document).ready(function() {
            
    });
</script>
@endsection