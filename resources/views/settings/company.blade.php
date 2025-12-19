@extends('layout.layout')

@php
$title = 'Profile Settings';
$subTitle = 'Settings';
@endphp

@section('content')

<div class="card h-100 p-0 radius-12 overflow-hidden">
    <div class="card-body p-40">
        <form id="profileForm" name="profileForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                        <input type="text" class="form-control radius-8" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Enter Full Name" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                        <input type="email" class="form-control radius-8" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter email address" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="phone" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone Number</label>
                        <input type="text" class="form-control radius-8" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="Enter phone number">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="role" class="form-label fw-semibold text-primary-light text-sm mb-8">Role</label>
                        <input type="text" class="form-control radius-8" id="role" value="{{ $user->roles->pluck('name')->first() ?? ($user->role ?? 'N/A') }}" placeholder="Role" disabled>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mb-20">
                        <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8">Address</label>
                        <input type="text" class="form-control radius-8" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" placeholder="Enter Your Address">
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                    <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8" id="saveProfileBtn">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Password Change Section -->
<div class="card h-100 p-0 radius-12 overflow-hidden mt-24">
    <div class="card-header border-bottom bg-base py-16 px-24">
        <h5 class="mb-0">Change Password</h5>
    </div>
    <div class="card-body p-40">
        <form id="passwordForm" name="passwordForm" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-20">
                        <label for="current_password" class="form-label fw-semibold text-primary-light text-sm mb-8">Current Password <span class="text-danger-600">*</span></label>
                        <input type="password" class="form-control radius-8" id="current_password" name="current_password" placeholder="Enter current password" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="new_password" class="form-label fw-semibold text-primary-light text-sm mb-8">New Password <span class="text-danger-600">*</span></label>
                        <input type="password" class="form-control radius-8" id="new_password" name="new_password" placeholder="Enter new password" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="new_password_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">Confirm New Password <span class="text-danger-600">*</span></label>
                        <input type="password" class="form-control radius-8" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm new password" required>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8" id="savePasswordBtn">
                        Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Setup AJAX for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Profile Form Submit
        $('#profileForm').on('submit', function(e) {
            e.preventDefault();
            
            if (!this.checkValidity()) {
                $(this).addClass('was-validated');
                return false;
            }
            
            $('#saveProfileBtn').html('Saving...').prop('disabled', true);

            $.ajax({
                url: "{{ route('settings.updateProfile') }}",
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#saveProfileBtn').html('Save Changes').prop('disabled', false);
                    alert('Profile updated successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    $('#saveProfileBtn').html('Save Changes').prop('disabled', false);
                    var errors = xhr.responseJSON?.errors || {};
                    var errorMsg = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                    
                    if (Object.keys(errors).length > 0) {
                        var errorText = Object.values(errors).flat().join('\n');
                        alert(errorText);
                    } else {
                        alert(errorMsg);
                    }
                }
            });
        });

        // Password Form Submit
        $('#passwordForm').on('submit', function(e) {
            e.preventDefault();
            
            if (!this.checkValidity()) {
                $(this).addClass('was-validated');
                return false;
            }
            
            $('#savePasswordBtn').html('Updating...').prop('disabled', true);

            $.ajax({
                url: "{{ route('settings.updatePassword') }}",
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#savePasswordBtn').html('Update Password').prop('disabled', false);
                    alert('Password updated successfully!');
                    $('#passwordForm')[0].reset();
                    $('#passwordForm').removeClass('was-validated');
                },
                error: function(xhr) {
                    $('#savePasswordBtn').html('Update Password').prop('disabled', false);
                    var errors = xhr.responseJSON?.errors || {};
                    var errorMsg = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                    
                    if (Object.keys(errors).length > 0) {
                        var errorText = Object.values(errors).flat().join('\n');
                        alert(errorText);
                    } else {
                        alert(errorMsg);
                    }
                }
            });
        });
    });
</script>
@endpush

@endsection