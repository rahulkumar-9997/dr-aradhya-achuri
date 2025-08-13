@extends('backend.layouts.master')
@section('title','Edit Services')
@push('styles')
<link rel="stylesheet" href="{{asset('backend/assets/plugins/summernote/summernote-bs4.min.css')}}">
@endpush
@section('main-content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold"></h4>
                <h6>
                    Edit Services
                </h6>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <a href="{{ route('manage-services.index') }}" data-title="Go Back to Previous Page" data-bs-toggle="tooltip" class="btn btn-sm btn-info" data-bs-original-title="Go Back to Previous Page">
                <i class="ti ti-arrow-left me-1"></i>
                Go Back to Previous Page
            </a>
        </div>
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
            <form action="{{ route('manage-services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="services_category_id">
                                Services Category <span class="text-danger">*</span>
                            </label>
                            <select name="services_category_id" id="services_category_id" class="form-control @error('services_category_id') is-invalid @enderror">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $service->services_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                            @error('services_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="title">
                                Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $service->title) }}" />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="short_description">
                                Short Description
                            </label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="2">{{ old('short_description', $service->short_content) }}</textarea>
                            @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="main_image">
                                Main Thumb Image
                            </label>
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" id="main_image">
                            @error('main_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($service->main_image)
                            <div class="mt-2">
                                <img src="{{ asset('upload/services/' . $service->main_image) }}" width="100" class="img-thumbnail">
                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="icon_image">
                                Icon Image
                            </label>
                            <input type="file" class="form-control @error('icon_image') is-invalid @enderror" name="icon_image" id="icon_image">
                            @error('icon_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($service->icon_image)
                            <div class="mt-2">
                                <img src="{{ asset('upload/services/' . $service->icon_image) }}" width="80" class="img-thumbnail bg-pink">
                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="details_image">
                                Details Image
                            </label>
                            <input type="file" class="form-control @error('details_image') is-invalid @enderror" name="details_image" id="details_image">
                            @error('details_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($service->details_image)
                            <div class="mt-2">
                                <img src="{{ asset('upload/services/' . $service->details_image) }}" width="100" class="img-thumbnail">
                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="breadcrumb_image">
                                Breadcrumb Image
                            </label>
                            <input type="file" class="form-control @error('breadcrumb_image') is-invalid @enderror" name="breadcrumb_image" id="breadcrumb_image">
                            @error('breadcrumb_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($service->breadcrumb_image)
                            <div class="mt-2">
                                <img src="{{ asset('upload/services/' . $service->breadcrumb_image) }}" width="100" class="img-thumbnail">
                                
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="summer-description-box mb-3">
                            <label class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea id="summernote" name="content" class="@error('content') is-invalid @enderror" hidden>{{ old('content', $service->content) }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <a href="{{ route('manage-services.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Update Service
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


@endpush