@extends('layout.layout')

@php
$title = 'Statuses List';
$subTitle = 'Manage Statuses';
@endphp

@push('scripts')
<script>
    $(document).ready(function() {
        if ($('input[name="search"]').val() || $('select[name="per_page"]').val()) {
            $(".clear-filter-btn").show();
        }

        $(".clear-filter-btn").on("click", function() {
            $('input[name="search"]').val('');
            $('select[name="per_page"]').val('10');
            $(this).hide();
            $(this).closest('form').submit();
        });

        $('input[name="search"], select[name="per_page"]').on('change', function() {
            $(".clear-filter-btn").show();
        });

        $("#addNewStatusBtn").on("click", function() {
            $("#addStatusModal").modal("show");
        });
    });
</script>
@endpush

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="{{ route('statuses.index') }}" method="GET" class="d-flex gap-2">
                <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                    <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request()->per_page == 20 ? 'selected' : '' }}>20</option>
                    <option value="30" {{ request()->per_page == 30 ? 'selected' : '' }}>30</option>
                </select>

                <!-- Search Input -->
                <div class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request()->search }}">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </div>

                <!-- Status Dropdown -->
                <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                    <option value="">Status</option>
                    <option value="active" {{ request()->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request()->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>


                <!-- Clear Filters Button -->
                <button type="button" class="btn btn-secondary clear-filter-btn" style="display: none;">Clear Filter</button>
            </form>
        </div>
        <button id="addNewStatusBtn" href="{{ route('statuses.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New Status
        </button>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Status Name</th>
                        <th scope="col">Color</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $index => $status)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->color }}</td>
                        <td class="text-center">
                            @if($status->status == 'active')
                            <form action="{{ route('statuses.toggleStatus', $status->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success text-white btn-sm">
                                    Active
                                </button>
                            </form>
                            @else
                            <form action="{{ route('statuses.toggleStatus', $status->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-secondary text-white btn-sm">
                                    Inactive
                                </button>
                            </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <button type="button" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#editStatusModal"
                                    data-id="{{ $status->id }}" data-name="{{ $status->name }}" data-color="{{ $status->color }}"
                                    data-status="{{ $status->status }}">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </button>
                                <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24 w-100 ">
            <nav aria-label="Page navigation example w-100" style="width: 100%;">
                <ul class="pagination justify-content-center mb-0">
                    {{ $statuses->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
</div>


<!-- Add New Status Modal -->
<div class="modal fade" id="addStatusModal" tabindex="-1" aria-labelledby="addStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('statuses.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStatusModalLabel">Add New Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Status Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control" id="color" name="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Status</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Edit Status Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStatusModalLabel">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('statuses.update', 'status_id') }}" method="POST" id="editStatusForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Status Name -->
                    <div class="mb-3">
                        <label for="status_name" class="form-label">Status Name</label>
                        <input type="text" class="form-control" id="status_name" name="name" required>
                    </div>

                    <!-- Status Color -->
                    <div class="mb-3">
                        <label for="status_color" class="form-label">Status Color</label>
                        <input type="color" class="form-control" id="status_color" name="color" required>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
<script>
    // When the Edit button is clicked, populate the modal with the status data
    $('#editStatusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var statusId = button.data('id');
        var statusName = button.data('name');
        var statusColor = button.data('color');
        var statusStatus = button.data('status');

        // Set the values in the form fields
        var modal = $(this);
        modal.find('#status_name').val(statusName);
        modal.find('#status_color').val(statusColor);
        modal.find('#status').val(statusStatus);

        // Update the form action to the correct route for this status
        var formAction = "{{ route('statuses.update', ':id') }}".replace(':id', statusId);
        modal.find('#editStatusForm').attr('action', formAction);
    });
</script>
@endpush



@endsection