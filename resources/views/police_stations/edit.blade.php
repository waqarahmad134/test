@extends('layout.layout')

@php
$title = 'Edit Police Station';
$subTitle = 'Edit Police Station Form';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Edit Police Station</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('police_stations.update', $policeStation->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Specify that this is an update request -->

                    <div class="row gy-3">
                        <!-- Police Station Name Input -->
                        <div class="col-12">
                            <label for="name" class="form-label">Police Station Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $policeStation->name) }}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- District Input -->
                        <div class="col-12">
                            <label for="district_id" class="form-label">Select District</label>
                            <select name="district_id" id="district_id" class="form-control" required>
                                <option value="">-- Select District --</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $policeStation->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tehsil Input -->
                        <div class="col-12">
                            <label for="tehsil_id" class="form-label">Select Tehsil</label>
                            <select name="tehsil_id" id="tehsil_id" class="form-control" required>
                                <option value="">-- Select Tehsil --</option>
                                @foreach ($tehsils as $tehsil)
                                <option value="{{ $tehsil->id }}" {{ old('tehsil_id', $policeStation->tehsil_id) == $tehsil->id ? 'selected' : '' }}>
                                    {{ $tehsil->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('tehsil_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Input -->
                        <div class="col-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" {{ old('status', $policeStation->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $policeStation->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update Police Station</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const districtId = document.getElementById('district_id').value;
        if (districtId) {
            fetchTehsils(districtId);
        }

        document.getElementById('district_id').addEventListener('change', function () {
            let districtId = this.value;
            if (districtId) {
                fetchTehsils(districtId);
            } else {
                document.getElementById('tehsil_id').innerHTML = '<option value="">-- Select Tehsil --</option>';
            }
        });
        const baseUrl = `{{ env('APP_URL') }}`;
        console.log("🚀 ~ baseUrl:", baseUrl)
        function fetchTehsils(districtId) {
            fetch(`${baseUrl}/get-tehsils/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    let tehsilSelect = document.getElementById('tehsil_id');
                    tehsilSelect.innerHTML = '<option value="">-- Select Tehsil --</option>';
                    data.tehsils.forEach(tehsil => {
                        let option = document.createElement('option');
                        option.value = tehsil.id;
                        option.textContent = tehsil.name;
                        tehsilSelect.appendChild(option);
                    });
                    // Ensure the correct Tehsil is selected
                    tehsilSelect.value = '{{ old('tehsil_id', $policeStation->tehsil_id) }}';
                })
                .catch(error => {
                    console.error('Error fetching tehsils:', error);
                });
        }
    });
</script>
@endpush
