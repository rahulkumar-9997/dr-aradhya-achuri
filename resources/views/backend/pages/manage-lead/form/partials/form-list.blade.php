@if(isset($forms) && count($forms) > 0)
@foreach ($forms as $form)
<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 mb-3">
    <div class="card h-100 bg-white rounded-xl p-6 shadow-md border border-gray-200">
        <div class="card-body p-3 d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="d-inline-flex align-items-center text-color-primary">
                    {{ $form['title'] }}
                </h4>
                <div class="dropdown">
                    <a href="#" class="action-icon border-0" data-bs-toggle="dropdown" aria-expanded="false"><i
                            data-feather="more-vertical" class="feather-user"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item" data-url="{{ route('manage-lead.form.edit', $form['id']) }}"
                                data-ajax-lead-edit-popup="true" data-size="lg" data-title="Edit Form">
                                <i data-feather="edit" class="info-img me-2"></i>Edit
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-url="{{ route('manage-lead.form.destroy', $form['id']) }}" data-name="{{ $form['title'] }}"  class="dropdown-item mb-0 delete-form-btn">
                                <i data-feather="trash-2" class="info-img me-2"></i>Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-light rounded p-1 mb-2">
                <h5>
                    <strong>Total Fields</strong> : {{ $form['_count']['fields'] }}
                </h5>
            </div>
            @if($form['adminWhatsappCampaignName'])
            <p class="mb-0">
                <strong>
                    Admin Campaign Name
                </strong>
                <span class="text-primary">{{ $form['adminWhatsappCampaignName'] }}</span>
            </p>
            @endif
            @if($form['userWhatsappCampaignName'])
            <p>
                <strong>
                    User Campaign Name
                </strong>
                <span class="text-primary">{{ $form['userWhatsappCampaignName'] }}</span>
            </p>
            @endif
            <div class="d-flex align-items-center justify-content-between mt-auto">
                <p class="mb-0">{{ date('d M Y', strtotime($form['createdAt'])) }}</p>
                <a href="javascript:void(0);" class="btn btn-sm btn-orange">View Details</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@if($pagination['pageCount'] > 1)

@php
$current = $pagination['page'];
$last = $pagination['pageCount'];
$start = max(2, $current - 2);
$end = min($last - 1, $current + 2);
@endphp

<nav>
    <ul class="pagination justify-content-end mb-0 mt-3">

        {{-- Previous --}}
        <li class="page-item {{ $pagination['prevPage'] ? '' : 'disabled' }}">
            <a class="page-link form-page-link" href="javascript:void(0)" data-page="{{ $pagination['prevPage'] }}">
                Previous
            </a>
        </li>

        {{-- First Page --}}
        <li class="page-item {{ $current == 1 ? 'active' : '' }}">
            <a class="page-link form-page-link" href="javascript:void(0)" data-page="1">
                1
            </a>
        </li>

        {{-- Left Dots --}}
        @if($start > 2)
        <li class="page-item disabled">
            <span class="page-link">…</span>
        </li>
        @endif

        {{-- Middle Pages --}}
        @for($i = $start; $i <= $end; $i++) <li class="page-item {{ $current == $i ? 'active' : '' }}">
            <a class="page-link form-page-link" href="javascript:void(0)" data-page="{{ $i }}">
                {{ $i }}
            </a>
            </li>
            @endfor

            {{-- Right Dots --}}
            @if($end < $last - 1) <li class="page-item disabled">
                <span class="page-link">…</span>
                </li>
                @endif

                {{-- Last Page --}}
                @if($last > 1)
                <li class="page-item {{ $current == $last ? 'active' : '' }}">
                    <a class="page-link form-page-link" href="javascript:void(0)" data-page="{{ $last }}">
                        {{ $last }}
                    </a>
                </li>
                @endif

                {{-- Next --}}
                <li class="page-item {{ $pagination['hasMore'] ? '' : 'disabled' }}">
                    <a class="page-link form-page-link" href="javascript:void(0)"
                        data-page="{{ $pagination['nextPage'] }}">
                        Next
                    </a>
                </li>

    </ul>
</nav>
@endif

@endif