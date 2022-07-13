@extends('admin.app')

@section('content')
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Setting & Information</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <form autocomplete="off" action="{{ route('setting.update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 p-0">Form User</h5>
                    </div>
                    <div class="card-body pt-3">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="APP_NAME" class="form-label">APP NAME</label>
                                    <input type="text" name="APP_NAME" value="{{ $settings['APP_NAME'] }}"
                                        class="form-control @error('APP_NAME') is-invalid @enderror">

                                    @error('APP_NAME')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="LOGO" class="form-label">LOGO</label>
                                    <input type="file" name="LOGO" value="{{ $settings['LOGO'] }}"
                                        class="form-control @error('LOGO') is-invalid @enderror">

                                    <img width="100" src="{{ asset('storage') . '/' . $settings['LOGO'] }}"
                                        class="mt-3 img-fluid img-thumbnail" alt="LOGO">
                                    @error('LOGO')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="PAVICON" class="form-label">PAVICON</label>
                                    <input type="file" name="PAVICON" value="{{ $settings['PAVICON'] }}"
                                        class="form-control @error('PAVICON') is-invalid @enderror">

                                    <img width="50" src="{{ asset('storage') . '/' . $settings['PAVICON'] }}"
                                        class="mt-3 img-fluid img-thumbnail" alt="PAVICON">
                                    @error('PAVICON')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ABOUT" class="form-label">ABOUT</label>

                                    <div class="quill-editor-full" id="ABOUT">{!! $settings['ABOUT'] !!}</div>

                                    @error('ABOUT')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="STRUCTURAL" class="form-label">STRUCTURAL</label>
                                    <input type="file" name="STRUCTURAL" value="{{ $settings['STRUCTURAL'] }}"
                                        class="form-control @error('STRUCTURAL') is-invalid @enderror">

                                    <img width="250" src="{{ asset('storage') . '/' . $settings['STRUCTURAL'] }}"
                                        class="mt-3 img-fluid img-thumbnail" alt="STRUCTURAL">
                                    @error('STRUCTURAL')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="PHONE" class="form-label">PHONE</label>
                                    <input type="text" name="PHONE" value="{{ $settings['PHONE'] }}"
                                        class="form-control @error('PHONE') is-invalid @enderror">

                                    @error('PHONE')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="EMAIL" class="form-label">EMAIL</label>
                                    <input type="text" name="EMAIL" value="{{ $settings['EMAIL'] }}"
                                        class="form-control @error('EMAIL') is-invalid @enderror">

                                    @error('EMAIL')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ADDRESS" class="form-label">ADDRESS</label>

                                    <textarea name="ADDRESS" cols="10" rows="3"
                                        class="form-control @error('ADDRESS') is-invalid @enderror">{{ $settings['ADDRESS'] }}</textarea>

                                    @error('ADDRESS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="MAPS" class="form-label">MAPS</label>
                                    <input type="text" name="MAPS" value="{{ $settings['MAPS'] }}"
                                        class="form-control @error('MAPS') is-invalid @enderror">

                                    @error('MAPS')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="FB" class="form-label">FB</label>
                                    <input type="text" name="FB" value="{{ $settings['FB'] }}"
                                        class="form-control @error('FB') is-invalid @enderror">

                                    @error('FB')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="IG" class="form-label">IG</label>
                                    <input type="text" name="IG" value="{{ $settings['IG'] }}"
                                        class="form-control @error('IG') is-invalid @enderror">

                                    @error('IG')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="TW" class="form-label">TW</label>
                                    <input type="text" name="TW" value="{{ $settings['TW'] }}"
                                        class="form-control @error('TW') is-invalid @enderror">

                                    @error('TW')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Update
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
            var about = $('#ABOUT .ql-editor');
            $(this).append(`<textarea name="ABOUT" style="display:none">`+about.html()+`</textarea>`);
        })
    });
</script>
@endsection