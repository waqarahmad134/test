@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp

<style>
    .bg-gradient-start-1 {
        background: linear-gradient(to right, #044520, #3abf73) !important;
    }
    .bg-gradient-start-2 {
        background: linear-gradient(to right, #487FFF, #9cb7d5) !important;
    }
    .bg-gradient-start-3 {
        background: linear-gradient(to right, #FF9F29, #FFD700) !important;
    }
    .bg-gradient-start-4 {
        background: linear-gradient(to right, #9b59b6, #e74c3c) !important;
    }
</style>

@section('content')

<div class="row gy-4">
    <!-- Cases Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Total Cases</p>
                        <h6 class="mb-0 text-white">{{ $total ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courts Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Total Courts</p>
                        <h6 class="mb-0 text-white">{{ $totalCourts ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:gavel-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Judges Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Total Judges</p>
                        <h6 class="mb-0 text-white">{{ $totalJudges ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Police Stations Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Police Stations</p>
                        <h6 class="mb-0 text-white">{{ $totalPS ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:shield-check-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Cases Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Monthly Cases</p>
                        <h6 class="mb-0 text-white">{{ $monthly ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:calendar-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Criminal Cases Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Criminal Cases</p>
                        <h6 class="mb-0 text-white">{{ $criminal ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:gavel-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Civil Cases Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Civil Cases</p>
                        <h6 class="mb-0 text-white">{{ $civil ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:document-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Misc Cases Card -->
    <div class="col-6 col-sm-4 col-lg-3">
        <div class="card shadow-none bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Misc Cases</p>
                        <h6 class="mb-0 text-white">{{ $misc ?? 0 }}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:folder-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="row gy-4 mt-1">
    <div class="col-12">
        <div class="card h-100 radius-8 border">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <h6 class="mb-0 fw-semibold text-lg">Recent Records</h6>
                <div class="d-flex gap-2">
                    <a href="{{ route('cases.index') }}" class="btn btn-primary btn-sm">
                        View All Cases
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Institution Type</th>
                                <th scope="col">CNIC</th>
                                <th scope="col">Party1</th>
                                <th scope="col">Party2</th>
                                <th scope="col">Institution Date</th>
                                <th scope="col">Institution No</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCases ?? [] as $index => $case)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $case->caset ?? 'N/A' }}</td>
                                    <td>{{ $case->cnic ?? 'N/A' }}</td>
                                    <td>{{ $case->p1 ?? 'N/A' }}</td>
                                    <td>{{ $case->p2 ?? 'N/A' }}</td>
                                    <td>{{ $case->i_date ? \Carbon\Carbon::parse($case->i_date)->format('Y-m-d') : 'N/A' }}</td>
                                    <td>{{ $case->i_no ?? 'N/A' }}</td>
                                    <td>{{ $case->cname($case->cat) ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ url('finalprint/'.$case->id) }}" class="btn btn-warning btn-sm" target="_blank" title="View">
                                            <iconify-icon icon="solar:eye-bold"></iconify-icon>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-24">
                                        <p class="text-secondary-light mb-0">No recent cases found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
