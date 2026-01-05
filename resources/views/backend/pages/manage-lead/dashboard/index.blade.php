@extends('backend.layouts.master')
@section('title','Lead List')
@push('styles')

@endpush
@section('main-content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold">Lead List</h4>
            </div>
        </div>
        <div class="page-btn">
             <a  href="javascript:void(0)" 
                data-ajax-lead-add-popup="true"
                data-size="lg" 
                data-title="Add new Form" 
                data-url="{{ route('form.create') }}" 
                data-bs-toggle="tooltip" 
                title="Add new Form"  
                class="btn btn-orange">
                <i class="ti ti-circle-plus me-1"></i>
                Create Form
            </a>
        </div>
    </div>

    <!-- /product list -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <div class="display-lead-list-html">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /product list -->
</div>
<!-- Modal -->
@include('backend.layouts.common-modal-form')
<!-- modal--->
@endsection
@push('scripts')
<script src="{{asset('backend/assets/js/pages/manage-lead/lead-form.js')}}" type="text/javascript"></script>
@endpush