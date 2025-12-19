@extends('layout.layout')

@php
$title = 'Police Stations List';
$subTitle = 'Manage Police Stations';
@endphp

@section('content')

<style>
body.modal-open {
  overflow: hidden !important;
}

@media only screen and (min-width: 760px) {
  table {
    display: table !important;
  }
}

.dtable-container {
  max-width: 100% !important;

  table {
    white-space: nowrap !important;
    width: 100% !important;
    border-collapse: collapse !important;
  }
}
</style>

<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h5 class="title-5 mb-4">Police Stations Management</h5>
      </div>
    </div>
  </div>
</div>

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="{{ route('police_stations.index') }}" method="GET" class="d-flex gap-2">
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
        <div class="d-flex gap-2">
            <a href="{{ route('police_stations.create') }}" class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Add New Police Station
            </a>
        </div>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Police Station Name</th>
                        <th scope="col">District</th>
                        <th scope="col">Tehsil</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($policeStations as $index => $station)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $station->name }}</td>
                        <td>{{ $station->district->name }}</td>
                        <td>{{ $station->tehsil->name }}</td>
                        <td class="text-center">
                            @if($station->status == 'active')
                            <form action="{{ route('police_stations.toggleStatus', $station->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POST')
                                <button type="submit">
                                    <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('police_stations.toggleStatus', $station->id) }}" method="POST" class="d-inline">
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
                                <a href="{{ route('police_stations.edit', $station->id) }}" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </a>
                                <form action="{{ route('police_stations.destroy', $station->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No police stations found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24 w-100">
            @if(method_exists($policeStations, 'links'))
            <nav aria-label="Page navigation example w-100" style="width: 100%;">
                <ul class="pagination justify-content-center mb-0">
                    {{ $policeStations->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
            @else
            <p class="text-sm text-secondary-light mb-0">
                Showing {{ $policeStations->count() }} of {{ $policeStations->count() }} entries
            </p>
            @endif
        </div>
    </div>
</div>

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

@endsection
