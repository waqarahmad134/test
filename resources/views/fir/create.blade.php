@extends('layout.layout')

@php
$title = 'Add FIR';
$subTitle = 'FIR Input Form';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Add Fir</h6>
            </div>
            @if(session('error'))
            <div class="alert alert-primary" role="alert" id="success-alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="card-body">
                <form action="{{ route('firs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">
                        <!-- FIR Number -->
                        <div class="col-4">
                            <label for="fir_no" class="form-label">FIR Number</label>
                            <input type="number" name="fir_no" id="fir_no" class="form-control" value="{{ old('fir_no') }}" required>
                            @error('fir_no')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="fir_date" class="form-label">Date of FIR</label>
                            <input type="date" name="fir_date" id="fir_date" class="form-control" value="{{ old('date_of_fir') }}" required>
                            @error('fir_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-control form-select" required>
                                <option disabled selected>Select:</option>
                                <option value="under investigation">Under Investigation</option>
                                <option value="interim report">Interim Report</option>
                                <option value="untraced / unknown">Untraced / Unknown</option>
                                <option value="cancellation">Cancellation</option>
                                <option value="incomplete">Incomplete</option>
                                <option value="p.o 512 report">P.O 512 Report</option>
                            </select> @error('position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="offence" class="form-label">Offence</label>
                            <input type="text" name="offence" id="offence" class="form-control" value="{{ old('offence') }}" required>
                            @error('offence')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="col-6">
                            <label for="pdf" class="form-label">Attach PDF</label>
                            <input type="file" name="pdf" id="pdf" class="form-control" value="{{ old('pdf') }}">

                            @error('pdf')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="col-6">
                            <label for="investigating_officer" class="form-label">Investigating Officer</label>
                            <input type="text" name="investigating_officer" id="investigating_officer" class="form-control" value="{{ old('offence') }}">

                            @error('investigating_officer')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->

                    </div>

                    <div class="col-12">
                        <label class="form-label">Accused</label>
                        <div id="accused-container">
                        </div>
                        <button type="button" class="btn btn-sm btn-success mt-2" id="add-accused">Add Accused</button>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Save FIR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const accusedContainer = document.getElementById("accused-container");
        const addAccusedButton = document.getElementById("add-accused");
        let accusedCount = 0;

        addAccusedButton.addEventListener("click", function() {
            accusedCount++;
            const accusedGroup = document.createElement("div");
            accusedGroup.classList.add("accused-group", "mb-3", "border", "p-3");

            accusedGroup.innerHTML = `
            <div class="row">
                <div class="col-6">
                    <label for="accused_name_${accusedCount}" class="form-label">Accused Name</label>
                    <input type="text" name="accused[${accusedCount}][accused_name]" id="accused_name_${accusedCount}" class="form-control" placeholder="Enter accused name" required>
                </div>
                <div class="col-6">
                    <label for="father_name_${accusedCount}" class="form-label">Father's Name</label>
                    <input type="text" name="accused[${accusedCount}][father_name]" id="father_name_${accusedCount}" class="form-control" placeholder="Enter father's name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Accuse Status</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][accuse_status]" value="In Custody" class="form-check-input" id="accuse_status_incustody_${accusedCount}">
                        <label for="accuse_status_incustody_${accusedCount}" class="form-check-label">In Custody</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][accuse_status]" value="On Bail" class="form-check-input" id="accuse_status_onbail_${accusedCount}">
                        <label for="accuse_status_onbail_${accusedCount}" class="form-check-label">On Bail</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][accuse_status]" value="Not Traceable" class="form-check-input" id="accuse_status_nottraceable_${accusedCount}">
                        <label for="accuse_status_nottraceable_${accusedCount}" class="form-check-label">Not Traceable</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][accuse_status]" value="Innocent" class="form-check-input" id="accuse_status_innocent_${accusedCount}">
                        <label for="accuse_status_innocent_${accusedCount}" class="form-check-label">Innocent</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][accuse_status]" value="P.O" class="form-check-input" id="accuse_status_po_${accusedCount}">
                        <label for="accuse_status_po_${accusedCount}" class="form-check-label">P.O</label>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">Juvenile / GBV</label>
                    <div class="form-check">
                        <input type="checkbox" name="accused[${accusedCount}][juvenile]" id="juvenile_${accusedCount}" class="form-check-input">
                        <label for="juvenile_${accusedCount}" class="form-check-label">Juvenile</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="accused[${accusedCount}][gbv]" id="gbv_${accusedCount}" class="form-check-input">
                        <label for="gbv_${accusedCount}" class="form-check-label">GBV</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 juvenile-gender" style="display: none;">
                    <label class="form-label">Juvenile Gender</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][juvenile_gender]" value="Male" class="form-check-input" id="juvenile_gender_male_${accusedCount}">
                        <label for="juvenile_gender_male_${accusedCount}" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][juvenile_gender]" value="Female" class="form-check-input" id="juvenile_gender_female_${accusedCount}">
                        <label for="juvenile_gender_female_${accusedCount}" class="form-check-label">Female</label>
                    </div>
                </div>
                <div class="col-6 gbv-gender" style="display: none;">
                    <label class="form-label">GBV Gender</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][gbv_gender]" value="Male" class="form-check-input" id="gbv_gender_male_${accusedCount}">
                        <label for="gbv_gender_male_${accusedCount}" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][gbv_gender]" value="Female" class="form-check-input" id="gbv_gender_female_${accusedCount}">
                        <label for="gbv_gender_female_${accusedCount}" class="form-check-label">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${accusedCount}][gbv_gender]" value="Child" class="form-check-input" id="gbv_gender_child_${accusedCount}">
                        <label for="gbv_gender_child_${accusedCount}" class="form-check-label">Child</label>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger remove-accused mt-2">Remove</button>
        `;
            accusedContainer.appendChild(accusedGroup);

            // Scoped handlers for juvenile and GBV toggles
            accusedGroup.querySelector(`#juvenile_${accusedCount}`).addEventListener("change", function() {
                const juvenileGenderDiv = accusedGroup.querySelector(".juvenile-gender");
                juvenileGenderDiv.style.display = this.checked ? "block" : "none";
            });

            accusedGroup.querySelector(`#gbv_${accusedCount}`).addEventListener("change", function() {
                const gbvGenderDiv = accusedGroup.querySelector(".gbv-gender");
                gbvGenderDiv.style.display = this.checked ? "block" : "none";
            });

            // Remove accused entry
            accusedGroup.querySelector(".remove-accused").addEventListener("click", function() {
                accusedGroup.remove();
            });
        });
    });
</script>
@endpush