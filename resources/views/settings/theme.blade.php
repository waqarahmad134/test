@extends('layout.layout')

@php
$title = 'Theme';
$subTitle = 'Settings - Theme';
$currentThemeMode = $user->theme_mode ?? 'light';
$currentThemeColor = $user->theme_color ?? 'blue';
@endphp

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div class="card-body p-24">
            <form id="themeForm">
                @csrf
                
                <!-- Theme Mode Selection -->
                <div class="mb-32">
                    <h6 class="text-xl mb-16">Theme Mode</h6>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input class="form-check-input payment-gateway-input" name="theme_mode" type="radio" id="light" value="light" {{ $currentThemeMode === 'light' ? 'checked' : '' }} hidden>
                            <label for="light" class="payment-gateway-label border radius-8 p-16 w-100 text-center cursor-pointer">
                                <span class="d-flex align-items-center justify-content-center gap-2">
                                    <iconify-icon icon="solar:sun-bold" class="icon text-2xl"></iconify-icon>
                                    <span class="text-secondary-light text-md fw-semibold">Light Mode</span>
                                </span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-check-input payment-gateway-input" name="theme_mode" type="radio" id="dark" value="dark" {{ $currentThemeMode === 'dark' ? 'checked' : '' }} hidden>
                            <label for="dark" class="payment-gateway-label border radius-8 p-16 w-100 text-center cursor-pointer">
                                <span class="d-flex align-items-center justify-content-center gap-2">
                                    <iconify-icon icon="solar:moon-bold" class="icon text-2xl"></iconify-icon>
                                    <span class="text-secondary-light text-md fw-semibold">Dark Mode</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Theme Colors -->
                <div class="mt-32">
                    <h6 class="text-xl mb-16">Theme Colors</h6>
                    <div class="row gy-4">
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="blue" value="blue" {{ $currentThemeColor === 'blue' ? 'checked' : '' }} hidden>
                            <label for="blue" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'blue' ? 'border-primary-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-primary-600 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Blue</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-primary-100 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="magenta" value="magenta" {{ $currentThemeColor === 'magenta' ? 'checked' : '' }} hidden>
                            <label for="magenta" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'magenta' ? 'border-lilac-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-lilac-600 radius-4"></span>
                                        <span class="text-lilac-light text-md fw-semibold mt-8">Magenta</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-lilac-100 radius-4"></span>
                                        <span class="text-lilac-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="orange" value="orange" {{ $currentThemeColor === 'orange' ? 'checked' : '' }} hidden>
                            <label for="orange" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'orange' ? 'border-warning-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-warning-600 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Orange</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-warning-100 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="green" value="green" {{ $currentThemeColor === 'green' ? 'checked' : '' }} hidden>
                            <label for="green" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'green' ? 'border-success-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-success-600 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Green</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-success-100 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="red" value="red" {{ $currentThemeColor === 'red' ? 'checked' : '' }} hidden>
                            <label for="red" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'red' ? 'border-danger-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-danger-600 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Red</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-danger-100 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-xxl-2 col-md-4 col-sm-6">
                            <input class="form-check-input payment-gateway-input" name="theme_color" type="radio" id="blueDark" value="blueDark" {{ $currentThemeColor === 'blueDark' ? 'checked' : '' }} hidden>
                            <label for="blueDark" class="payment-gateway-label border radius-8 p-8 w-100 {{ $currentThemeColor === 'blueDark' ? 'border-info-600' : '' }}">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-info-600 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Blue Dark</span>
                                    </span>
                                    <span class="w-50 text-center">
                                        <span class="h-72-px w-100 bg-info-100 radius-4"></span>
                                        <span class="text-secondary-light text-md fw-semibold mt-8">Focus</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center gap-3 mt-32">
                    <button type="button" id="resetBtn" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('scripts')
<script>
$(document).ready(function() {
    // Handle form submission
    $('#themeForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            theme_mode: $('input[name="theme_mode"]:checked').val(),
            theme_color: $('input[name="theme_color"]:checked').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        
        $.ajax({
            url: '{{ route("settings.updateTheme") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    // Update localStorage and HTML attribute
                    if (formData.theme_mode) {
                        localStorage.setItem('theme', formData.theme_mode);
                        document.querySelector("html").setAttribute("data-theme", formData.theme_mode);
                    }
                    // Reload page after a short delay to apply theme changes
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = 'Validation failed:\n';
                    $.each(errors, function(key, value) {
                        errorMessage += value[0] + '\n';
                    });
                    toastr.error(errorMessage);
                } else {
                    toastr.error(xhr.responseJSON?.message || 'An error occurred');
                }
            }
        });
    });
    
    // Handle reset button
    $('#resetBtn').on('click', function() {
        // Reset to default values
        $('input[name="theme_mode"][value="light"]').prop('checked', true);
        $('input[name="theme_color"][value="blue"]').prop('checked', true);
        // Update visual selection
        $('.payment-gateway-label').removeClass('border-primary-600 border-lilac-600 border-warning-600 border-success-600 border-danger-600 border-info-600');
    });
    
    // Update border on color selection
    $('input[name="theme_color"]').on('change', function() {
        $('.payment-gateway-label').removeClass('border-primary-600 border-lilac-600 border-warning-600 border-success-600 border-danger-600 border-info-600');
        var color = $(this).val();
        var colorClass = 'border-' + (color === 'blueDark' ? 'info' : color) + '-600';
        $(this).closest('label').addClass(colorClass);
    });
});
</script>

@endpush