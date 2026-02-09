@extends('layout.layout')

@php
    $title = 'Create Civil/Family Case';
    $subTitle = 'Institution Management';
@endphp

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <style>
        /* CNIC Validation Styles */
        #cnic.is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 3.6 .4.4.4-.4m0 4.8-.4-.4-.4.4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            padding-right: calc(1.5em + 0.75rem);
        }

        #cnic.is-valid {
            border-color: #198754;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='m2.3 6.73.98-.98 1.4 1.4 3.1-3.1.98.98-4.08 4.08z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            padding-right: calc(1.5em + 0.75rem);
        }

        /* Image Gallery Styles */
        .image-item-wrapper {
            position: relative;
            margin-bottom: 10px;
        }

        .image-item-wrapper img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }

        .image-item-wrapper .remove-image-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            z-index: 10;
        }

        .image-item-wrapper .remove-image-btn:hover {
            background: rgba(220, 53, 69, 1);
        }

        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .camera-box {
            background: #f8f9fa;
            border-radius: 8px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-1">
                        <span class="badge bg-success me-2">Civil/Family</span>
                        Create New Institution
                    </h4>
                    <p class="text-muted mb-0">Fill in the details below to create a new Civil/Family case</p>
                </div>
                <a href="{{ route('cases.index') }}" class="btn btn-outline-secondary">
                    <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="card form-card">
        <div class="card-body p-4">
            <form id="caseForm" name="caseForm" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="caset" id="caset" value="Civil/Family Case">

                <!-- Basic Info Section -->
                <div class="section-title">
                    <h5 class="mb-0"><iconify-icon icon="mdi:information-outline" class="me-2"></iconify-icon>Basic
                        Information</h5>
                </div>

                <!-- Images Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <label><strong>Images</strong></label>
                        <div class="border rounded p-3" id="images-container" style="min-height: 150px;">
                            <div class="text-muted text-center py-3" id="no-images-message">No images added yet. Use capture
                                or upload to add images.</div>
                            <div class="row g-2" id="images-gallery"></div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#cameraModal">
                                <iconify-icon icon="mdi:camera" class="me-1"></iconify-icon>Capture Image
                            </button>
                            <label for="file-upload" class="btn btn-success mb-0" style="cursor: pointer;">
                                <iconify-icon icon="mdi:upload" class="me-1"></iconify-icon>Upload from System
                            </label>
                            <input type="file" id="file-upload" name="images[]" multiple accept="image/*"
                                style="display: none;">
                        </div>

                        <div id="hidden-images-inputs"></div>
                    </div>
                </div>

                <!-- CNIC -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cnic"><strong>Person CNIC</strong></label>
                            <input type="text" class="form-control" id="cnic" name="cnic" placeholder="XXXXX-XXXXXXX-X"
                                required>
                            <small class="form-text text-danger" id="cnic_error" style="display: none;">Please enter a valid
                                Pakistani CNIC format (XXXXX-XXXXXXX-X)</small>
                            <a href="#" onclick="sendvalue(event)" target="_blank">
                                <small class="form-text text-danger" id="check_cnic">CNIC already exists</small>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Party Names -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="p1"><strong>Party1</strong></label>
                            <input type="text" class="form-control" id="p1" name="p1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="p2"><strong>Party2</strong></label>
                            <input type="text" class="form-control" id="p2" name="p2">
                        </div>
                    </div>
                </div>

                <!-- Contact Numbers -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="m1"><strong>Party1 Contact No</strong></label>
                        <input type="text" class="form-control" id="m1" name="m1">
                    </div>
                    <div class="col-md-6">
                        <label for="m2"><strong>Party2 Contact No</strong></label>
                        <input type="text" class="form-control" id="m2" name="m2">
                    </div>
                </div>

                <!-- Institution Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="i_date"><strong>Institution Date</strong></label>
                        <input type="date" class="form-control" id="i_date" name="i_date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="i_no"><strong>Institution No</strong></label>
                        <input type="text" class="form-control" id="i_no" name="i_no">
                        <small class="form-text text-danger" id="check_fir">Case already entered 4 times</small>
                    </div>
                </div>

                <!-- Category & Subcategory -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cat"><strong>Category</strong></label>
                        <select class="form-control" id="cat" name="cat" onchange="changeCategory();">
                            <option value="">Select:</option>
                            @foreach($cats as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="subcat"><strong>Subcategory</strong></label>
                        <select class="form-control" id="subcat" name="subcat" disabled>
                            <option value="">Select:</option>
                            @foreach($subcats as $s)
                                <option value="{{$s->id}}" class="subcat-option" data-cat-id="{{$s->cat_id}}">{{$s->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Assigned To -->
                <div class="form-group mb-4">
                    <label for="judge_id"><strong>Assigned To</strong></label>
                    <select class="form-control" id="judge_id" name="judge_id">
                        <option value="">Select:</option>
                        @foreach($judges as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Court Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cno"><strong>Court Room No.</strong></label>
                        <input type="text" class="form-control" id="cno" name="cno">
                    </div>
                    <div class="col-md-6">
                        <label for="a_date"><strong>Date of Appearance</strong></label>
                        <input type="date" class="form-control" id="a_date" name="a_date" value="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('cases.index') }}" class="btn btn-secondary">
                        <iconify-icon icon="mdi:close" class="me-1"></iconify-icon>Cancel
                    </a>
                    <button type="submit" class="btn btn-success" id="saveBtn">
                        <iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save Case
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Camera Modal -->
    <div class="modal fade text-center" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title mx-auto" id="cameraModalLabel">Capture Image</h5>
                    <button type="button" class="btn-close position-absolute" style="right: 15px;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pt-0">
                    <div class="camera-box my-3 p-2 border rounded bg-light">
                        <div id="my_camera" class="w-100 rounded"
                            style="max-width: 100%; height: auto; aspect-ratio: 4 / 3; overflow: hidden;"></div>
                    </div>
                    <input type="hidden" name="image" class="image-tag">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary px-4" onclick="take_snapshot()"
                            data-bs-dismiss="modal">
                            <iconify-icon icon="mdi:camera" class="me-1"></iconify-icon>Take Snapshot
                        </button>
                    </div>
                </div>
                <div class="modal-footer border-0"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

        <script>
            // Image handling arrays
            let capturedImages = [];
            let uploadedImages = [];

            function initializeImages() {
                capturedImages = [];
                uploadedImages = [];
                updateImagesDisplay();
            }

            function updateImagesDisplay() {
                const gallery = $('#images-gallery');
                const noImagesMsg = $('#no-images-message');

                gallery.empty();

                const totalImages = capturedImages.length + uploadedImages.length;

                if (totalImages === 0) {
                    noImagesMsg.show();
                } else {
                    noImagesMsg.hide();

                    // Display captured images
                    capturedImages.forEach((imgData, index) => {
                        const col = $('<div class="col-md-3 col-sm-4 col-6"></div>');
                        const wrapper = $('<div class="image-item-wrapper"></div>');
                        const img = $('<img src="' + imgData + '" alt="Captured Image">');
                        const removeBtn = $('<button type="button" class="remove-image-btn" data-type="captured" data-index="' + index + '">&times;</button>');

                        wrapper.append(img).append(removeBtn);
                        col.append(wrapper);
                        gallery.append(col);
                    });

                    // Display uploaded images
                    uploadedImages.forEach((file, index) => {
                        const col = $('<div class="col-md-3 col-sm-4 col-6"></div>');
                        const wrapper = $('<div class="image-item-wrapper"></div>');

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = $('<img src="' + e.target.result + '" alt="Uploaded Image">');
                            const removeBtn = $('<button type="button" class="remove-image-btn" data-type="uploaded" data-index="' + index + '">&times;</button>');

                            wrapper.append(img).append(removeBtn);
                            col.append(wrapper);
                            gallery.append(col);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            }

            // Handle file upload
            $('#file-upload').on('change', function (e) {
                const files = Array.from(e.target.files);
                files.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        uploadedImages.push(file);
                    }
                });
                updateImagesDisplay();
                $(this).val('');
            });

            // Handle image removal
            $(document).on('click', '.remove-image-btn', function () {
                const type = $(this).data('type');
                const index = $(this).data('index');

                if (type === 'captured') {
                    capturedImages.splice(index, 1);
                } else if (type === 'uploaded') {
                    uploadedImages.splice(index, 1);
                }
                updateImagesDisplay();
            });

            $(document).ready(function () {
                // Initialize InputMask for CNIC
                $('#cnic').inputmask({
                    mask: '99999-9999999-9',
                    placeholder: 'XXXXX-XXXXXXX-X',
                    showMaskOnHover: true,
                    showMaskOnFocus: true,
                    clearIncomplete: true
                });

                var cnicPattern = /^\d{5}-\d{7}-\d{1}$/;

                function validateCNIC() {
                    var cnicValue = $('#cnic').inputmask('unmaskedvalue');
                    var cnicDisplayValue = $('#cnic').val();
                    var cnicError = $('#cnic_error');
                    var cnicInput = $('#cnic');

                    if (cnicDisplayValue === '' || cnicValue === '') {
                        cnicError.hide();
                        cnicInput.removeClass('is-invalid is-valid');
                        return false;
                    }

                    if (cnicValue.length === 13 && cnicPattern.test(cnicDisplayValue)) {
                        cnicError.hide();
                        cnicInput.removeClass('is-invalid').addClass('is-valid');
                        return true;
                    } else {
                        cnicError.show();
                        cnicInput.removeClass('is-valid').addClass('is-invalid');
                        return false;
                    }
                }

                $('#cnic').on('blur', validateCNIC);
                $('#cnic').on('input', function () {
                    var cnicValue = $(this).inputmask('unmaskedvalue');
                    if (cnicValue.length >= 5) {
                        validateCNIC();
                    } else {
                        $('#cnic_error').hide();
                        $(this).removeClass('is-invalid is-valid');
                    }
                });

                // CNIC duplicate check
                $('#check_cnic').hide();
                $('#cnic').on('keyup', function () {
                    $('#check_cnic').hide();
                    var code = $(this).val().trim();
                    if (code !== '' && code.length === 15 && cnicPattern.test(code)) {
                        $.get("{{ url('cnic') }}" + '/' + code, function (data) {
                            if (data == "found") {
                                $('#check_cnic').show();
                            }
                        });
                    }
                });

                // FIR duplicate check
                $('#check_fir').hide();
                $('#i_no').on('keyup', function () {
                    $('#check_fir').hide();
                    var code = $(this).val();
                    if (code !== '') {
                        $.get("{{ url('fir') }}" + '/' + code, function (data) {
                            if (data == "found") {
                                $('#check_fir').show();
                            }
                        });
                    }
                });

                // Category change handler
                window.changeCategory = function () {
                    var cat = document.getElementById("cat").value;
                    if (cat == '') {
                        document.getElementById("subcat").value = '';
                        document.getElementById("subcat").disabled = true;
                    } else {
                        document.getElementById("subcat").disabled = false;
                        $('#subcat .subcat-option').hide();
                        $('#subcat .subcat-option[data-cat-id="' + cat + '"]').show();
                    }
                }

                // AJAX Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Form Submit
                $('#saveBtn').click(function (e) {
                    e.preventDefault();

                    var cnicValue = $('#cnic').val().trim();
                    if (cnicValue !== '') {
                        if (!validateCNIC()) {
                            $('#cnic').focus();
                            return false;
                        }
                    }

                    var form = document.getElementById('caseForm');
                    if (!form.checkValidity()) {
                        form.classList.add('was-validated');
                        return false;
                    }

                    $(this).html('<iconify-icon icon="mdi:loading" class="me-1 spin"></iconify-icon>Saving...');

                    var formData = new FormData($('#caseForm')[0]);

                    if (capturedImages.length > 0) {
                        formData.append('image', capturedImages[0]);
                        for (var i = 1; i < capturedImages.length; i++) {
                            formData.append('captured_images[]', capturedImages[i]);
                        }
                    }

                    uploadedImages.forEach(function (file, index) {
                        formData.append('uploaded_images[]', file);
                    });

                    formData.append('total_images', capturedImages.length + uploadedImages.length);

                    if (capturedImages.length === 0 && uploadedImages.length > 0) {
                        formData.append('use_first_uploaded_as_main', '1');
                    }

                    $.ajax({
                        data: formData,
                        url: "{{ route('cases.store') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (data) {
                            window.location.href = "{{ route('cases.index') }}";
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            var err = jQuery.parseJSON(data.responseText);
                            alert(err.message);
                            $('#saveBtn').html('<iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save Case');
                        }
                    });
                });

                // Webcam Setup
                Webcam.set({
                    width: 490,
                    height: 350,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });

                window.take_snapshot = function () {
                    Webcam.snap(function (data_uri) {
                        $(".image-tag").val(data_uri);
                        capturedImages.push(data_uri);
                        updateImagesDisplay();
                    });
                }

                window.sendvalue = function (event) {
                    event.preventDefault();
                    var cnic = document.getElementById('cnic').value;
                    if (cnic) {
                        var actionUrl = '{{ route("excases") }}';
                        var form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;
                        form.target = '_blank';

                        var csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = '{{ csrf_token() }}';
                        form.appendChild(csrfInput);

                        var cnicInput = document.createElement('input');
                        cnicInput.type = 'hidden';
                        cnicInput.name = 'id';
                        cnicInput.value = cnic;
                        form.appendChild(cnicInput);

                        document.body.appendChild(form);
                        form.submit();
                        document.body.removeChild(form);
                    } else {
                        alert('Please enter a CNIC first.');
                    }
                }

                $('#cameraModal').on('shown.bs.modal', function () {
                    Webcam.attach('#my_camera');
                });
            });
        </script>
    @endpush

@endsection