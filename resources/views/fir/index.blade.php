@extends('layout.layout')

@php
$title = 'FIR List';
$subTitle = 'Manage FIR';
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

        $("#addNewFirBtn").on("click", function() {
            $("#addFirModal").modal("show");
        });
    });
</script>
@endpush

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="{{ route('firs.index') }}" method="GET" class="d-flex gap-2">
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
        <a href="{{ route('firs.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New FIR
        </a>
        <!-- <button id="addNewFirBtn" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New FIR
        </button> -->
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">FIR No.</th>
                        <th scope="col">User</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($firs as $index => $fir)
                    <tr>
                        <td>CTS-{{ $index + 1 }}</td>
                        <td>{{ $fir->fir_no }}</td>
                        <td>{{ $fir->user->name }}</td>
                        <td>
                            @if($fir->status == 'active')
                                    Active
                            @else
                                    Inactive
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <!-- <button type="button" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#editFirModal"
                                    data-id="{{ $fir->id }}" data-fir_no="{{ $fir->fir_no }}" data-user="{{ $fir->user->name }}"
                                    data-status="{{ $fir->status }}">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </button> -->
                                <a href="{{ route('firs.edit', $fir->id) }}" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </a>
                                <form action="{{ route('firs.destroy', $fir->id) }}" method="POST">
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
                    {{ $firs->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Add New FIR Modal -->
<div class="modal fade" id="addFirModal" tabindex="-1" aria-labelledby="addFirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('firs.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFirModalLabel">Add New FIR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fir_no" class="form-label">FIR No.</label>
                        <input type="text" class="form-control" id="fir_no" name="fir_no" required>
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
                    <button type="submit" class="btn btn-primary">Add FIR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit FIR Modal -->
<div class="modal fade" id="editFirModal" tabindex="-1" aria-labelledby="editFirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFirModalLabel">Edit FIR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('firs.update', 'fir_id') }}" method="POST" id="editFirForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- FIR No. -->
                    <div class="mb-3">
                        <label for="fir_no" class="form-label">FIR No.</label>
                        <input type="text" class="form-control" id="fir_no" name="fir_no" required>
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
    // Populate the Edit FIR modal with the selected FIR's data
    $('#editFirModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var firId = button.data('id'); // Get the FIR ID from data attribute
        var firNo = button.data('fir_no'); // Get FIR No. from data attribute
        var status = button.data('status'); // Get status from data attribute

        // Set the values in the form fields
        var modal = $(this);
        modal.find('#fir_no').val(firNo);
        modal.find('#status').val(status);

        // Update the form action to the correct route for this FIR
        var formAction = "{{ route('firs.update', ':id') }}".replace(':id', firId);
        modal.find('#editFirForm').attr('action', formAction);
    });
</script>
@endpush


@endsection