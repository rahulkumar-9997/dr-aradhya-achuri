@if($services->count() > 0)
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>Sub-title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Main Image</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="sortable">
            @foreach($services as $service)
            <tr data-id="{{ $service->id }}">
                <td class="sortable-handle"><i class="fas fa-arrows-alt"></i></td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->subtitle }}</td>
                <td>
                    @if($service->serviceCategory)
                        <span class="badge bg-primary">{{ $service->serviceCategory->title }}</span>
                    @else
                        <span class="badge bg-secondary">No Category</span>
                    @endif
                </td>
                <td>{!! Str::limit($service->content, 50) !!}</td>
                <td>
                    @if($service->main_image)
                        <img src="{{ asset('upload/services/' . $service->main_image) }}" alt="Service Image" width="80">
                    @endif
                </td>
                <td>
                    @if($service->icon_image)
                        <div class="">
                            <img src="{{ asset('upload/services/' . $service->icon_image) }}" alt="Service Icon" width="50" class="bg-pink" style="border-radius: 5px;">
                        </div>
                    @endif
                </td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="btn btn-sm btn-primary me-2 p-2" href="{{ route('manage-services.edit', $service->id) }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('manage-services.destroy', $service->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="Delete Service">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="my-pagination mt-3 mb-3">
        {{ $services->links('vendor.pagination.bootstrap-4') }}
    </div>  
@else
    <div class="alert alert-info">No services found.</div>
@endif