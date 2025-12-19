@extends('layout.layout')

@php
$title = 'Edit Challan';
$subTitle = 'Challan Edit Form';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">{{$challan->statuses->last()->status_id === 3 ? "Remove Objection From" : "Edit"}} Challan</h6>
            </div>
            @if(session('error'))
            <div class="alert alert-primary" role="alert" id="success-alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="card-body">
                <form action="{{ route('challans.update', $challan->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Using PUT for update -->
                    <div class="row gy-3">
                        <!-- FIR Number -->
                        <div class="col-4">
                            <label for="fir_no" class="form-label">FIR Number</label>
                            <input type="text" name="fir_no" id="fir_no" class="form-control" value="{{ old('fir_no', $challan->fir_no) }}" required readonly>
                            @error('fir_no')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of FIR -->
                        <!-- <div class="col-4">
                            <label for="date_of_fir" class="form-label">Date of FIR</label>
                            <input type="date" name="date_of_fir" id="date_of_fir" class="form-control" value="{{ old('date_of_fir', $challan->date_of_fir) }}" required>
                            @error('date_of_fir')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <!-- Case Type -->
                        <div class="col-4">
                            <label for="case_type" class="form-label">Case Type</label>
                            <select name="case_type" id="case_type" class="form-control form-select">
                                @foreach(['Murder', 'Attempt to Murder', 'Hurt Cases', 'Accident', 'Robbery/Dacoity', 'Theft', 'Abduction', 'Kidnapping', 'Fraud/ Forgery', 'Rape/ Fornication', 'Other PPC Offences', 'Hadood law', 'Arm/Explosives', 'ATC', 'CNSA', 'Anti-Corruption', 'Customs Act', 'NAB', 'Banking offences', 'Anti-smuggling', 'Others Local/ special laws', 'CNS (ANF)', 'FIA', 'Cyber Crime', 'Others'] as $case)
                                <option value="{{ $case }}" {{ $challan->case_type == $case ? 'selected' : '' }}>{{ $case }}</option>
                                @endforeach
                            </select>
                            @error('case_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Case Description (only for specific cases) -->
                        <div class="col-4 case_description {{ $challan->case_type == 'Theft' ? '' : 'd-none' }}">
                            <label for="case_desc" class="form-label">Case Description</label>
                            <textarea name="case_desc" id="case_desc" class="form-control">{{ old('case_desc', $challan->case_desc) }}</textarea>
                            @error('case_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Challan Type -->
                        <div class="col-4">
                            <label for="challan_type" class="form-label">Challan Type</label>
                            <select name="challan_type" id="challan_type" class="form-control form-select">
                                <option value="Complete" {{ $challan->challan_type == 'Complete' ? 'selected' : '' }}>Complete</option>
                                <option value="Incomplete" {{ $challan->challan_type == 'Incomplete' ? 'selected' : '' }}>Incomplete</option>
                                <option value="Supplementary" {{ $challan->challan_type == 'Supplementary' ? 'selected' : '' }}>Supplementary</option>
                                <option value="Cancellation Report" {{ $challan->challan_type == 'Cancellation Report' ? 'selected' : '' }}>Cancellation Report</option>
                            </select>
                            @error('challan_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Challan Submission Date -->
                        <div class="col-4">
                            <label for="challan_submission_date" class="form-label">Challan Submission Date</label>
                            <input type="date" name="challan_submission_date" id="challan_submission_date" class="form-control" value="{{ old('challan_submission_date', $challan->challan_submission_date) }}">
                            @error('challan_submission_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplementary Options -->
                        <div id="supplementary_options" class="col-12 {{ $challan->challan_type == 'Supplementary' ? '' : 'd-none' }}">
                            <label class="form-label">Supplementary Options</label>
                            <div class="d-flex align-items-start flex-column flex-wrap gap-3">
                                @foreach(['1st', '2nd', '3rd', 'Other'] as $index => $option)
                                <div class="form-check checked-{{ ['primary', 'secondary', 'success', 'warning'][$index] }} d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="supplementary_type" id="supplementary_{{ $index + 1 }}" value="{{ $option }}" {{ $challan->supplementary_type == $option ? 'checked' : '' }}>
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="supplementary_{{ $index + 1 }}"> {{ $option }} </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Offence -->
                        <!-- <div class="col-6">
                            <label for="offence" class="form-label">Offence</label>
                            <input type="text" name="offence" id="offence" class="form-control" value="{{ old('offence', $challan->offence) }}">
                            @error('offence')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <!-- Investigating Officer -->
                        <div class="col-6">
                            <label for="investigating_officer" class="form-label">Investigating Officer</label>
                            <input type="text" name="investigating_officer" id="investigating_officer" class="form-control" value="{{ old('investigating_officer', $challan->investigating_officer) }}">
                            @error('investigating_officer')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Victims Section -->
                    <div class="col-12">
                        <label class="form-label">Victims</label>
                        <div id="victims-container">
                            @foreach($challan->victims as $victim)
                            <div class="input-group mb-2">
                                <input type="text" name="victims[]" class="form-control" value="{{ $victim->victim }}" required>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-success mt-2" id="add-victim">Add Victim</button>
                    </div>
                    
                    <input type="text" name="statusId" id="statusId" class="form-control d-none" value="{{$challan->statuses->last()->status_id === 3 ? 4 : 1}}">

                    <!-- Accused Section -->
                    <div class="col-12">
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">{{$challan->statuses->last()->status_id === 3 ? "Remove Objection" : "Edit"}}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $("#add-victim").click(function() {
            $("#victims-container").append('<div class="input-group mb-2"><input type="text" name="victims[]" class="form-control" required><button type="button" class="btn btn-danger remove-victim">Remove</button></div>');
        });

        $(document).on('click', '.remove-victim', function() {
            $(this).closest('.input-group').remove();
        });

        $("#add-accused").click(function() {
            const index = $("#accused-container .accused-group").length;
            $("#accused-container").append(`
        <div class="accused-group mb-3 border p-3">
            <div class="row">
                <!-- Accused Name -->
                <div class="col-6">
                    <label for="accused_name_${index}" class="form-label">Accused Name</label>
                    <input type="text" name="accused[${index}][accused_name]" id="accused_name_${index}" class="form-control" required>
                </div>
                <!-- Father's Name -->
                <div class="col-6">
                    <label for="father_name_${index}" class="form-label">Father's Name</label>
                    <input type="text" name="accused[${index}][father_name]" id="father_name_${index}" class="form-control" required>
                </div>
            </div>
            
            <div class="row">
                <!-- Accuse Status -->
                <div class="col-6">
                    <label class="form-label">Accuse Status</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][accuse_status]" value="In Custody" class="form-check-input" id="accuse_status_incustody_${index}">
                        <label for="accuse_status_incustody_${index}" class="form-check-label">In Custody</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][accuse_status]" value="On Bail" class="form-check-input" id="accuse_status_onbail_${index}">
                        <label for="accuse_status_onbail_${index}" class="form-check-label">On Bail</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][accuse_status]" value="Not Traceable" class="form-check-input" id="accuse_status_nottraceable_${index}">
                        <label for="accuse_status_nottraceable_${index}" class="form-check-label">Not Traceable</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][accuse_status]" value="Innocent" class="form-check-input" id="accuse_status_innocent_${index}">
                        <label for="accuse_status_innocent_${index}" class="form-check-label">Innocent</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][accuse_status]" value="P.O" class="form-check-input" id="accuse_status_po_${index}">
                        <label for="accuse_status_po_${index}" class="form-check-label">P.O</label>
                    </div>
                </div>
                
                <!-- Juvenile / GBV -->
                <div class="col-6">
                    <label class="form-label">Juvenile / GBV</label>
                    <div class="form-check">
                        <input type="checkbox" name="accused[${index}][juvenile]" id="juvenile_${index}" class="form-check-input">
                        <label for="juvenile_${index}" class="form-check-label">Juvenile</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="accused[${index}][gbv]" id="gbv_${index}" class="form-check-input">
                        <label for="gbv_${index}" class="form-check-label">GBV</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Juvenile Gender -->
                <div class="col-6 juvenile-gender" style="display: none;">
                    <label class="form-label">Juvenile Gender</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][juvenile_gender]" value="Male" class="form-check-input" id="juvenile_gender_male_${index}">
                        <label for="juvenile_gender_male_${index}" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][juvenile_gender]" value="Female" class="form-check-input" id="juvenile_gender_female_${index}">
                        <label for="juvenile_gender_female_${index}" class="form-check-label">Female</label>
                    </div>
                </div>
                
                <!-- GBV Gender -->
                <div class="col-6 gbv-gender" style="display: none;">
                    <label class="form-label">GBV Gender</label>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][gbv_gender]" value="Male" class="form-check-input" id="gbv_gender_male_${index}">
                        <label for="gbv_gender_male_${index}" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][gbv_gender]" value="Female" class="form-check-input" id="gbv_gender_female_${index}">
                        <label for="gbv_gender_female_${index}" class="form-check-label">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="accused[${index}][gbv_gender]" value="Child" class="form-check-input" id="gbv_gender_child_${index}">
                        <label for="gbv_gender_child_${index}" class="form-check-label">Child</label>
                    </div>
                </div>
            </div>
            
            <button type="button" class="btn btn-danger remove-accused mt-2">Remove</button>
        </div>
    `);
        });


        $(document).on('click', '.remove-accused', function() {
            $(this).closest('.accused-group').remove();
        });

        // Handling supplementary fields visibility
        $("#challan_type").change(function() {
            const challanType = $(this).val();
            if (challanType === 'Supplementary') {
                $("#supplementary_options").removeClass("d-none");
            } else {
                $("#supplementary_options").addClass("d-none");
            }
        });

        if ($("#challan_type").val() === 'Supplementary') {
            $("#supplementary_options").removeClass("d-none");
        }
    });
</script>
@endpush