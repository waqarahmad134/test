@extends('layout.layout')

@php
$title = 'Add Challan';
$subTitle = 'Challan Input Form';
@endphp

@section('content')

<style>
    .selection {
        display: block !important;
    }

    .select2-container .select2-selection--single {
        height: 2.75rem !important;
        display: flex !important;
        align-items: center;

    }

    .select2-container--default .select2-selection--single {
        border: 1px solid var(--input-form-light) !important;
    }

    .select2-selection__placeholder {
        color: var(--text-primary-light) !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px !important;
    }

    #fir-suggestions {
        z-index: 1000;
        border: 1px solid #ccc;
        background-color: #fff;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
        max-width: 333px;
    }

    #fir-suggestions .dropdown-item {
        cursor: pointer;
    }

    #fir-suggestions .dropdown-item.disabled {
        cursor: not-allowed;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Add Challan</h6>
            </div>
            @if(session('error'))
            <div class="alert alert-primary" role="alert" id="success-alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="card-body">
                <form action="{{ route('challans.store') }}" method="POST">
                    @csrf
                    <div class="row gy-3">
                        <!-- FIR Number -->
                        <div class="col-4">
                            <label for="fir_no" class="form-label">FIR Number</label>
                            <!-- <input type="text" name="fir_no" id="fir_no" class="form-control" value="{{ old('fir_no') }}" required autocomplete="off"> -->
                            <div id="fir-suggestions" class="dropdown-menu" style="display: none; position: absolute;"></div>
                            <select name="fir_no" id="fir_no" class="form-control form-select">
                                <option value="">-- Select Fir --</option>
                                @if(isset($firs) && $firs->isNotEmpty())
                                @foreach($firs as $index => $fir)
                                <option value="{{ $fir->id ?? '' }}">{{ $fir->fir_no ?? '' }}</option>
                                @endforeach
                                @endif
                            </select>

                            @error('fir_no')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="col-4">
                            <label for="date_of_fir" class="form-label">Date of FIR</label>
                            <input type="date" name="date_of_fir" id="date_of_fir" class="form-control" value="{{ old('date_of_fir') }}" required>
                            @error('date_of_fir')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="col-4">
                            <label for="case_type" class="form-label">Case Type</label>
                            <select name="case_type" id="case_type" class="form-control form-select" required>
                                <option disabled selected>Select:</option>
                                <option value="Murder">Murder</option>
                                <option value="Attempt to Murder">Attempt to Murder</option>
                                <option value="Hurt Cases">Hurt Cases</option>
                                <option value="Accident">Accident</option>
                                <option value="Robbery/Dacoity">Robbery/Dacoity</option>
                                <option value="Theft">Theft</option>
                                <option value="Abduction">Abduction</option>
                                <option value="Kidnapping">Kidnapping</option>
                                <option value="Fraud/ Forgery">Fraud/ Forgery</option>
                                <option value="Rape/ Fornication">Rape/ Fornication</option>
                                <option value="Other PPC Offences">Other PPC Offences</option>
                                <option value="Hadood law">Hadood law</option>
                                <option value="Arm/Explosives">Arm/Explosives</option>
                                <option value="ATC">ATC</option>
                                <option value="CNSA">CNSA</option>
                                <option value="Anti-Corruption">Anti-Corruption</option>
                                <option value="Customs Act">Customs Act</option>
                                <option value="NAB">NAB</option>
                                <option value="Banking offences">Banking offences</option>
                                <option value="Anti-smuggling">Anti-smuggling</option>
                                <option value="Others Local/ special laws">Others Local/ special laws
                                </option>
                                <option value="CNS (ANF)">CNS (ANF)</option>
                                <option value="FIA">FIA</option>
                                <option value="Cyber Crime">Cyber Crime</option>
                                <option value="Others">Others</option>
                            </select> @error('case_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- <div class="col-12">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
                            @error('year')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <div class="col-4 case_description d-none">
                            <label for="case_desc" class="form-label">Case Description</label>
                            <textarea name="case_desc" id="case_desc" class="form-control">{{ old('case_desc') }}</textarea>
                            @error('case_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="challan_type" class="form-label">Challan Type</label>
                            <select name="challan_type" id="challan_type" class="form-control form-select" required>
                                <option disabled selected>Select:</option>
                                <option value="Complete">Complete</option>
                                <option value="Incomplete">Incomplete</option>
                                <option value="Supplementary">Supplementary</option>
                                <option value="Cancellation Report">Cancellation Report</option>
                            </select> @error('challan_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="challan_submission_date" class="form-label">Challan Submittion Date</label>
                            <input type="date" name="challan_submission_date" id="challan_submission_date" class="form-control" value="{{ old('date_of_fir') }}">
                            @error('challan_submission_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="supplementary_options" class="col-12 d-none">
                            <label class="form-label">Supplementary Options</label>
                            <div class="d-flex align-items-start flex-column flex-wrap gap-3">
                                <div class="form-check checked-primary d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="supplementary_type" id="supplementary_1" value="1st">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="supplementary_1"> 1st </label>
                                </div>
                                <div class="form-check checked-secondary d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="supplementary_type" id="supplementary_2" value="2nd">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="supplementary_2"> 2nd </label>
                                </div>
                                <div class="form-check checked-success d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="supplementary_type" id="supplementary_3" value="3rd">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="supplementary_3"> 3rd </label>
                                </div>
                                <div class="form-check checked-warning d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="supplementary_type" id="supplementary_4" value="Other">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="supplementary_4"> Other </label>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div class="col-6">
                            <label for="offence" class="form-label">Offence</label>
                            <input type="text" name="offence" id="offence" class="form-control" value="{{ old('offence') }}">

                            @error('offence')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="col-4">
                            <label for="investigating_officer" class="form-label">Investigating Officer</label>
                            <input type="text" name="investigating_officer" id="investigating_officer" class="form-control" value="{{ old('offence') }}">

                            @error('investigating_officer')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                    </div>

                    <!-- <div class="col-12">
                        <label class="form-label">Accused</label>
                        <div id="accused-container">
                        </div>
                        <button type="button" class="btn btn-sm btn-success mt-2" id="add-accused">Add Accused</button>
                    </div> -->

                    <div class="row gy-3">
                        <div class="col-12">
                            <label class="form-label">Victims</label>
                            <div id="victims-container">
                            </div>
                            <button type="button" class="btn btn-sm btn-success mt-2" id="add-victim">Add Victim</button>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Send To Prosecution</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fir_no').select2({
            placeholder: "Select FIR",
            allowClear: true
        });
    });

    // $(document).ready(function() {
    //     $('#fir_no').on('input', function() {
    //         const query = $(this).val();
    //         const baseUrl = "{{ env('APP_URL', 'http://localhost/CTS/') }}";
    //         if (query.length > 0) {
    //             $.ajax({
    //                 url: `${baseUrl}firs/getFirNumbers`,
    //                 method: 'GET',
    //                 data: {
    //                     query: query
    //                 },
    //                 success: function(data) {
    //                     console.log("data", data);
    //                     let suggestions = '';
    //                     if (data.length > 0) {
    //                         data.forEach(function(fir) {
    //                             suggestions += `<button type="button" class="dropdown-item" onclick="selectFir('${fir}')">${fir}</button>`;
    //                         });
    //                     } else {
    //                         suggestions = '<button type="button" class="dropdown-item disabled">No matches found</button>';
    //                     }

    //                     $('#fir-suggestions').html(suggestions).show();
    //                 },
    //                 error: function() {
    //                     $('#fir-suggestions').hide();
    //                 }
    //             });
    //         } else {
    //             $('#fir-suggestions').hide();
    //         }
    //     });

    //     $(document).on('click', function(e) {
    //         if (!$(e.target).closest('#fir_no, #fir-suggestions').length) {
    //             $('#fir-suggestions').hide();
    //         }
    //     });
    // });

    // function selectFir(fir) {
    //     $('#fir_no').val(fir);
    //     $('#fir-suggestions').hide();
    // }

    document.addEventListener("DOMContentLoaded", function() {
        const victimsContainer = document.getElementById("victims-container");
        const addVictimButton = document.getElementById("add-victim");
        let victimCount = 0;
        addVictimButton.addEventListener("click", function() {
            victimCount++;
            const victimGroup = document.createElement("div");
            victimGroup.classList.add("input-group", "mb-2");
            victimGroup.innerHTML = `
            <input type="text" name="victims[]" class="form-control" placeholder="Enter victim name" required>
            <button type="button" class="btn btn-danger remove-victim">Remove</button>
        `;
            victimsContainer.appendChild(victimGroup);
            victimGroup.querySelector(".remove-victim").addEventListener("click", function() {
                victimGroup.remove();
            });
        });
    });

    $('#challan_type').on('change', function() {
        const selectedValue = $(this).val();
        const supplementary_options = document.getElementById('supplementary_options');
        if (selectedValue === 'Supplementary') {
            supplementary_options.classList.remove('d-none');
            supplementary_options.classList.add('animated', 'fadeIn');
        } else {
            supplementary_options.classList.add('d-none');
            supplementary_options.classList.remove('animated', 'fadeIn');
        }
    });


    $('#case_type').on('change', function() {
        const selectedValue = $(this).val();
        const case_type = document.getElementsByClassName('case_description')[0];
        if (selectedValue == 'Theft') {
            case_type.classList.remove('d-none');
            case_type.classList.add('animated', 'fadeIn');
        } else {
            case_type.classList.add('d-none');
            case_type.classList.remove('animated', 'fadeIn');
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('challan_submission_date').value = today;
    });
</script>
@endpush