@extends('layout.layout')

@php
$title = 'FIR Challan';
$subTitle = 'FIR Edit Form';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Edit FIR</h6>
            </div>
            @if(session('error'))
            <div class="alert alert-primary" role="alert" id="success-alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="card-body">
                <form action="{{ route('firs.update', $fir->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Using PUT for update -->
                    <div class="row gy-3">
                        <!-- FIR Number -->
                        <div class="col-4">
                            <label for="fir_no" class="form-label">FIR Number</label>
                            <input type="text" name="fir_no" id="fir_no" class="form-control" value="{{ old('fir_no', $fir->fir_no) }}" required readonly>
                            @error('fir_no')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="fir_date" class="form-label">Date of FIR</label>
                            <input type="date" name="fir_date" id="fir_date" class="form-control" value="{{ old('fir_date', $fir->fir_date) }}" required>
                            @error('fir_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
    <label for="position" class="form-label">Position</label>
    <select name="position" id="position" class="form-control form-select">
        <option disabled>Select:</option>
        <option value="under investigation" 
                {{ old('position', $fir->position) == 'under investigation' ? 'selected' : '' }}>
            Under Investigation
        </option>
        <option value="interim report" 
                {{ old('position', $fir->position) == 'interim report' ? 'selected' : '' }}>
            Interim Report
        </option>
        <option value="untraced / unknown" 
                {{ old('position', $fir->position) == 'untraced / unknown' ? 'selected' : '' }}>
            Untraced / Unknown
        </option>
        <option value="cancellation" 
                {{ old('position', $fir->position) == 'cancellation' ? 'selected' : '' }}>
            Cancellation
        </option>
        <option value="incomplete" 
                {{ old('position', $fir->position) == 'incomplete' ? 'selected' : '' }}>
            Incomplete
        </option>
        <option value="p.o 512 report" 
                {{ old('position', $fir->position) == 'p.o 512 report' ? 'selected' : '' }}>
            P.O 512 Report
        </option>
    </select>
    @error('position')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

                        <div class="col-6">
                            <label for="offence" class="form-label">Offence</label>
                            <input type="text" name="offence" id="offence" class="form-control" value="{{ old('offence', $fir->offence) }}">
                            @error('offence')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      

                     

                    
                    </div>

                   

                    <!-- Accused Section -->
                    <div class="col-12">
                        <label class="form-label">Accused</label>
                        <div id="accused-container">
                            @foreach($fir->meta as $index => $accused)
                            <div class="accused-group mb-3 border p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="accused_name_{{ $index }}" class="form-label">Accused Name</label>
                                        <input type="text" name="accused[{{ $index }}][accused_name]" id="accused_name_{{ $index }}" class="form-control" value="{{ $accused['accused_name'] }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="father_name_{{ $index }}" class="form-label">Father's Name</label>
                                        <input type="text" name="accused[{{ $index }}][father_name]" id="father_name_{{ $index }}" class="form-control" value="{{ $accused['father_name'] }}" required>
                                    </div>
                                    <div class="row">
                                        <!-- Accuse Status -->
                                        <div class="col-6">
                                            <label class="form-label">Accuse Status</label>
                                            @php $statuses = ['In Custody', 'On Bail', 'Not Traceable', 'Innocent', 'P.O']; @endphp
                                            @foreach($statuses as $status)
                                            <div class="form-check">
                                                <input type="radio" name="accused[{{ $index }}][accuse_status]" value="{{ $status }}" class="form-check-input" id="accuse_status_{{ $status }}_{{ $index }}" {{ $accused['accuse_status'] == $status ? 'checked' : '' }}>
                                                <label for="accuse_status_{{ $status }}_{{ $index }}" class="form-check-label">{{ $status }}</label>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- Juvenile / GBV -->
                                        <div class="col-6">
                                            <label class="form-label">Juvenile / GBV</label>
                                            <div class="form-check">
                                                <input type="checkbox" name="accused[{{ $index }}][juvenile]" id="juvenile_{{ $index }}" class="form-check-input" {{ $accused['juvenile'] ? 'checked' : '' }}>
                                                <label for="juvenile_{{ $index }}" class="form-check-label">Juvenile</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="accused[{{ $index }}][gbv]" id="gbv_{{ $index }}" class="form-check-input" {{ $accused['gbv'] ? 'checked' : '' }}>
                                                <label for="gbv_{{ $index }}" class="form-check-label">GBV</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Juvenile Gender -->
                                        <div class="col-6 juvenile-gender" style="{{ $accused['juvenile'] ? '' : 'display: none;' }}">
                                            <label class="form-label">Juvenile Gender</label>
                                            @php $juvenileGenders = ['Male', 'Female']; @endphp
                                            @foreach($juvenileGenders as $gender)
                                            <div class="form-check">
                                                <input type="radio" name="accused[{{ $index }}][juvenile_gender]" value="{{ $gender }}" class="form-check-input" id="juvenile_gender_{{ $gender }}_{{ $index }}" {{ $accused['juvenile_gender'] == $gender ? 'checked' : '' }}>
                                                <label for="juvenile_gender_{{ $gender }}_{{ $index }}" class="form-check-label">{{ $gender }}</label>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- GBV Gender -->
                                        <div class="col-6 gbv-gender" style="{{ $accused['gbv'] ? '' : 'display: none;' }}">
                                            <label class="form-label">GBV Gender</label>
                                            @php $gbvGenders = ['Male', 'Female', 'Child']; @endphp
                                            @foreach($gbvGenders as $gender)
                                            <div class="form-check">
                                                <input type="radio" name="accused[{{ $index }}][gbv_gender]" value="{{ $gender }}" class="form-check-input" id="gbv_gender_{{ $gender }}_{{ $index }}" {{ $accused['gbv_gender'] == $gender ? 'checked' : '' }}>
                                                <label for="gbv_gender_{{ $gender }}_{{ $index }}" class="form-check-label">{{ $gender }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-sm btn-success mt-2" id="add-accused">Add Accused</button>
                        </div> 

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update FIR</button>
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

       
    });
</script>
@endpush