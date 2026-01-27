@extends('backend.layouts.master')
@section('title', 'Form Responses. ' . $response['data']['title'])
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
                <h6>{{ $response['data']['title'] }}</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('manage-lead.forms.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i>
                Back to Forms List
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                @include('backend.pages.manage-lead.form-response.partials.response-list', ['responses' => $response, 'formId' => $formId])
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush