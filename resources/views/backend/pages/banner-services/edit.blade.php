@extends('backend.layouts.master')
@section('title','Create Banner Service')
@push('styles')
<link rel="stylesheet" href="{{asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/tabler-icons/tabler-icons.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.bootstrap5.min.css')}}">
@endpush
@section('main-content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold"></h4>
                <h6>Create Banner Service</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('banner-services.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i>
                Back to Banner Services List
            </a>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('banner-services.update', $bannerService->id) }}" method="POST"
                enctype="multipart/form-data" id="editBannerServiceForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="title">
                                Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="banner_video_title" name="title" value="{{ old('title', $bannerService->title) }}"
                                required />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="services_multiple">
                                Select Services Multiple
                            </label>
                            <select class="select2 form-control @error('services_multiple.*') is-invalid @enderror"
                                multiple="multiple" name="services_multiple[]" id="services_multiple">
                                <option value="">Select Services Link</option>
                                @if(!empty($services))
                                @foreach($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ (old('services_multiple', $selectedServices) && in_array($service->id, old('services_multiple', $selectedServices))) ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            @error('services_multiple.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="short_description">
                                Short Description
                            </label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror"
                                id="short_description" name="short_description"
                                rows="2">{{ old('short_description', $bannerService->short_detail) }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="meta_title">Meta title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                name="meta_title" id="meta_title"
                                value="{{ old('meta_title', $bannerService->meta_title) }}" />
                            @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="meta_description">
                                Meta Description
                            </label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                id="meta_description" name="meta_description"
                                rows="2">{{ old('meta_description', $bannerService->meta_description) }}</textarea>
                            @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="summer-description-box mb-3">
                            <label class="form-label">Content</label>
                            <textarea class="ckeditor4 form-control @error('content') is-invalid @enderror"
                                name="content" id="content">{{ old('content', $bannerService->long_detail) }}</textarea>
                            @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <a href="{{ route('banner-services.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary" id="submitButton">
                                <span id="submitText">Update</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{ asset('backend/assets/ckeditor-4/ckeditor.js') }}"></script>
<script>
    document.querySelectorAll('.ckeditor4').forEach(function(el) {
        CKEDITOR.replace(el, {
            removePlugins: 'exportpdf'
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select services",
            allowClear: true
        });
        $('#editBannerServiceForm').on('submit', function() {
            var submitButton = $('#submitButton');
            var submitText = $('#submitText');
            submitButton.prop('disabled', true);
            submitText.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
        });
    });
</script>
@endpush