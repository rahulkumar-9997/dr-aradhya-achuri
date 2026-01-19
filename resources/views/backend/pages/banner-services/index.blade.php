@extends('backend.layouts.master')
@section('title','Banner Services List')
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
                <h6>Manage Banner Services</h6>
            </div>
        </div>
        <div class="page-btn">
            <a href="{{ route('banner-services.create') }}" class="btn btn-primary">
                <i class="ti ti-circle-plus me-1"></i>
                Create New Banner Service
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Linked Services</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bannerServices as $bannerService)
                        <tr>
                            <td>{{ $loop->iteration + ($bannerServices->currentPage() - 1) * $bannerServices->perPage() }}
                            </td>
                            <td>{{ $bannerService->title }}</td>
                            <td>{{ $bannerService->slug }}</td>
                            <td>
                                @if($bannerService->serviceLinks->count() > 0)
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($bannerService->serviceLinks as $link)
                                    @if($link->service)
                                    <span class="badge bg-primary">{{ $link->service->title }}</span>
                                    @endif
                                    @endforeach
                                </div>
                                @else
                                <span class="text-muted">No services linked</span>
                                @endif
                            </td>
                            <td>
                                <div class="edit-delete-action gap-2 d-flex">
                                    <!-- <a href="{{ route('banner-services.show', $bannerService->id) }}"
                                        class="btn btn-info btn-sm" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a> -->
                                    <a href="{{ route('banner-services.edit', $bannerService->id) }}"
                                        class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('banner-services.destroy', $bannerService->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="Delete Banner Service">
                                            <i data-feather="trash-2" class="feather-trash-2"></i>
                                        </button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No banner services found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bannerServices->hasPages())
            <div class="d-flex justify-content-center mt-3">
                {{ $bannerServices->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
@push('scripts')
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
</script>
@endpush