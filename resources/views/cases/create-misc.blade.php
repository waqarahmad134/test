@extends('layout.layout')

@php
    $title = 'Create Misc. Case';
    $subTitle = 'Institution Management';
@endphp

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <style>
        #cnic.is-invalid {
            border-color: #dc3545;
        }

        #cnic.is-valid {
            border-color: #198754;
        }

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

        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            background: linear-gradient(135deg, #6f42c1 0%, #0dcaf0 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .section-title.appeal {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-1"><span class="badge bg-info me-2">Misc.</span>Create New Institution</h4>
                    <p class="text-muted mb-0">Fill in the details below to create a new Misc. case</p>
                </div>
                <a href="{{ route('cases.index') }}" class="btn btn-outline-secondary"><iconify-icon icon="mdi:arrow-left"
                        class="me-1"></iconify-icon>Back to List</a>
            </div>
        </div>
    </div>

    <div class="card form-card">
        <div class="card-body p-4">
            <form id="caseForm" name="caseForm" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="caset" id="caset" value="Misc. Case">

                <div class="section-title">
                    <h5 class="mb-0"><iconify-icon icon="mdi:information-outline" class="me-2"></iconify-icon>Basic
                        Information</h5>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label><strong>Images</strong></label>
                        <div class="border rounded p-3" id="images-container" style="min-height: 150px;">
                            <div class="text-muted text-center py-3" id="no-images-message">No images added yet.</div>
                            <div class="row g-2" id="images-gallery"></div>
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#cameraModal"><iconify-icon icon="mdi:camera"
                                    class="me-1"></iconify-icon>Capture Image</button>
                            <label for="file-upload" class="btn btn-success mb-0" style="cursor: pointer;"><iconify-icon
                                    icon="mdi:upload" class="me-1"></iconify-icon>Upload from System</label>
                            <input type="file" id="file-upload" name="images[]" multiple accept="image/*"
                                style="display: none;">
                        </div>
                        <div id="hidden-images-inputs"></div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="cnic"><strong>Person CNIC</strong></label>
                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="XXXXX-XXXXXXX-X"
                            required>
                        <small class="form-text text-danger" id="cnic_error" style="display: none;">Please enter a valid
                            CNIC format</small>
                        <a href="#" onclick="sendvalue(event)"><small class="form-text text-danger" id="check_cnic">CNIC
                                already exists</small></a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="p1"><strong>Party1</strong></label><input type="text"
                            class="form-control" id="p1" name="p1"></div>
                    <div class="col-md-6"><label for="p2"><strong>Party2</strong></label><input type="text"
                            class="form-control" id="p2" name="p2"></div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="m1"><strong>Party1 Contact No</strong></label><input type="text"
                            class="form-control" id="m1" name="m1"></div>
                    <div class="col-md-6"><label for="m2"><strong>Party2 Contact No</strong></label><input type="text"
                            class="form-control" id="m2" name="m2"></div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="i_date"><strong>Institution Date</strong></label><input type="date"
                            class="form-control" id="i_date" name="i_date" value="{{ date('Y-m-d') }}"></div>
                    <div class="col-md-6"><label for="i_no"><strong>Institution No</strong></label><input type="text"
                            class="form-control" id="i_no" name="i_no"><small class="form-text text-danger"
                            id="check_fir">Case already entered 4 times</small></div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="cat"><strong>Category</strong></label><select class="form-control"
                            id="cat" name="cat" onchange="changeCategory();">
                            <option value="">Select:</option>@foreach($cats as $s)<option value="{{$s->id}}">{{$s->name}}
                            </option>@endforeach
                        </select></div>
                    <div class="col-md-6"><label for="subcat"><strong>Subcategory</strong></label><select
                            class="form-control" id="subcat" name="subcat" disabled>
                            <option value="">Select:</option>@foreach($subcats as $s)<option value="{{$s->id}}"
                            class="subcat-option" data-cat-id="{{$s->cat_id}}">{{$s->name}}</option>@endforeach
                        </select></div>
                </div>

                <div class="form-group mb-4"><label for="judge_id"><strong>Assigned To</strong></label><select
                        class="form-control" id="judge_id" name="judge_id">
                        <option value="">Select:</option>@foreach($judges as $s)<option value="{{$s->id}}">{{$s->name}}
                        </option>@endforeach
                    </select></div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="cno"><strong>Court Room No.</strong></label><input type="text"
                            class="form-control" id="cno" name="cno"></div>
                    <div class="col-md-6"><label for="a_date"><strong>Date of Appearance</strong></label><input type="date"
                            class="form-control" id="a_date" name="a_date" value="{{ date('Y-m-d') }}"></div>
                </div>

                <div class="section-title appeal mt-4">
                    <h5 class="mb-0"><iconify-icon icon="mdi:gavel" class="me-2"></iconify-icon>Appeal Details</h5>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="jur"><strong>Appellant Jurisdiction</strong></label><select
                            class="form-control" id="jur" name="jur">
                            <option value="">Select</option>
                            <option value="Appellant Jurisdiction (Appeal/Revision)">Appellant Jurisdiction
                                (Appeal/Revision)</option>
                        </select></div>
                    <div class="col-md-6"><label for="app_against"><strong>Appeal Against</strong></label><input type="text"
                            class="form-control" id="app_against" name="app_against"></div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label for="o_date"><strong>Order Dated</strong></label><input type="date"
                            class="form-control" id="o_date" name="o_date" value="{{ date('Y-m-d') }}"></div>
                    <div class="col-md-6"><label for="court_name"><strong>Order By</strong></label><input type="text"
                            class="form-control" id="court_name" name="court_name"></div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('cases.index') }}" class="btn btn-secondary"><iconify-icon icon="mdi:close"
                            class="me-1"></iconify-icon>Cancel</a>
                    <button type="submit" class="btn btn-info" id="saveBtn"><iconify-icon icon="mdi:content-save"
                            class="me-1"></iconify-icon>Save Case</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade text-center" id="cameraModal" tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-light border-bottom-0">
                    <h5 class="modal-title mx-auto">Capture Image</h5><button type="button"
                        class="btn-close position-absolute" style="right: 15px;" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body px-4 pt-0">
                    <div class="my-3 p-2 border rounded bg-light">
                        <div id="my_camera" class="w-100 rounded"
                            style="max-width: 100%; height: auto; aspect-ratio: 4 / 3; overflow: hidden;"></div>
                    </div><input type="hidden" name="image" class="image-tag">
                    <div class="d-flex justify-content-center"><button type="button" class="btn btn-primary px-4"
                            onclick="take_snapshot()" data-bs-dismiss="modal"><iconify-icon icon="mdi:camera"
                                class="me-1"></iconify-icon>Take Snapshot</button></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
        <script>
            let capturedImages = [], uploadedImages = [];
            function updateImagesDisplay() { const gallery = $('#images-gallery'); gallery.empty(); if (capturedImages.length + uploadedImages.length === 0) { $('#no-images-message').show(); } else { $('#no-images-message').hide(); capturedImages.forEach((imgData, index) => { gallery.append('<div class="col-md-3 col-sm-4 col-6"><div class="image-item-wrapper"><img src="' + imgData + '"><button type="button" class="remove-image-btn" data-type="captured" data-index="' + index + '">&times;</button></div></div>'); }); uploadedImages.forEach((file, index) => { const reader = new FileReader(); reader.onload = function (e) { gallery.append('<div class="col-md-3 col-sm-4 col-6"><div class="image-item-wrapper"><img src="' + e.target.result + '"><button type="button" class="remove-image-btn" data-type="uploaded" data-index="' + index + '">&times;</button></div></div>'); }; reader.readAsDataURL(file); }); } }
            $('#file-upload').on('change', function (e) { Array.from(e.target.files).forEach(file => { if (file.type.startsWith('image/')) uploadedImages.push(file); }); updateImagesDisplay(); $(this).val(''); });
            $(document).on('click', '.remove-image-btn', function () { const type = $(this).data('type'), index = $(this).data('index'); if (type === 'captured') capturedImages.splice(index, 1); else uploadedImages.splice(index, 1); updateImagesDisplay(); });
            $(document).ready(function () {
                $('#cnic').inputmask({ mask: '99999-9999999-9', placeholder: 'XXXXX-XXXXXXX-X', showMaskOnHover: true, showMaskOnFocus: true, clearIncomplete: true });
                var cnicPattern = /^\d{5}-\d{7}-\d{1}$/;
                function validateCNIC() { var v = $('#cnic').inputmask('unmaskedvalue'), d = $('#cnic').val(); if (d === '') { $('#cnic_error').hide(); $('#cnic').removeClass('is-invalid is-valid'); return false; } if (v.length === 13 && cnicPattern.test(d)) { $('#cnic_error').hide(); $('#cnic').removeClass('is-invalid').addClass('is-valid'); return true; } else { $('#cnic_error').show(); $('#cnic').removeClass('is-valid').addClass('is-invalid'); return false; } }
                $('#cnic').on('blur', validateCNIC).on('input', function () { if ($(this).inputmask('unmaskedvalue').length >= 5) validateCNIC(); });
                $('#check_cnic').hide(); $('#cnic').on('keyup', function () { $('#check_cnic').hide(); var c = $(this).val().trim(); if (c.length === 15 && cnicPattern.test(c)) { $.get("{{ url('cnic') }}/" + c, function (d) { if (d == "found") $('#check_cnic').show(); }); } });
                $('#check_fir').hide(); $('#i_no').on('keyup', function () { $('#check_fir').hide(); var c = $(this).val(); if (c !== '') $.get("{{ url('fir') }}/" + c, function (d) { if (d == "found") $('#check_fir').show(); }); });
                window.changeCategory = function () { var c = $('#cat').val(); if (c == '') { $('#subcat').val('').prop('disabled', true); } else { $('#subcat').prop('disabled', false); $('#subcat .subcat-option').hide().filter('[data-cat-id="' + c + '"]').show(); } };
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $('#saveBtn').click(function (e) { e.preventDefault(); var cv = $('#cnic').val().trim(); if (cv !== '' && !validateCNIC()) { $('#cnic').focus(); return false; } var form = document.getElementById('caseForm'); if (!form.checkValidity()) { form.classList.add('was-validated'); return false; } $(this).html('Saving...'); var fd = new FormData($('#caseForm')[0]); if (capturedImages.length > 0) { fd.append('image', capturedImages[0]); for (var i = 1; i < capturedImages.length; i++) fd.append('captured_images[]', capturedImages[i]); } uploadedImages.forEach(f => fd.append('uploaded_images[]', f)); fd.append('total_images', capturedImages.length + uploadedImages.length); if (capturedImages.length === 0 && uploadedImages.length > 0) fd.append('use_first_uploaded_as_main', '1'); $.ajax({ data: fd, url: "{{ route('cases.store') }}", type: "POST", processData: false, contentType: false, dataType: 'json', success: function () { window.location.href = "{{ route('cases.index') }}"; }, error: function (d) { alert(jQuery.parseJSON(d.responseText).message); $('#saveBtn').html('Save Case'); } }); });
                Webcam.set({ width: 490, height: 350, image_format: 'jpeg', jpeg_quality: 90 });
                window.take_snapshot = function () { Webcam.snap(function (d) { $(".image-tag").val(d); capturedImages.push(d); updateImagesDisplay(); }); };
                window.sendvalue = function (e) { e.preventDefault(); var c = $('#cnic').val(); if (c) { var f = document.createElement('form'); f.method = 'POST'; f.action = '{{ route("excases") }}'; f.target = '_blank'; var t = document.createElement('input'); t.type = 'hidden'; t.name = '_token'; t.value = '{{ csrf_token() }}'; f.appendChild(t); var i = document.createElement('input'); i.type = 'hidden'; i.name = 'id'; i.value = c; f.appendChild(i); document.body.appendChild(f); f.submit(); document.body.removeChild(f); } };
                $('#cameraModal').on('shown.bs.modal', function () { Webcam.attach('#my_camera'); });
            });
        </script>
    @endpush
@endsection