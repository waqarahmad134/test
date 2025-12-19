@extends('layout.layout')

@php
$title = 'Challan List';
$subTitle = 'Manage Challans';
@endphp

@push('scripts')

@endpush

@section('content')

<div class="accordion mb-5" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Show Filters
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body mt-3">
                <form method="GET" action="{{ route('challans.index') }}">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="text" name="date_range" class="form-control" id="dateRangePicker" placeholder="Select Date Range"
                                value="{{ request('date_range') }}" autocomplete="off">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="fir_no" class="form-control" placeholder="FIR No." value="{{ request('fir_no') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="investigating_officer" class="form-control" placeholder="Investigating Officer"
                                value="{{ request('investigating_officer') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="offence" class="form-control" placeholder="Offence"
                                value="{{ request('offence') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="challan_type" class="form-select">
                                <option value="">Challan Type</option>
                                <option value="Complete" {{ request('challan_type') == 'Complete' ? 'selected' : '' }}>Complete</option>
                                <option value="Incomplete" {{ request('challan_type') == 'Incomplete' ? 'selected' : '' }}>Incomplete</option>
                                <option value="Supplementary" {{ request('challan_type') == 'Supplementary' ? 'selected' : '' }}>Supplementary
                                </option>
                                <option value="Cancellation Report" {{ request('challan_type') == 'Cancellation Report' ? 'selected' : '' }}>
                                    Cancellation Report</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 d-none">
                            <input type="date" name="date_of_fir" class="form-control" placeholder="Date of FIR"
                                value="{{ request('date_of_fir') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="accept_status" class="form-select">
                                <option value="">Status</option>
                                <option value="0" {{ request('accept_status') == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ request('accept_status') == '1' ? 'selected' : '' }}>Sent to Challan Clerk</option>
                                <option value="2" {{ request('accept_status') == '2' ? 'selected' : '' }}>Objected/Return to Police</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="accused_name" class="form-control" placeholder="Accused Name"
                                value="{{ request('accused_name') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="victim" class="form-control" placeholder="victim" value="{{ request('victim') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="accuse_status" class="form-select">
                                <option value="">Select accuse_status</option>
                                <option value="is_in_custody" {{ request('accuse_status') == 'is_in_custody' ? 'selected' : '' }}>Is in Custody</option>
                                <option value="is_on_bail" {{ request('accuse_status') == 'is_on_bail' ? 'selected' : '' }}>Is on Bail</option>
                                <option value="not_traceable" {{ request('accuse_status') == 'not_traceable' ? 'selected' : '' }}>Not Traceable</option>
                                <option value="innocent" {{ request('accuse_status') == 'innocent' ? 'selected' : '' }}>Innocent</option>
                                <option value="P.O" {{ request('accuse_status') == 'P.O' ? 'selected' : '' }}>P.O</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="juvenile" class="form-select">
                                <option value="">Select juvenile</option>
                                <option value="1" {{ request('juvenile') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ request('juvenile') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="juvenile_gender" class="form-select">
                                <option value="">Juvenile Gender</option>
                                <option value="male" {{ request('juvenile_gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ request('juvenile_gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="gbv" class="form-select">
                                <option value="">Select gbv</option>
                                <option value="1" {{ request('gbv') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ request('gbv') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="gbv_gender" class="form-select">
                                <option value="">GBV Gender</option>
                                <option value="male" {{ request('gbv_gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ request('gbv_gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="child" {{ request('gbv_gender') == 'child' ? 'selected' : '' }}>Child</option>
                            </select>
                        </div>
                        <div class="col-md-9 mb-3">
                            <div class="d-flex justify-content-end" style="column-gap: 4px;">
                                <a href="{{ route('challans.index') }}" class="btn btn-secondary" style="width:200px; float:right;">Clear Filters</a>
                                <button type="submit" class="btn btn-primary" style="width:200px; float:right;">Search Records</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="{{ route('challans.index') }}" method="GET" class="d-flex gap-2">
                <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                    <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request()->per_page == 20 ? 'selected' : '' }}>20</option>
                    <option value="30" {{ request()->per_page == 30 ? 'selected' : '' }}>30</option>
                </select>
                <div class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request()->search }}">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </div>
                <button type="button" class="btn btn-secondary clear-filter-btn" style="display: none;">Clear Filter</button>
            </form>
        </div>
        @if(strtolower(auth()->user()->role) == "police" )
        <a href="{{ route('challans.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New Challan
        </a>
        @endif
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">FIR No</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Challan Type</th>
                        <th scope="col">Police Station</th>
                        <th scope="col">Offence</th>
                        @if(strtolower(auth()->user()->role) != "court" && strtolower(auth()->user()->role) != "clerk")
                        <th scope="col">Status</th>
                        @endif
                        @if(strtolower(auth()->user()->role) == "admin" || strtolower(auth()->user()->role) == "prosecution" || strtolower(auth()->user()->role) == "clerk" )
                        <th scope="col">Update Status</th>
                        @endif
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($challans as $index => $challan)
                    @php
                    $currentStatus = $statuses->where('id', $challan->statuses->first()->status_id)->first()->name ?? null;
                    $currentStatusColor = $statuses->where('id', $challan->statuses->first()->status_id)->first()->color ?? null;
                    $currentStatusBgColor = $statuses->where('id', $challan->statuses->first()->status_id)->first()->bgcolor ?? null;
                    @endphp

                    @if(
                    (strtolower(auth()->user()->role) != "police" || !($currentStatus && strtolower($currentStatus) == "approved" || strtolower($currentStatus) == "sent to challan clerk" || strtolower($currentStatus) == "entrusted to" )) &&
                    (strtolower(auth()->user()->role) != "prosecution" || !($currentStatus && strtolower($currentStatus) == "approved" || strtolower($currentStatus) == "sent to challan clerk" || strtolower($currentStatus) == "entrusted to" )) &&
                    (strtolower(auth()->user()->role) != "court" || ($currentStatus && strtolower($currentStatus) == "entrusted to" )) &&
                    (strtolower(auth()->user()->role) != "clerk" || ($currentStatus && strtolower($currentStatus) == "sent to challan clerk"))
                    )
                    <tr>
                        <td>CTS-{{ $index + 1 }}</td>
                        <td>{{ $challan->fir_no }}/{{ \Carbon\Carbon::parse($challan->updated_at)->format('y') }}
                        </td>
                        <td>{{ $challan->case_type }}</td>
                        <td>{{ $challan->challan_type }}</td>
                        <td>{{ $challan->user->name ?? "" }}</td>
                        <td>{{ $challan->fir->offence ?? "" }}</td>
                        @if(strtolower(auth()->user()->role) != "court" && strtolower(auth()->user()->role) != "clerk")
                        <td><span style="color:{{$currentStatusColor ?? black}};background: {{ $currentStatusBgColor ?? red}}; padding:2px 12px; border-radius:5px;">
                                @if($currentStatus === 'Entrusted To')
                                {{ $challan->assignedToUser->name ?? 'No Assignee' }}
                                @else
                                {{ $currentStatus ?? 'No Status' }}
                                @endif
                            </span>
                        </td>
                        @endif
                        @if(strtolower(auth()->user()->role) == "admin" || strtolower(auth()->user()->role) == "prosecution" || strtolower(auth()->user()->role) == "clerk" )
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateStatus"
                                onclick="openRemarksModal({{ $challan }}, {{ json_encode($statuses) }}, {{json_encode($courts) }})">
                                Update Status
                            </button>
                        </td>
                        @else
                        @if(strtolower(auth()->user()->role) == "admin" || strtolower(auth()->user()->role) == "prosecution")
                        <td></td>
                        @endif

                        @endif
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <button type="button" onclick="viewChallan({{ json_encode($challan) }})"
                                    class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#viewChallan">
                                    <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                </button>
                                @if(strtolower(auth()->user()->role) == "admin" || strtolower(auth()->user()->role) == "police")
                                <a href="{{ route('challans.edit', $challan->id) }}" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                </a>
                                @endif
                                @if(strtolower(auth()->user()->role) == "admin")
                                <form action="{{ route('challans.delete', $challan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24 w-100">
            <nav aria-label="Page navigation example" style="width: 100%;">
                <ul class="pagination justify-content-center mb-0">
                    {{ $challans->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
</div>


<div class="modal fade" id="viewChallan" tabindex="-1" aria-labelledby="viewChallanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewChallanModalLabel">Challan Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <p><strong>FIR No:</strong> <span id="fir-no"></span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Case Type:</strong> <span id="case-type"></span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Challan Type:</strong> <span id="challan-type"></span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Police Station:</strong> <span>{{ $challan->user->name ?? ""}}</span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Investigating Officer:</strong> <span id="investigating-officer"></span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Offence:</strong> <span id="offence"></span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Assigned Court:</strong> <span>{{$challan->assignedToUser->name ?? ""}}</span></p>
                    </div>
                    <div class="col-4">
                        <p><strong>Assigned Court Date:</strong> <span>{{$challan->updated_at ?? ""}}</span></p>
                    </div>
                    <div class="col-4">
                        <div>
                            <strong>View FIR:</strong>
                            <a id="fir-pdf" href="" target="_blank" class="btn btn-primary">View FIR</a>
                        </div>
                    </div>
                    <!-- <div class="col-4">
                        <div>
                            <strong>Downlaod Fir PDF:</strong>
                            <button id="embed-btn" class="btn btn-secondary">Embed PDF</button>
                        </div>
                    </div>
                    <div id="embed-container">
                        <embed id="fir-pdf-embed" src="" width="100%" height="600px" />
                    </div> -->
                </div>
                <h6 class="mt-4">Accuse Information</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Accused Name</th>
                            <th>Father's Name</th>
                            <th>Accused Status</th>
                            <th>Juvenile</th>
                            <th>GBV</th>
                            <th>Juvenile Gender</th>
                            <th>GBV Gender</th>
                        </tr>
                    </thead>
                    <tbody id="meta-list">
                    </tbody>
                </table>
                <h6 class="mt-4">Victims</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Victim</th>
                        </tr>
                    </thead>
                    <tbody id="victims-list">
                    </tbody>
                </table>
                <h6>Remarks Meta</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Approve ID</th>
                            <th>Remarks Code</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody id="remarks-meta-list">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="updateStatus" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Challan Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('challans.updateStatus') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="challan_id" id="challan_id">
                    <div class="mb-3">
                        <label for="status_id" class="form-label">Select Action / Entrusted To:</label>
                        <select name="status_id" id="status_id" class="form-select" required>
                            <option value="">-- Select Action --</option>
                        </select>
                    </div>
                    <div id="court_select" class="mb-3">
                        <label for="court_id" class="form-label">Select Court</label>
                        <select name="court_id" id="court_id" class="form-select">
                            <option value="">-- Select Action --</option>
                        </select>
                    </div>
                    <div id="remarks_no" class="mb-3">
                        <label for="remarks_code" class="form-label">Road No</label>
                        <input type="text" name="remarks_code" id="remarks_code" class="form-control">
                    </div>
                    <div id="remarks" class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#dateRangePicker", {
            mode: "range",
            dateFormat: "Y-m-d",
            allowInput: true,
            locale: {
                rangeSeparator: " to "
            }
        });
    });

    function openRemarksModal(challan, statuses, courts) {
        console.log("🚀 ~ openRemarksModal ~ courts:", courts)
        const userRole = "{{ auth()->user()->role }}";
        const previousStatusId = challan.statuses[0].status_id;
        document.getElementById('challan_id').value = challan.id;

        const statusSelect = document.getElementById('status_id');
        statusSelect.innerHTML = '<option value="">-- Select Action --</option>';

        if (userRole == "prosecution") {
            statuses.forEach(status => {
                if (status.id !== previousStatusId && status.id !== 1 && status.id !== 4 && status.id !== 5 && status.id !== 6) {
                    statusSelect.innerHTML += `<option value="${status.id}">${status.name}</option>`;
                }
            });
        } else if (userRole == "clerk") {
            statuses.forEach(status => {
                if (status.id !== previousStatusId && status.id !== 1 && status.id !== 2 && status.id !== 3 && status.id !== 4 && status.id !== 6) {
                    statusSelect.innerHTML += `<option value="${status.id}">${status.name}</option>`;
                }
            });
        } else {
            statuses.forEach(status => {
                statusSelect.innerHTML += `<option value="${status.id}">${status.name}</option>`;
            });
        }

        const court_id = document.getElementById('court_id');
        court_id.innerHTML = '<option value="">-- Select Action --</option>';
        courts.forEach(court => {
            court_id.innerHTML += `<option value="${court.id}">${court.name}</option>`;
        });
    }

    const court_select = document.getElementById('court_select');
    const court_id = document.getElementById('court_id');
    const statusSelect = document.getElementById('status_id');
    const remarksNoField = document.getElementById('remarks_no');
    const remarksField = document.getElementById('remarks');
    const remarksCodeInput = document.getElementById('remarks_code');
    const remarksTextarea = document.getElementById('remarks');

    statusSelect.addEventListener('change', function() {
        const selectedValue = this.value;

        if (selectedValue === "3") {
            remarksNoField.style.display = 'none';
            remarksField.style.display = 'block';

            remarksCodeInput.removeAttribute('required');
            remarksTextarea.setAttribute('required', true);
        } else if (selectedValue === "2") {
            remarksNoField.style.display = 'block';
            remarksField.style.display = 'block';

            remarksCodeInput.setAttribute('required', true);
            remarksTextarea.setAttribute('required', true);
        } else if (selectedValue === "5") {
            court_select.style.display = 'block';
            court_id.setAttribute('required', true);
        } else {
            remarksNoField.style.display = 'none';
            remarksField.style.display = 'none';
            court_select.style.display = 'none';

            remarksCodeInput.removeAttribute('required');
            remarksTextarea.removeAttribute('required');
        }
    });
    statusSelect.dispatchEvent(new Event('change'));


    function viewChallan(challan) {
        console.log("🚀 ~ viewChallan ~ challan:", challan)

        document.getElementById('fir-pdf').href = "{{ url('') }}/public/" + challan.fir.pdf;
        // document.getElementById('embed-btn').addEventListener('click', function() {
        //     document.getElementById('fir-pdf-embed').src = "{{ url('') }}/public/" + challan.fir.pdf;
        // });
        document.getElementById('fir-no').innerText = challan.fir_no + '/' + new Date(challan.created_at).getFullYear().toString().slice(-2);

        document.getElementById('case-type').innerText = challan.case_type;
        document.getElementById('challan-type').innerText = challan.challan_type;
        document.getElementById('investigating-officer').innerText = challan.investigating_officer;
        document.getElementById('offence').innerText = challan.fir.offence;
        let victimsList = document.getElementById('victims-list');

        victimsList.innerHTML = '';
        if (challan.victims && challan.victims.length > 0) {
            challan.victims.forEach(victim => {
                let row = document.createElement('tr');
                row.innerHTML = `
                <td>${victim.id || 'N/A'}</td>
                <td>${victim.victim || 'N/A'}</td>
            `;
                victimsList.appendChild(row);
            });
        } else {
            let row = document.createElement('tr');
            row.innerHTML = '<td colspan="4" class="text-center">No victims data available</td>';
            victimsList.appendChild(row);
        }

        let metaList = document.getElementById('meta-list');
        metaList.innerHTML = '';

        if (challan.fir.meta && challan.fir.meta.length > 0) {
            challan.fir.meta.forEach(meta => {
                let row = document.createElement('tr');
                row.innerHTML = `
                <td>${meta.accused_name || 'No Data'}</td>
                <td>${meta.father_name || 'No Data'}</td>
                <td>${meta.accuse_status || 'No Data'}</td>
                <td>${meta.juvenile === 1 ? "Yes" : "No" || 'No Data'}</td>
                <td>${meta.gbv === 1 ? "Yes" : "No" || 'No Data'}</td>
                <td>${meta.juvenile_gender || 'No Data'}</td>
                <td>${meta.gbv_gender || 'No Data'}</td>
            `;
                metaList.appendChild(row);
            });
        } else {
            let row = document.createElement('tr');
            row.innerHTML = '<td colspan="7" class="text-center">No meta data available</td>';
            metaList.appendChild(row);
        }

        let remarksMetaList = document.getElementById('remarks-meta-list');
        remarksMetaList.innerHTML = '';
        if (challan.remarks_meta && challan.remarks_meta.length > 0) {
            challan.remarks_meta.forEach(remark => {
                let row = document.createElement('tr');
                row.innerHTML = `
                        <td>${remark.id || 'N/A'}</td>
                        <td>${remark.approveid || 'N/A'}</td>
                        <td>${remark.remarks_code || 'N/A'}</td>
                        <td>${remark.remarks || 'N/A'}</td>
                    `;
                remarksMetaList.appendChild(row);
            });
        } else {
            let row = document.createElement('tr');
            row.innerHTML = '<td colspan="8" class="text-center">No remarks meta data available</td>';
            remarksMetaList.appendChild(row);
        }
    }
</script>
@endpush


@endsection