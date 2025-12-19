@extends('layout.layout')

@php
$title = 'Districts List';
$subTitle = 'Manage Districts';
@endphp

@push('scripts')
<script>
    $(document).ready(function() {
        if ($('input[name="search"]').val() || $('select[name="status"]').val() || $('select[name="per_page"]').val()) {
            $(".clear-filter-btn").show();
        }

        $(".clear-filter-btn").on("click", function() {
            $('input[name="search"]').val('');
            $('select[name="status"]').val('');
            $('select[name="per_page"]').val('10');
            $(this).hide();
            $(this).closest('form').submit();
        });

        $('input[name="search"], select[name="status"], select[name="per_page"]').on('change', function() {
            $(".clear-filter-btn").show();
        });
    });
</script>
@endpush

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="{{ route('districts.index') }}" method="GET" class="d-flex gap-2">
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
        <a href="{{ route('districts.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New District
        </a>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No .</th>
                        <th scope="col">District Name</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($districts as $index => $district)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $district->name }}</td>
                        <td class="text-center">
                            @if($district->status == 'active')
                            <form action="{{ route('districts.toggleStatus', $district->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit">
                                    <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('districts.toggleStatus', $district->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit">
                                    <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Inactive</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <a href="{{ route('districts.edit', $district->id) }}" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </a>
                                <form action="{{ route('districts.destroy', $district->id) }}" method="POST">
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
                    {{ $districts->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>


    </div>
</div>

@endsection