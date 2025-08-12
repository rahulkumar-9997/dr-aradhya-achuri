<table class="table datatable1">
    <thead class="thead-light">
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($testimonialsList) && $testimonialsList->count() > 0)
            @foreach($testimonialsList as $testimonial)
                <tr>
                    <td>{{ $testimonial->title }}</td>
                    <td>
                        @if($testimonial->image)
                            <img src="{{ asset('upload/testimonials/' . $testimonial->image) }}" width="100">
                        @else
                            -
                        @endif
                    </td>
                    
                    <td>
                        @if($testimonial->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-info">Inactive</span>
                        @endif
                    </td>
                    <td class="action-table-data">
                        <div class="edit-delete-action">
                            <a class="btn btn-sm btn-primary me-2 p-2"
                                href="javascript:;" 
                                data-title="Edit Testimonial"
                                data-size="lg"
                                data-testimonialid="{{ $testimonial->id }}"
                                data-ajax-edit-testimonial="true"
                                data-url="{{ route('manage-testimonials.edit', $testimonial->id) }}"
                                title="Edit">
                                <i data-feather="edit" class="feather-edit"></i>
                            </a>
                            <form action="{{ route('manage-testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger show_confirm" data-name="{{ $testimonial->title }}" title="Delete">
                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No testimonials found.</td>
            </tr>
        @endif
    </tbody>
</table>
