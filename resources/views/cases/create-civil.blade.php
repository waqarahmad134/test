@extends('layout.layout')

@php
    $title = 'Create Civil/Family Case';
    $subTitle = 'Institution Management';
@endphp

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <style>
        /* Form Styles */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            margin-top: 10px;
        }

        .section-title h5 {
            margin: 0;
            font-weight: 600;
        }

        .section-title.secondary {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
        }

        .section-title.tertiary {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 0.5rem 0.75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        /* CNIC Validation */
        #cnic.is-invalid {
            border-color: #dc3545;
        }

        #cnic.is-valid {
            border-color: #198754;
        }

        /* Image Gallery */
        .image-item-wrapper {
            position: relative;
            margin-bottom: 10px;
        }

        .image-item-wrapper img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
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
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            z-index: 10;
        }

        /* Checkbox styling */
        .form-check-inline {
            margin-right: 1.5rem;
        }

        .form-check-input:checked {
            background-color: #28a745;
            border-color: #28a745;
        }

        /* Input Group */
        .input-group-text {
            background: #e9ecef;
            font-weight: 600;
        }

        .case-title-separator {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-group {
                margin-bottom: 0.75rem;
            }
        }

        .back-btn {
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateX(-3px);
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
                    <p class="text-muted mb-0">Fill in all the required details to create a new Civil/Family case</p>
                </div>
                <a href="{{ route('cases.index') }}" class="btn btn-outline-secondary back-btn">
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

                <!-- ==================== SECTION 1: BASIC DETAILS ==================== -->
                <div class="section-title">
                    <h5><iconify-icon icon="mdi:information-outline" class="me-2"></iconify-icon>Basic Details</h5>
                </div>

                <!-- Images Row -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label><iconify-icon icon="mdi:image-multiple" class="me-1"></iconify-icon>Images</label>
                            <div class="border rounded p-3 bg-light" id="images-container" style="min-height: 100px;">
                                <div class="text-muted text-center py-2" id="no-images-message">
                                    <iconify-icon icon="mdi:image-off" style="font-size: 24px;"></iconify-icon>
                                    <p class="mb-0 mt-1">No images added yet. Use capture or upload to add images.</p>
                                </div>
                                <div class="row g-2" id="images-gallery"></div>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#cameraModal">
                                    <iconify-icon icon="mdi:camera" class="me-1"></iconify-icon>Capture
                                </button>
                                <label for="file-upload" class="btn btn-outline-success btn-sm mb-0"
                                    style="cursor: pointer;">
                                    <iconify-icon icon="mdi:upload" class="me-1"></iconify-icon>Upload
                                </label>
                                <input type="file" id="file-upload" name="images[]" multiple accept="image/*"
                                    style="display: none;">
                            </div>
                            <div id="hidden-images-inputs"></div>
                        </div>
                    </div>
                </div>

                <!-- Judge/Assigned To Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="judge_id"><iconify-icon icon="mdi:account-tie" class="me-1"></iconify-icon>Assigned
                                To / Judge Name <span class="text-danger">*</span></label>
                            <select class="form-control" id="judge_id" name="judge_id" required>
                                <option value="">Select Judge/Officer</option>
                                @foreach($judges as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Case Title Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label><iconify-icon icon="mdi:format-title" class="me-1"></iconify-icon>Case Title <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="p1" name="p1"
                                    placeholder="Party 1 (Plaintiff/Petitioner)" required>
                                <span class="input-group-text case-title-separator">VS</span>
                                <input type="text" class="form-control" id="p2" name="p2"
                                    placeholder="Party 2 (Defendant/Respondent)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CNIC Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cnic"><iconify-icon icon="mdi:card-account-details"
                                    class="me-1"></iconify-icon>Person CNIC</label>
                            <input type="text" class="form-control" id="cnic" name="cnic" placeholder="XXXXX-XXXXXXX-X">
                            <small class="form-text text-danger" id="cnic_error" style="display: none;">Please enter a valid
                                Pakistani CNIC format (XXXXX-XXXXXXX-X)</small>
                            <a href="#" onclick="sendvalue(event)" target="_blank">
                                <small class="form-text text-danger" id="check_cnic" style="display: none;">CNIC already
                                    exists - Click to view</small>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cno"><iconify-icon icon="mdi:door" class="me-1"></iconify-icon>Court Room
                                No.</label>
                            <input type="text" class="form-control" id="cno" name="cno"
                                placeholder="Enter court room number">
                        </div>
                    </div>
                </div>

                <!-- Contact Numbers Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="m1"><iconify-icon icon="mdi:phone" class="me-1"></iconify-icon>Party 1 Contact
                                No</label>
                            <input type="text" class="form-control" id="m1" name="m1" placeholder="03XX-XXXXXXX">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="m2"><iconify-icon icon="mdi:phone" class="me-1"></iconify-icon>Party 2 Contact
                                No</label>
                            <input type="text" class="form-control" id="m2" name="m2" placeholder="03XX-XXXXXXX">
                        </div>
                    </div>
                </div>

                <!-- Institution Details Row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="i_date"><iconify-icon icon="mdi:calendar" class="me-1"></iconify-icon>Institution
                                Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="i_date" name="i_date" value="{{ date('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="i_no"><iconify-icon icon="mdi:numeric" class="me-1"></iconify-icon>Institution No
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="i_no" name="i_no" placeholder="Enter Inst. No"
                                required>
                            <small class="form-text text-danger" id="check_fir" style="display: none;">Case already entered
                                multiple times</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="case_no"><iconify-icon icon="mdi:file-document" class="me-1"></iconify-icon>Case No.
                                (Court)</label>
                            <input type="text" class="form-control" id="case_no" name="case_no" placeholder="Case No.">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="a_date"><iconify-icon icon="mdi:calendar-check"
                                    class="me-1"></iconify-icon>Court/Appearance Date <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="a_date" name="a_date" value="{{ date('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Category Row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat"><iconify-icon icon="mdi:folder" class="me-1"></iconify-icon>Category <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" id="cat" name="cat" onchange="changeCategory();" required>
                                <option value="">Select Category</option>
                                @foreach($cats as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subcat"><iconify-icon icon="mdi:folder-open" class="me-1"></iconify-icon>Subcategory
                                <span class="text-danger">*</span></label>
                            <select class="form-control" id="subcat" name="subcat" disabled required>
                                <option value="">Select Subcategory</option>
                                @foreach($subcats as $s)
                                    <option value="{{$s->id}}" class="subcat-option" data-cat-id="{{$s->cat_id}}">{{$s->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="govt_dept"><iconify-icon icon="mdi:domain" class="me-1"></iconify-icon>Govt.
                                Department (If applicable)</label>
                            <select class="form-control" id="govt_dept" name="govt_dept">
                                <option value="">Nil / Not Applicable</option>
                                <option value="Board of Revenue">Board of Revenue</option>
                                <option value="Education Department">Education Department</option>
                                <option value="Health Department">Health Department</option>
                                <option value="Police Department">Police Department</option>
                                <option value="Metropolitan Corporation">Metropolitan Corporation</option>
                                <option value="WAPDA">WAPDA</option>
                                <option value="WASA">WASA</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Direction Details Row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="direction_from"><iconify-icon icon="mdi:arrow-right-bold"
                                    class="me-1"></iconify-icon>Direction Issued From</label>
                            <select class="form-control" id="direction_from" name="direction_from">
                                <option value="">No Direction</option>
                                <option value="Supreme Court">Supreme Court</option>
                                <option value="High Court">Lahore High Court</option>
                                <option value="D&SJ">District & Sessions Judge</option>
                                <option value="NJP">National Judicial Policy (NJP)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="direction_detail"><iconify-icon icon="mdi:note-text"
                                    class="me-1"></iconify-icon>Direction (Letter No. & Dated)</label>
                            <input type="text" class="form-control" id="direction_detail" name="direction_detail"
                                placeholder="Enter direction details">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="direction_end_date"><iconify-icon icon="mdi:calendar-end"
                                    class="me-1"></iconify-icon>Direction End Date</label>
                            <input type="date" class="form-control" id="direction_end_date" name="direction_end_date">
                        </div>
                    </div>
                </div>

                <!-- This Case Includes Row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><iconify-icon icon="mdi:checkbox-multiple-marked" class="me-1"></iconify-icon>This case
                                includes:</label>
                            <div class="d-flex flex-wrap gap-3 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_juvenile" id="is_juvenile"
                                        value="1">
                                    <label class="form-check-label" for="is_juvenile">Juvenile</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_overseas" id="is_overseas"
                                        value="1">
                                    <label class="form-check-label" for="is_overseas">Overseas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><iconify-icon icon="mdi:human-female" class="me-1"></iconify-icon>This case includes
                                Women:</label>
                            <div class="d-flex flex-wrap gap-3 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_women_petitioner"
                                        id="is_women_petitioner" value="1">
                                    <label class="form-check-label" for="is_women_petitioner">Petitioner/Plaintiff</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_women_respondent"
                                        id="is_women_respondent" value="1">
                                    <label class="form-check-label" for="is_women_respondent">Respondent/Defendant</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="connected_case"><iconify-icon icon="mdi:link-variant"
                                    class="me-1"></iconify-icon>Connected Case (Main Case)</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" id="is_connected"
                                        name="is_connected" value="1">
                                </div>
                                <input type="text" class="form-control" id="connected_case" name="connected_case"
                                    placeholder="Case connected with" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mouza and Suit Valuation Row -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mouza"><iconify-icon icon="mdi:map-marker" class="me-1"></iconify-icon>Mouza
                                (Area)</label>
                            <input type="text" class="form-control" id="mouza" name="mouza" placeholder="Enter Mouza/Area">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="suit_valuation"><iconify-icon icon="mdi:currency-usd"
                                    class="me-1"></iconify-icon>Suit Valuation</label>
                            <input type="number" class="form-control" id="suit_valuation" name="suit_valuation"
                                placeholder="Enter suit valuation amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="civil_jurisdiction"><iconify-icon icon="mdi:scale-balance"
                                    class="me-1"></iconify-icon>Civil Jurisdiction</label>
                            <select class="form-control" id="civil_jurisdiction" name="civil_jurisdiction">
                                <option value="">Select Civil Jurisdiction</option>
                                <option value="Class-I">Class-I</option>
                                <option value="Class-II">Class-II</option>
                                <option value="Class-III">Class-III</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Remarks Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="remarks"><iconify-icon icon="mdi:note-edit"
                                    class="me-1"></iconify-icon>Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3"
                                placeholder="Enter any additional remarks or notes about this case..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- ==================== SECTION 2: CIVIL DETAILS (Appellate) ==================== -->
                <div class="section-title secondary">
                    <h5><iconify-icon icon="mdi:gavel" class="me-2"></iconify-icon>Appellate Jurisdiction Details (If
                        applicable)</h5>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lower_court_case_no"><iconify-icon icon="mdi:file-document-outline"
                                    class="me-1"></iconify-icon>Case No. (Lower Court)</label>
                            <input type="text" class="form-control" id="lower_court_case_no" name="lower_court_case_no"
                                placeholder="Lower court case no.">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="app_against"><iconify-icon icon="mdi:arrow-up-bold"
                                    class="me-1"></iconify-icon>Appeal Against</label>
                            <select class="form-control" id="app_against" name="app_against">
                                <option value="">Select</option>
                                <option value="Interim Order">Interim Order</option>
                                <option value="Final Order">Final Order</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="o_date"><iconify-icon icon="mdi:calendar" class="me-1"></iconify-icon>Order
                                Dated</label>
                            <input type="date" class="form-control" id="o_date" name="o_date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="court_name"><iconify-icon icon="mdi:account-check" class="me-1"></iconify-icon>Order
                                By</label>
                            <input type="text" class="form-control" id="court_name" name="court_name"
                                placeholder="Name of officer/court">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stay_granted"><iconify-icon icon="mdi:hand-back-left"
                                    class="me-1"></iconify-icon>Stay Granted</label>
                            <select class="form-control" id="stay_granted" name="stay_granted">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- ==================== SECTION 3: CASE PROCEEDINGS ==================== -->
                <div class="section-title tertiary">
                    <h5><iconify-icon icon="mdi:progress-clock" class="me-2"></iconify-icon>Case Proceedings</h5>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="case_status"><iconify-icon icon="mdi:flag" class="me-1"></iconify-icon>Case
                                Status</label>
                            <select class="form-control" id="case_status" name="case_status">
                                <option value="Pending" selected>Pending</option>
                                <option value="Decided">Decided</option>
                                <option value="Disposed">Disposed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="next_date"><iconify-icon icon="mdi:calendar-arrow-right"
                                    class="me-1"></iconify-icon>Next Date</label>
                            <input type="date" class="form-control" id="next_date" name="next_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="case_stage"><iconify-icon icon="mdi:stairs" class="me-1"></iconify-icon>Case
                                Stage</label>
                            <select class="form-control" id="case_stage" name="case_stage">
                                <option value="">Select Case Stage</option>
                                <option value="Notice">Notice</option>
                                <option value="Summon">Summon</option>
                                <option value="Written Statement">Written Statement</option>
                                <option value="Pre-Trial Reconciliation">Pre-Trial Reconciliation</option>
                                <option value="Evidence of Plaintiff">Evidence of Plaintiff</option>
                                <option value="Evidence of Defendant">Evidence of Defendant</option>
                                <option value="Cross Examination">Cross Examination</option>
                                <option value="Arguments">Arguments</option>
                                <option value="Final Arguments">Final Arguments</option>
                                <option value="For Order">For Order</option>
                                <option value="Compromise">Compromise</option>
                                <option value="Further Proceedings">Further Proceedings</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adjournment_reason"><iconify-icon icon="mdi:clock-alert"
                                    class="me-1"></iconify-icon>Adjournment Reason</label>
                            <select class="form-control" id="adjournment_reason" name="adjournment_reason">
                                <option value="">Nil</option>
                                <option value="On Request of Plaintiff Party">On Request of Plaintiff Party</option>
                                <option value="On Request of Defendant Party">On Request of Defendant Party</option>
                                <option value="On Request of Both Parties">On Request of Both Parties</option>
                                <option value="Non Availability of Counsel">Non Availability of Counsel</option>
                                <option value="Non Availability of Record">Non Availability of Record</option>
                                <option value="Non Deposit of Court Fee">Non Deposit of Court Fee</option>
                                <option value="Strike of Bar">Strike of Bar</option>
                                <option value="Presiding Officer on Leave">Presiding Officer on Leave</option>
                                <option value="Declared Holiday">Declared Holiday</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="short_order"><iconify-icon icon="mdi:message-text" class="me-1"></iconify-icon>Short
                                Order</label>
                            <textarea class="form-control" id="short_order" name="short_order" rows="2"
                                placeholder="Enter short order details..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div class="text-muted">
                        <small><iconify-icon icon="mdi:information" class="me-1"></iconify-icon>Fields marked with <span
                                class="text-danger">*</span> are required</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('cases.index') }}" class="btn btn-secondary">
                            <iconify-icon icon="mdi:close" class="me-1"></iconify-icon>Cancel
                        </a>
                        <button type="submit" class="btn btn-success" id="saveBtn">
                            <iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save Case
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Camera Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title"><iconify-icon icon="mdi:camera" class="me-2"></iconify-icon>Capture Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="bg-light rounded p-2 mb-3">
                        <div id="my_camera" style="width: 100%; aspect-ratio: 4/3;"></div>
                    </div>
                    <input type="hidden" name="image" class="image-tag">
                    <button type="button" class="btn btn-primary" onclick="take_snapshot()" data-bs-dismiss="modal">
                        <iconify-icon icon="mdi:camera" class="me-1"></iconify-icon>Take Snapshot
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
        <script>
            let capturedImages = [], uploadedImages = [];

            function updateImagesDisplay() {
                const gallery = $('#images-gallery');
                const noImagesMsg = $('#no-images-message');
                gallery.empty();

                if (capturedImages.length + uploadedImages.length === 0) {
                    noImagesMsg.show();
                } else {
                    noImagesMsg.hide();
                    capturedImages.forEach((imgData, index) => {
                        gallery.append('<div class="col-md-2 col-sm-3 col-4"><div class="image-item-wrapper"><img src="' + imgData + '"><button type="button" class="remove-image-btn" data-type="captured" data-index="' + index + '">&times;</button></div></div>');
                    });
                    uploadedImages.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            gallery.append('<div class="col-md-2 col-sm-3 col-4"><div class="image-item-wrapper"><img src="' + e.target.result + '"><button type="button" class="remove-image-btn" data-type="uploaded" data-index="' + index + '">&times;</button></div></div>');
                        };
                        reader.readAsDataURL(file);
                    });
                }
            }

            $('#file-upload').on('change', function (e) {
                Array.from(e.target.files).forEach(file => {
                    if (file.type.startsWith('image/')) uploadedImages.push(file);
                });
                updateImagesDisplay();
                $(this).val('');
            });

            $(document).on('click', '.remove-image-btn', function () {
                const type = $(this).data('type'), index = $(this).data('index');
                if (type === 'captured') capturedImages.splice(index, 1);
                else uploadedImages.splice(index, 1);
                updateImagesDisplay();
            });

            // Connected case checkbox toggle
            $('#is_connected').on('change', function () {
                $('#connected_case').prop('disabled', !this.checked);
                if (!this.checked) $('#connected_case').val('');
            });

            $(document).ready(function () {
                // CNIC Input Mask
                $('#cnic').inputmask({
                    mask: '99999-9999999-9',
                    placeholder: 'XXXXX-XXXXXXX-X',
                    showMaskOnHover: true,
                    showMaskOnFocus: true,
                    clearIncomplete: true
                });

                var cnicPattern = /^\d{5}-\d{7}-\d{1}$/;

                function validateCNIC() {
                    var v = $('#cnic').inputmask('unmaskedvalue'), d = $('#cnic').val();
                    if (d === '' || d === '_____-_______-_') {
                        $('#cnic_error').hide();
                        $('#cnic').removeClass('is-invalid is-valid');
                        return true; // Allow empty
                    }
                    if (v.length === 13 && cnicPattern.test(d)) {
                        $('#cnic_error').hide();
                        $('#cnic').removeClass('is-invalid').addClass('is-valid');
                        return true;
                    } else {
                        $('#cnic_error').show();
                        $('#cnic').removeClass('is-valid').addClass('is-invalid');
                        return false;
                    }
                }

                $('#cnic').on('blur', validateCNIC).on('input', function () {
                    if ($(this).inputmask('unmaskedvalue').length >= 5) validateCNIC();
                });

                $('#check_cnic').hide();
                $('#cnic').on('keyup', function () {
                    $('#check_cnic').hide();
                    var c = $(this).val().trim();
                    if (c.length === 15 && cnicPattern.test(c)) {
                        $.get("{{ url('cnic') }}/" + c, function (d) {
                            if (d == "found") $('#check_cnic').show();
                        });
                    }
                });

                $('#check_fir').hide();
                $('#i_no').on('keyup', function () {
                    $('#check_fir').hide();
                    var c = $(this).val();
                    if (c !== '') {
                        $.get("{{ url('fir') }}/" + c, function (d) {
                            if (d == "found") $('#check_fir').show();
                        });
                    }
                });

                window.changeCategory = function () {
                    var c = $('#cat').val();
                    if (c == '') {
                        $('#subcat').val('').prop('disabled', true);
                    } else {
                        $('#subcat').prop('disabled', false);
                        $('#subcat .subcat-option').hide().filter('[data-cat-id="' + c + '"]').show();
                        $('#subcat').val('');
                    }
                };

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $('#saveBtn').click(function (e) {
                    e.preventDefault();

                    var cv = $('#cnic').val().trim();
                    if (cv !== '' && cv !== '_____-_______-_' && !validateCNIC()) {
                        $('#cnic').focus();
                        return false;
                    }

                    var form = document.getElementById('caseForm');
                    if (!form.checkValidity()) {
                        form.classList.add('was-validated');
                        return false;
                    }

                    $(this).html('<iconify-icon icon="mdi:loading" class="me-1 spin"></iconify-icon>Saving...');
                    $(this).prop('disabled', true);

                    var fd = new FormData($('#caseForm')[0]);

                    if (capturedImages.length > 0) {
                        fd.append('image', capturedImages[0]);
                        for (var i = 1; i < capturedImages.length; i++) fd.append('captured_images[]', capturedImages[i]);
                    }
                    uploadedImages.forEach(f => fd.append('uploaded_images[]', f));
                    fd.append('total_images', capturedImages.length + uploadedImages.length);
                    if (capturedImages.length === 0 && uploadedImages.length > 0) fd.append('use_first_uploaded_as_main', '1');

                    $.ajax({
                        data: fd,
                        url: "{{ route('cases.store') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function () {
                            window.location.href = "{{ route('cases.index') }}";
                        },
                        error: function (d) {
                            var msg = 'An error occurred. Please try again.';
                            try { msg = jQuery.parseJSON(d.responseText).message; } catch (e) { }
                            alert(msg);
                            $('#saveBtn').html('<iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save Case');
                            $('#saveBtn').prop('disabled', false);
                        }
                    });
                });

                // Webcam Setup
                Webcam.set({ width: 400, height: 300, image_format: 'jpeg', jpeg_quality: 90 });

                window.take_snapshot = function () {
                    Webcam.snap(function (d) {
                        $(".image-tag").val(d);
                        capturedImages.push(d);
                        updateImagesDisplay();
                    });
                };

                window.sendvalue = function (e) {
                    e.preventDefault();
                    var c = $('#cnic').val();
                    if (c) {
                        var f = document.createElement('form');
                        f.method = 'POST';
                        f.action = '{{ route("excases") }}';
                        f.target = '_blank';
                        var t = document.createElement('input');
                        t.type = 'hidden'; t.name = '_token'; t.value = '{{ csrf_token() }}';
                        f.appendChild(t);
                        var i = document.createElement('input');
                        i.type = 'hidden'; i.name = 'id'; i.value = c;
                        f.appendChild(i);
                        document.body.appendChild(f);
                        f.submit();
                        document.body.removeChild(f);
                    }
                };

                $('#cameraModal').on('shown.bs.modal', function () { Webcam.attach('#my_camera'); });
                $('#cameraModal').on('hidden.bs.modal', function () { Webcam.reset(); });
            });
        </script>
    @endpush

@endsection