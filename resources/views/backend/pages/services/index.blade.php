@extends('backend.layouts.master')
@section('title','Manage Services')
@push('styles')
<link rel="stylesheet" href="{{asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/tabler-icons/tabler-icons.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.bootstrap5.min.css')}}">
<style>
    .sortable-handle {
        cursor: move;
        text-align: center;
    }

    .sortable-chosen {
        background-color: #f8f9fa;
    }
</style>
@endpush
@section('main-content')
<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold"></h4>
                <h6>Manage Services</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('manage-services.create') }}" class="btn btn-primary">
                <i class="ti ti-circle-plus me-1"></i>
                Create New Services
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                @include('backend.pages.services.partials.services-list', ['services' => $services])
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="{{asset('backend/assets/plugins/sortablejs/Sortable.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();

            Swal.fire({
                title: `Are you sure you want to delete this ${name}?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
    $(document).ready(function() {
        var el = $('.sortable')[0];
        new Sortable(el, {
            handle: '.sortable-handle',
            animation: 150,
            onEnd: function(evt) {
                var order = [];
                $('.sortable tr').each(function(index) {
                    order.push($(this).data('id'));
                });
                $.ajax({
                    url: '{{ route("services.reorder") }}',
                    type: 'POST',
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let toastClass = response.success ? "bg-success" : "bg-danger";
                        Toastify({
                            text: response.message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            className: toastClass,
                            escapeMarkup: false,
                            close: true,
                        }).showToast();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        let message = "Something went wrong!";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }
                        Toastify({
                            text: message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            className: "bg-danger",
                            escapeMarkup: false,
                            close: true,
                        }).showToast();
                    }
                });
            }
        });
    });
</script>
@endpush