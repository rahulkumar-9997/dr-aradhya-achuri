@if($response['data']['responses'] && count($response['data']['responses']) > 0)
<div id="example-2_wrapper" class="filter-box">
    <div class="d-flex flex-wrap align-items-center bg-white p-2 gap-1 client-list-filter">
        <div class="d-flex align-items-center pe-1">
            <p class="mb-0 me-2 text-dark-grey f-14">Category:</p>
            <select id="category-filter" class="form-select form-select-md">
                <option value="">All Categories</option>
                <option>Category 1</option>
                <option>Category 2</option> 
            </select>
        </div>      
    </div>
</div>
<table class="table table-striped table-bordered mb-0 mt-1">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Actions</th>
            <th>Assigned User</th>
            @php
            $firstResponse = $response['data']['responses'][0] ?? null;
            $answerKeys = $firstResponse ? array_keys($firstResponse['answers'] ?? []) : [];
            @endphp

            @foreach($answerKeys as $key)
            <th>{{ $key }}</th>
            @endforeach

            <th>Submitted At</th>
            <th>Next Follow-up</th>
            <th>Lead Status</th>
            <th>Follow Up Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response['data']['responses'] as $index => $item)
        <tr>
            <td>{{ $item['idx'] }}</td>
            <td>
                <div class="edit-delete-action gap-2">
                    <button type="button" class="btn btn-sm btn-info view-response"
                        data-response-id="{{ $item['responseId'] }}"
                        data-form-id="{{ $response['data']['id'] }}"
                        data-url="{{ route('manage-lead.follow-ups.create') }}?responseId={{ $item['responseId'] }}"
                        data-response="{{ json_encode($item['answers']) }}"
                        data-fromtitle="{{ $response['data']['title'] }}">
                        <i class="fas fa-eye"></i> View Follow-ups
                    </button>
                    <!-- <button type="button" class="btn btn-sm btn-primary edit-response"
                        data-response-id="{{ $item['responseId'] }}">
                        <i class="fas fa-edit"></i> Edit
                    </button> -->
                </div>
            </td>
            <td>
                @if($item['assignUsers'] && count($item['assignUsers']) > 0)
                @foreach($item['assignUsers'] as $user)
                    <span class="badge bg-primary">{{ $user['name'] }}</span>
                @endforeach
                @else
                <span class="text-muted">Not assigned</span>
                @endif
            </td>

            @foreach($answerKeys as $key)
            <td>{{ $item['answers'][$key] ?? '-' }}</td>
            @endforeach

            <td>
                @php
                $submittedDate = \Carbon\Carbon::parse($item['submittedAt'])->format('d M Y');
                @endphp
                {{ $submittedDate }}
            </td>

            <td>
                @if($item['nextFollowUpDate'])
                @php
                $followUpDate = \Carbon\Carbon::parse($item['nextFollowUpDate'])->format('d M Y');
                @endphp
                {{ $followUpDate }}
                @else
                <span class="text-muted">No follow-up</span>
                @endif
            </td>

            <td>
                @php
                $statusClass = '';
                switch($item['leadStatus']) {
                case 'PENDING':
                $statusClass = 'badge bg-warning';
                break;
                case 'COMPLETED':
                $statusClass = 'badge bg-success';
                break;
                case 'CANCELLED':
                $statusClass = 'badge bg-danger';
                break;
                default:
                $statusClass = 'badge bg-secondary';
                }
                @endphp
                <span class="{{ $statusClass }}">{{ $item['leadStatus'] }}</span>
            </td>
            <td>
                <span class="badge bg-info">{{ $item['followUpCount'] }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination if available -->
@if($response['data']['hasMore'])
<div class="mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if($response['data']['prevPage'])
            <li class="page-item">
                <a class="page-link" href="?page={{ $response['data']['prevPage'] }}">Previous</a>
            </li>
            @endif

            @if($response['data']['nextPage'])
            <li class="page-item">
                <a class="page-link" href="?page={{ $response['data']['nextPage'] }}">Next</a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif
@else
<div class="alert alert-info">
    No responses found for this form.
</div>
@endif