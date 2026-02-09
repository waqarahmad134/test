@extends('layout.layout')

@php
    $title = 'Create Civil/Family Case';
    $subTitle = 'Institution Management';
@endphp

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <!-- Urdu Webpad Library -->
    <script src="https://dsj.punjab.gov.pk/js/plugins/urdu-webpad/urdu-webpad.js"></script>
    <script type="text/javascript">initUrduEditor()</script>

    <!-- SmartWizard CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />

    <style>
        /* Form Card Styles */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        }

        /* SmartWizard Custom Theme */
        .sw-theme-arrows {
            border: none !important;
        }

        .sw-theme-arrows>.nav {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 5px;
            margin-bottom: 25px;
        }

        .sw-theme-arrows .nav-link {
            background: #e9ecef !important;
            color: #495057 !important;
            font-weight: 600;
            padding: 12px 30px !important;
            border-radius: 0;
            position: relative;
            margin-right: 4px;
        }

        .sw-theme-arrows .nav-link::after {
            content: '';
            position: absolute;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            border: 20px solid transparent;
            border-left: 15px solid #e9ecef;
            z-index: 2;
        }

        .sw-theme-arrows .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            border: 20px solid transparent;
            border-left: 15px solid #f8f9fa;
            z-index: 1;
        }

        .sw-theme-arrows .nav-link:first-child::before {
            display: none;
        }

        .sw-theme-arrows .nav-link.active {
            background: linear-gradient(135deg, #2a7a5a 0%, #3d9970 100%) !important;
            color: white !important;
        }

        .sw-theme-arrows .nav-link.active::after {
            border-left-color: #3d9970 !important;
        }

        .sw-theme-arrows .nav-link.done {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
            color: white !important;
        }

        .sw-theme-arrows .nav-link.done::after {
            border-left-color: #20c997 !important;
        }

        .sw-theme-arrows .nav-link:last-child::after {
            display: none;
        }

        .sw-theme-arrows>.tab-content {
            padding: 0 !important;
            border: none !important;
            background: transparent !important;
        }

        /* Modern Block Wizard Styles */
        #smartwizard {
            background-color: transparent !important;
            border: none !important;
        }

        #smartwizard .nav {
            margin-bottom: 25px !important;
            border-radius: 8px !important;
            overflow: hidden !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
            border: none !important;
            display: flex !important;
            width: 100% !important;
        }

        #smartwizard .nav-item {
            flex: 1 1 0% !important;
            margin: 0 !important;
            border-right: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        #smartwizard .nav-item:last-child {
            border-right: none !important;
        }

        #smartwizard .nav-link {
            height: 70px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
            padding: 0 15px !important;
            background: #48bb78 !important;
            /* Native Green */
            color: #fff !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            transition: all 0.3s ease !important;
            border: none !important;
            position: relative !important;
        }

        /* Icon styling within the nav link */
        #smartwizard .nav-link iconify-icon {
            font-size: 1.4rem !important;
            margin-right: 10px !important;
            opacity: 0.9 !important;
        }

        /* Active Step Style */
        #smartwizard .nav-link.active {
            background: #276749 !important;
            /* Dark Green */
            color: #ffffff !important;
            box-shadow: inset 0 -4px 0 rgba(255, 255, 255, 0.3) !important;
        }

        /* Completed/Done Step Style */
        #smartwizard .nav-link.done {
            background: #38a169 !important;
            /* Medium Green */
            color: #ffffff !important;
        }

        /* Hover Effect */
        #smartwizard .nav-link:hover {
            opacity: 0.95 !important;
            color: #fff !important;
        }

        .sw-theme-default .toolbar {
            padding: 20px 0 !important;
            margin-top: 20px !important;
            border-top: 1px solid #dee2e6 !important;
            display: flex !important;
            justify-content: flex-end !important;
            align-items: center !important;
            gap: 10px !important;
            flex-wrap: nowrap !important;
            width: 100% !important;
        }

        .sw-btn-group-nav,
        .sw-toolbar-extra {
            display: flex !important;
            gap: 10px !important;
            float: none !important;
            margin: 0 !important;
            width: auto !important;
        }

        .sw-theme-arrows .toolbar .btn {
            padding: 10px 25px !important;
            font-weight: 600 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
        }

        /* Section Headers */
        .section-header {
            background: linear-gradient(135deg, #6c757d 0%, #868e96 100%);
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .section-header.civil {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
        }

        .section-header.proceedings {
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
            font-size: 0.9rem;
        }

        .form-group label .required {
            color: #dc3545;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 0.5rem 0.75rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.15);
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
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #dee2e6;
        }

        .image-item-wrapper .remove-image-btn {
            position: absolute;
            top: 3px;
            right: 3px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }

        /* Case Title VS Separator */
        .case-title-separator {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
        }

        /* Checkbox styling */
        .form-check-input:checked {
            background-color: #28a745;
            border-color: #28a745;
        }

        /* Back Button */
        .back-btn:hover {
            transform: translateX(-3px);
        }

        /* Urdu Text Fields */
        .urdu-font-18 {
            font-family: 'Jameel Noori Nastaleeq', 'Noto Nastaliq Urdu', 'Mehr Nastaliq', Arial, sans-serif;
            font-size: 18px;
            direction: rtl;
            text-align: right;
        }

        .urdu-input {
            direction: rtl;
            text-align: right;
            font-family: 'Jameel Noori Nastaleeq', 'Noto Nastaliq Urdu', 'Mehr Nastaliq', Arial, sans-serif;
            font-size: 16px;
        }

        .text-align-urdu {
            text-align: right;
        }

        .urdu-separator {
            background: linear-gradient(135deg, #6c757d, #868e96);
            color: white;
            font-family: 'Jameel Noori Nastaleeq', 'Noto Nastaliq Urdu', Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 0.5rem 0.75rem;
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
                    <p class="text-muted mb-0">Complete all steps to create a new Civil/Family case</p>
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

                <!-- SmartWizard -->
                <div id="smartwizard">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#step-1">
                                <iconify-icon icon="mdi:form-textbox" class="me-1"></iconify-icon>
                                Basic Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-2">
                                <iconify-icon icon="mdi:gavel" class="me-1"></iconify-icon>
                                Civil Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-3">
                                <iconify-icon icon="mdi:progress-clock" class="me-1"></iconify-icon>
                                Proceedings
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- ==================== STEP 1: BASIC DETAILS ==================== -->
                        <div id="step-1" class="tab-pane" role="tabpanel">

                            <!-- Images Row -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><iconify-icon icon="mdi:image-multiple"
                                                class="me-1"></iconify-icon>Images</label>
                                        <div class="border rounded p-2 bg-light" id="images-container"
                                            style="min-height: 80px;">
                                            <div class="text-muted text-center py-2" id="no-images-message">
                                                <small>No images added. Use capture or upload.</small>
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
                                    </div>
                                </div>
                            </div>

                            <!-- Judge/Assigned To -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judge_id">Assigned To / Judge Name <span
                                                class="required">*</span></label>
                                        <select class="form-control" id="judge_id" name="judge_id" required>
                                            <option value="">Select Judge/Officer</option>
                                            @foreach($judges as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- District and Tehsil -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">District <span class="required">*</span></label>
                                        <select class="form-control" id="district" name="district"
                                            onchange="changeTehsil();" required>
                                            <option value="">Select District</option>
                                            <option value="Lahore">Lahore</option>
                                            <option value="Faisalabad">Faisalabad</option>
                                            <option value="Rawalpindi">Rawalpindi</option>
                                            <option value="Multan">Multan</option>
                                            <option value="Gujranwala">Gujranwala</option>
                                            <option value="Sialkot">Sialkot</option>
                                            <option value="Bahawalpur">Bahawalpur</option>
                                            <option value="Sargodha">Sargodha</option>
                                            <option value="Jhang">Jhang</option>
                                            <option value="Sheikhupura">Sheikhupura</option>
                                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                            <option value="Gujrat">Gujrat</option>
                                            <option value="Kasur">Kasur</option>
                                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                            <option value="Sahiwal">Sahiwal</option>
                                            <option value="Okara">Okara</option>
                                            <option value="Muzaffargarh">Muzaffargarh</option>
                                            <option value="Chiniot">Chiniot</option>
                                            <option value="Khanewal">Khanewal</option>
                                            <option value="Mianwali">Mianwali</option>
                                            <option value="Vehari">Vehari</option>
                                            <option value="Bahawalnagar">Bahawalnagar</option>
                                            <option value="Attock">Attock</option>
                                            <option value="Chakwal">Chakwal</option>
                                            <option value="Jhelum">Jhelum</option>
                                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                                            <option value="Narowal">Narowal</option>
                                            <option value="Hafizabad">Hafizabad</option>
                                            <option value="Lodhran">Lodhran</option>
                                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                            <option value="Pakpattan">Pakpattan</option>
                                            <option value="Nankana Sahib">Nankana Sahib</option>
                                            <option value="Layyah">Layyah</option>
                                            <option value="Rajanpur">Rajanpur</option>
                                            <option value="Khushab">Khushab</option>
                                            <option value="Bhakkar">Bhakkar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tehsil">Tehsil <span class="required">*</span></label>
                                        <select class="form-control" id="tehsil" name="tehsil" disabled required>
                                            <option value="">Please Select Tehsil</option>
                                            <!-- Lahore Tehsils -->
                                            <option value="Lahore Cantt" class="tehsil-option" data-district-id="Lahore">
                                                Lahore Cantt</option>
                                            <option value="Lahore City" class="tehsil-option" data-district-id="Lahore">
                                                Lahore City</option>
                                            <option value="Model Town" class="tehsil-option" data-district-id="Lahore">Model
                                                Town</option>
                                            <option value="Raiwind" class="tehsil-option" data-district-id="Lahore">Raiwind
                                            </option>
                                            <option value="Shalimar" class="tehsil-option" data-district-id="Lahore">
                                                Shalimar</option>
                                            <!-- Faisalabad Tehsils -->
                                            <option value="Faisalabad City" class="tehsil-option"
                                                data-district-id="Faisalabad">Faisalabad City</option>
                                            <option value="Faisalabad Saddar" class="tehsil-option"
                                                data-district-id="Faisalabad">Faisalabad Saddar</option>
                                            <option value="Jaranwala" class="tehsil-option" data-district-id="Faisalabad">
                                                Jaranwala</option>
                                            <option value="Sammundri" class="tehsil-option" data-district-id="Faisalabad">
                                                Sammundri</option>
                                            <option value="Tandlianwala" class="tehsil-option"
                                                data-district-id="Faisalabad">Tandlianwala</option>
                                            <option value="Chak Jhumra" class="tehsil-option" data-district-id="Faisalabad">
                                                Chak Jhumra</option>
                                            <!-- Rawalpindi Tehsils -->
                                            <option value="Rawalpindi" class="tehsil-option" data-district-id="Rawalpindi">
                                                Rawalpindi</option>
                                            <option value="Gujar Khan" class="tehsil-option" data-district-id="Rawalpindi">
                                                Gujar Khan</option>
                                            <option value="Taxila" class="tehsil-option" data-district-id="Rawalpindi">
                                                Taxila</option>
                                            <option value="Kahuta" class="tehsil-option" data-district-id="Rawalpindi">
                                                Kahuta</option>
                                            <option value="Kallar Syedan" class="tehsil-option"
                                                data-district-id="Rawalpindi">Kallar Syedan</option>
                                            <option value="Kotli Sattian" class="tehsil-option"
                                                data-district-id="Rawalpindi">Kotli Sattian</option>
                                            <option value="Murree" class="tehsil-option" data-district-id="Rawalpindi">
                                                Murree</option>
                                            <!-- Multan Tehsils -->
                                            <option value="Multan City" class="tehsil-option" data-district-id="Multan">
                                                Multan City</option>
                                            <option value="Multan Saddar" class="tehsil-option" data-district-id="Multan">
                                                Multan Saddar</option>
                                            <option value="Shujabad" class="tehsil-option" data-district-id="Multan">
                                                Shujabad</option>
                                            <option value="Jalalpur Pirwala" class="tehsil-option"
                                                data-district-id="Multan">Jalalpur Pirwala</option>
                                            <!-- Gujranwala Tehsils -->
                                            <option value="Gujranwala City" class="tehsil-option"
                                                data-district-id="Gujranwala">Gujranwala City</option>
                                            <option value="Gujranwala Saddar" class="tehsil-option"
                                                data-district-id="Gujranwala">Gujranwala Saddar</option>
                                            <option value="Kamoke" class="tehsil-option" data-district-id="Gujranwala">
                                                Kamoke</option>
                                            <option value="Nowshera Virkan" class="tehsil-option"
                                                data-district-id="Gujranwala">Nowshera Virkan</option>
                                            <option value="Wazirabad" class="tehsil-option" data-district-id="Gujranwala">
                                                Wazirabad</option>
                                            <!-- Sialkot Tehsils -->
                                            <option value="Sialkot" class="tehsil-option" data-district-id="Sialkot">Sialkot
                                            </option>
                                            <option value="Daska" class="tehsil-option" data-district-id="Sialkot">Daska
                                            </option>
                                            <option value="Pasrur" class="tehsil-option" data-district-id="Sialkot">Pasrur
                                            </option>
                                            <option value="Sambrial" class="tehsil-option" data-district-id="Sialkot">
                                                Sambrial</option>
                                            <!-- Bahawalpur Tehsils -->
                                            <option value="Bahawalpur City" class="tehsil-option"
                                                data-district-id="Bahawalpur">Bahawalpur City</option>
                                            <option value="Bahawalpur Saddar" class="tehsil-option"
                                                data-district-id="Bahawalpur">Bahawalpur Saddar</option>
                                            <option value="Ahmadpur East" class="tehsil-option"
                                                data-district-id="Bahawalpur">Ahmadpur East</option>
                                            <option value="Hasilpur" class="tehsil-option" data-district-id="Bahawalpur">
                                                Hasilpur</option>
                                            <option value="Khairpur Tamewali" class="tehsil-option"
                                                data-district-id="Bahawalpur">Khairpur Tamewali</option>
                                            <option value="Yazman" class="tehsil-option" data-district-id="Bahawalpur">
                                                Yazman</option>
                                            <!-- Sargodha Tehsils -->
                                            <option value="Sargodha" class="tehsil-option" data-district-id="Sargodha">
                                                Sargodha</option>
                                            <option value="Bhalwal" class="tehsil-option" data-district-id="Sargodha">
                                                Bhalwal</option>
                                            <option value="Kot Momin" class="tehsil-option" data-district-id="Sargodha">Kot
                                                Momin</option>
                                            <option value="Sahiwal (Sargodha)" class="tehsil-option"
                                                data-district-id="Sargodha">Sahiwal (Sargodha)</option>
                                            <option value="Shahpur" class="tehsil-option" data-district-id="Sargodha">
                                                Shahpur</option>
                                            <option value="Sillanwali" class="tehsil-option" data-district-id="Sargodha">
                                                Sillanwali</option>
                                            <!-- Jhang Tehsils -->
                                            <option value="Jhang" class="tehsil-option" data-district-id="Jhang">Jhang
                                            </option>
                                            <option value="Shorkot" class="tehsil-option" data-district-id="Jhang">Shorkot
                                            </option>
                                            <option value="Athara Hazari" class="tehsil-option" data-district-id="Jhang">
                                                Athara Hazari</option>
                                            <option value="Ahmad Pur Sial" class="tehsil-option" data-district-id="Jhang">
                                                Ahmad Pur Sial</option>
                                            <!-- Sheikhupura Tehsils -->
                                            <option value="Sheikhupura" class="tehsil-option"
                                                data-district-id="Sheikhupura">Sheikhupura</option>
                                            <option value="Ferozewala" class="tehsil-option" data-district-id="Sheikhupura">
                                                Ferozewala</option>
                                            <option value="Muridke" class="tehsil-option" data-district-id="Sheikhupura">
                                                Muridke</option>
                                            <option value="Safdarabad" class="tehsil-option" data-district-id="Sheikhupura">
                                                Safdarabad</option>
                                            <option value="Sharaqpur" class="tehsil-option" data-district-id="Sheikhupura">
                                                Sharaqpur</option>
                                            <!-- Rahim Yar Khan Tehsils -->
                                            <option value="Rahim Yar Khan" class="tehsil-option"
                                                data-district-id="Rahim Yar Khan">Rahim Yar Khan</option>
                                            <option value="Khanpur" class="tehsil-option" data-district-id="Rahim Yar Khan">
                                                Khanpur</option>
                                            <option value="Liaquatpur" class="tehsil-option"
                                                data-district-id="Rahim Yar Khan">Liaquatpur</option>
                                            <option value="Sadiqabad" class="tehsil-option"
                                                data-district-id="Rahim Yar Khan">Sadiqabad</option>
                                            <!-- Gujrat Tehsils -->
                                            <option value="Gujrat" class="tehsil-option" data-district-id="Gujrat">Gujrat
                                            </option>
                                            <option value="Kharian" class="tehsil-option" data-district-id="Gujrat">Kharian
                                            </option>
                                            <option value="Sarai Alamgir" class="tehsil-option" data-district-id="Gujrat">
                                                Sarai Alamgir</option>
                                            <!-- Kasur Tehsils -->
                                            <option value="Kasur" class="tehsil-option" data-district-id="Kasur">Kasur
                                            </option>
                                            <option value="Chunian" class="tehsil-option" data-district-id="Kasur">Chunian
                                            </option>
                                            <option value="Kot Radha Kishan" class="tehsil-option" data-district-id="Kasur">
                                                Kot Radha Kishan</option>
                                            <option value="Pattoki" class="tehsil-option" data-district-id="Kasur">Pattoki
                                            </option>
                                            <!-- Dera Ghazi Khan Tehsils -->
                                            <option value="Dera Ghazi Khan" class="tehsil-option"
                                                data-district-id="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                            <option value="Taunsa" class="tehsil-option" data-district-id="Dera Ghazi Khan">
                                                Taunsa</option>
                                            <option value="Tribal Area" class="tehsil-option"
                                                data-district-id="Dera Ghazi Khan">Tribal Area</option>
                                            <!-- Sahiwal Tehsils -->
                                            <option value="Sahiwal" class="tehsil-option" data-district-id="Sahiwal">Sahiwal
                                            </option>
                                            <option value="Chichawatni" class="tehsil-option" data-district-id="Sahiwal">
                                                Chichawatni</option>
                                            <!-- Okara Tehsils -->
                                            <option value="Okara" class="tehsil-option" data-district-id="Okara">Okara
                                            </option>
                                            <option value="Depalpur" class="tehsil-option" data-district-id="Okara">Depalpur
                                            </option>
                                            <option value="Renala Khurd" class="tehsil-option" data-district-id="Okara">
                                                Renala Khurd</option>
                                            <!-- Muzaffargarh Tehsils -->
                                            <option value="Muzaffargarh" class="tehsil-option"
                                                data-district-id="Muzaffargarh">Muzaffargarh</option>
                                            <option value="Alipur" class="tehsil-option" data-district-id="Muzaffargarh">
                                                Alipur</option>
                                            <option value="Jatoi" class="tehsil-option" data-district-id="Muzaffargarh">
                                                Jatoi</option>
                                            <option value="Kot Addu" class="tehsil-option" data-district-id="Muzaffargarh">
                                                Kot Addu</option>
                                            <!-- Chiniot Tehsils -->
                                            <option value="Chiniot" class="tehsil-option" data-district-id="Chiniot">Chiniot
                                            </option>
                                            <option value="Bhowana" class="tehsil-option" data-district-id="Chiniot">Bhowana
                                            </option>
                                            <option value="Lalian" class="tehsil-option" data-district-id="Chiniot">Lalian
                                            </option>
                                            <!-- Khanewal Tehsils -->
                                            <option value="Khanewal" class="tehsil-option" data-district-id="Khanewal">
                                                Khanewal</option>
                                            <option value="Jahanian" class="tehsil-option" data-district-id="Khanewal">
                                                Jahanian</option>
                                            <option value="Kabirwala" class="tehsil-option" data-district-id="Khanewal">
                                                Kabirwala</option>
                                            <option value="Mian Channu" class="tehsil-option" data-district-id="Khanewal">
                                                Mian Channu</option>
                                            <!-- Mianwali Tehsils -->
                                            <option value="Mianwali" class="tehsil-option" data-district-id="Mianwali">
                                                Mianwali</option>
                                            <option value="Isa Khel" class="tehsil-option" data-district-id="Mianwali">Isa
                                                Khel</option>
                                            <option value="Piplan" class="tehsil-option" data-district-id="Mianwali">Piplan
                                            </option>
                                            <!-- Vehari Tehsils -->
                                            <option value="Vehari" class="tehsil-option" data-district-id="Vehari">Vehari
                                            </option>
                                            <option value="Burewala" class="tehsil-option" data-district-id="Vehari">
                                                Burewala</option>
                                            <option value="Mailsi" class="tehsil-option" data-district-id="Vehari">Mailsi
                                            </option>
                                            <!-- Bahawalnagar Tehsils -->
                                            <option value="Bahawalnagar" class="tehsil-option"
                                                data-district-id="Bahawalnagar">Bahawalnagar</option>
                                            <option value="Chishtian" class="tehsil-option" data-district-id="Bahawalnagar">
                                                Chishtian</option>
                                            <option value="Fort Abbas" class="tehsil-option"
                                                data-district-id="Bahawalnagar">Fort Abbas</option>
                                            <option value="Haroonabad" class="tehsil-option"
                                                data-district-id="Bahawalnagar">Haroonabad</option>
                                            <option value="Minchinabad" class="tehsil-option"
                                                data-district-id="Bahawalnagar">Minchinabad</option>
                                            <!-- Attock Tehsils -->
                                            <option value="Attock" class="tehsil-option" data-district-id="Attock">Attock
                                            </option>
                                            <option value="Fateh Jang" class="tehsil-option" data-district-id="Attock">Fateh
                                                Jang</option>
                                            <option value="Hazro" class="tehsil-option" data-district-id="Attock">Hazro
                                            </option>
                                            <option value="Hassan Abdal" class="tehsil-option" data-district-id="Attock">
                                                Hassan Abdal</option>
                                            <option value="Jand" class="tehsil-option" data-district-id="Attock">Jand
                                            </option>
                                            <option value="Pindi Gheb" class="tehsil-option" data-district-id="Attock">Pindi
                                                Gheb</option>
                                            <!-- Chakwal Tehsils -->
                                            <option value="Chakwal" class="tehsil-option" data-district-id="Chakwal">Chakwal
                                            </option>
                                            <option value="Choa Saidan Shah" class="tehsil-option"
                                                data-district-id="Chakwal">Choa Saidan Shah</option>
                                            <option value="Kallar Kahar" class="tehsil-option" data-district-id="Chakwal">
                                                Kallar Kahar</option>
                                            <option value="Talagang" class="tehsil-option" data-district-id="Chakwal">
                                                Talagang</option>
                                            <!-- Jhelum Tehsils -->
                                            <option value="Jhelum" class="tehsil-option" data-district-id="Jhelum">Jhelum
                                            </option>
                                            <option value="Dina" class="tehsil-option" data-district-id="Jhelum">Dina
                                            </option>
                                            <option value="Pind Dadan Khan" class="tehsil-option" data-district-id="Jhelum">
                                                Pind Dadan Khan</option>
                                            <option value="Sohawa" class="tehsil-option" data-district-id="Jhelum">Sohawa
                                            </option>
                                            <!-- Toba Tek Singh Tehsils -->
                                            <option value="Toba Tek Singh" class="tehsil-option"
                                                data-district-id="Toba Tek Singh">Toba Tek Singh</option>
                                            <option value="Gojra" class="tehsil-option" data-district-id="Toba Tek Singh">
                                                Gojra</option>
                                            <option value="Kamalia" class="tehsil-option" data-district-id="Toba Tek Singh">
                                                Kamalia</option>
                                            <option value="Pirmahal" class="tehsil-option"
                                                data-district-id="Toba Tek Singh">Pirmahal</option>
                                            <!-- Narowal Tehsils -->
                                            <option value="Narowal" class="tehsil-option" data-district-id="Narowal">Narowal
                                            </option>
                                            <option value="Shakargarh" class="tehsil-option" data-district-id="Narowal">
                                                Shakargarh</option>
                                            <option value="Zafarwal" class="tehsil-option" data-district-id="Narowal">
                                                Zafarwal</option>
                                            <!-- Hafizabad Tehsils -->
                                            <option value="Hafizabad" class="tehsil-option" data-district-id="Hafizabad">
                                                Hafizabad</option>
                                            <option value="Pindi Bhattian" class="tehsil-option"
                                                data-district-id="Hafizabad">Pindi Bhattian</option>
                                            <!-- Lodhran Tehsils -->
                                            <option value="Lodhran" class="tehsil-option" data-district-id="Lodhran">Lodhran
                                            </option>
                                            <option value="Dunyapur" class="tehsil-option" data-district-id="Lodhran">
                                                Dunyapur</option>
                                            <option value="Kahror Pacca" class="tehsil-option" data-district-id="Lodhran">
                                                Kahror Pacca</option>
                                            <!-- Mandi Bahauddin Tehsils -->
                                            <option value="Mandi Bahauddin" class="tehsil-option"
                                                data-district-id="Mandi Bahauddin">Mandi Bahauddin</option>
                                            <option value="Malakwal" class="tehsil-option"
                                                data-district-id="Mandi Bahauddin">Malakwal</option>
                                            <option value="Phalia" class="tehsil-option" data-district-id="Mandi Bahauddin">
                                                Phalia</option>
                                            <!-- Pakpattan Tehsils -->
                                            <option value="Pakpattan" class="tehsil-option" data-district-id="Pakpattan">
                                                Pakpattan</option>
                                            <option value="Arifwala" class="tehsil-option" data-district-id="Pakpattan">
                                                Arifwala</option>
                                            <!-- Nankana Sahib Tehsils -->
                                            <option value="Nankana Sahib" class="tehsil-option"
                                                data-district-id="Nankana Sahib">Nankana Sahib</option>
                                            <option value="Sangla Hill" class="tehsil-option"
                                                data-district-id="Nankana Sahib">Sangla Hill</option>
                                            <option value="Shahkot" class="tehsil-option" data-district-id="Nankana Sahib">
                                                Shahkot</option>
                                            <!-- Layyah Tehsils -->
                                            <option value="Layyah" class="tehsil-option" data-district-id="Layyah">Layyah
                                            </option>
                                            <option value="Chaubara" class="tehsil-option" data-district-id="Layyah">
                                                Chaubara</option>
                                            <option value="Karor Lal Esan" class="tehsil-option" data-district-id="Layyah">
                                                Karor Lal Esan</option>
                                            <!-- Rajanpur Tehsils -->
                                            <option value="Rajanpur" class="tehsil-option" data-district-id="Rajanpur">
                                                Rajanpur</option>
                                            <option value="Jampur" class="tehsil-option" data-district-id="Rajanpur">Jampur
                                            </option>
                                            <option value="Rojhan" class="tehsil-option" data-district-id="Rajanpur">Rojhan
                                            </option>
                                            <!-- Khushab Tehsils -->
                                            <option value="Khushab" class="tehsil-option" data-district-id="Khushab">Khushab
                                            </option>
                                            <option value="Noorpur Thal" class="tehsil-option" data-district-id="Khushab">
                                                Noorpur Thal</option>
                                            <option value="Quaidabad" class="tehsil-option" data-district-id="Khushab">
                                                Quaidabad</option>
                                            <!-- Bhakkar Tehsils -->
                                            <option value="Bhakkar" class="tehsil-option" data-district-id="Bhakkar">Bhakkar
                                            </option>
                                            <option value="Darya Khan" class="tehsil-option" data-district-id="Bhakkar">
                                                Darya Khan</option>
                                            <option value="Kallur Kot" class="tehsil-option" data-district-id="Bhakkar">
                                                Kallur Kot</option>
                                            <option value="Mankera" class="tehsil-option" data-district-id="Bhakkar">Mankera
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- Case Title (English) -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Case Title <span class="required">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="p1" name="p1"
                                                placeholder="Party 1 (Plaintiff/Petitioner)" required
                                                onfocusout="text_translate('#p1','#p1_urdu')">
                                            <span class="input-group-text case-title-separator">VS</span>
                                            <input type="text" class="form-control" id="p2" name="p2"
                                                placeholder="Party 2 (Defendant/Respondent)" required
                                                onfocusout="text_translate('#p2','#p2_urdu')">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Case Title (Urdu - عنوان) -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="urdu-font-18 text-align-urdu"><span class="required">*</span>
                                            عنوان</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control urdu-input" id="p1_urdu" name="p1_urdu"
                                                placeholder="فریق اول" onfocus="setEditor(this)">
                                            <span class="input-group-text urdu-separator">بنام</span>
                                            <input type="text" class="form-control urdu-input" id="p2_urdu" name="p2_urdu"
                                                placeholder="فریق دوم" onfocus="setEditor(this)">
                                        </div>
                                        <small class="text-muted">The Urdu title will auto-fill when you enter the English
                                            title, or you can type directly in Urdu</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Institution Details -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="i_date">Institution Date <span class="required">*</span></label>
                                        <input type="date" class="form-control" id="i_date" name="i_date"
                                            value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="i_no">Institution No <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="i_no" name="i_no" placeholder="Inst. No"
                                            required>
                                        <small class="form-text text-danger" id="check_fir" style="display: none;">Already
                                            entered</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="case_no">Case No. (Court)</label>
                                        <input type="text" class="form-control" id="case_no" name="case_no"
                                            placeholder="Case No.">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="a_date">Court Date <span class="required">*</span></label>
                                        <input type="date" class="form-control" id="a_date" name="a_date"
                                            value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cat">Category <span class="required">*</span></label>
                                        <select class="form-control" id="cat" name="cat" onchange="changeCategory();"
                                            required>
                                            <option value="">Select Category</option>
                                            @foreach($cats as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="subcat">Subcategory <span class="required">*</span></label>
                                        <select class="form-control" id="subcat" name="subcat" disabled required>
                                            <option value="">Select Subcategory</option>
                                            @foreach($subcats as $s)
                                                <option value="{{$s->id}}" class="subcat-option" data-cat-id="{{$s->cat_id}}">
                                                    {{$s->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="govt_dept">Govt. Department</label>
                                        <select class="form-control" id="govt_dept" name="govt_dept">
                                            <option value="">Nil</option>
                                            <option value="Board of Revenue">Board of Revenue</option>
                                            <option value="Education Department">Education Department</option>
                                            <option value="Health Department">Health Department</option>
                                            <option value="Police Department">Police Department</option>
                                            <option value="WAPDA">WAPDA</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- CNIC and Contact -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cnic">Person CNIC</label>
                                        <input type="text" class="form-control" id="cnic" name="cnic"
                                            placeholder="XXXXX-XXXXXXX-X">
                                        <small class="form-text text-danger" id="cnic_error" style="display: none;">Invalid
                                            CNIC format</small>
                                        <a href="#" onclick="sendvalue(event)"><small class="form-text text-danger"
                                                id="check_cnic" style="display: none;">CNIC already exists</small></a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="m1">Party 1 Contact</label>
                                        <input type="text" class="form-control" id="m1" name="m1"
                                            placeholder="03XX-XXXXXXX">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="m2">Party 2 Contact</label>
                                        <input type="text" class="form-control" id="m2" name="m2"
                                            placeholder="03XX-XXXXXXX">
                                    </div>
                                </div>
                            </div>

                            <!-- Direction Details -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="direction_from">Direction Issued From</label>
                                        <select class="form-control" id="direction_from" name="direction_from">
                                            <option value="">No Direction</option>
                                            <option value="Supreme Court">Supreme Court</option>
                                            <option value="High Court">Lahore High Court</option>
                                            <option value="D&SJ">District & Sessions Judge</option>
                                            <option value="NJP">National Judicial Policy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkboxes Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>This case includes:</label>
                                        <div class="row gap-3 mt-1">
                                            <div class="col-5 form-check">
                                                <input class="form-check-input" type="checkbox" name="is_juvenile"
                                                    id="is_juvenile" value="1">
                                                <label class="form-check-label" for="is_juvenile">Juvenile</label>
                                            </div>
                                            <div class="col-5 form-check">
                                                <input class="form-check-input" type="checkbox" name="is_overseas"
                                                    id="is_overseas" value="1">
                                                <label class="form-check-label" for="is_overseas">Overseas</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Women involvement:</label>
                                        <div class="row gap-3 mt-1">
                                            <div class="col-5 form-check">
                                                <input class="form-check-input" type="checkbox" name="is_women_petitioner"
                                                    id="is_women_petitioner" value="1">
                                                <label class="form-check-label" for="is_women_petitioner">Petitioner</label>
                                            </div>
                                            <div class="col-5 form-check">
                                                <input class="form-check-input" type="checkbox" name="is_women_respondent"
                                                    id="is_women_respondent" value="1">
                                                <label class="form-check-label" for="is_women_respondent">Respondent</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- ==================== STEP 2: CIVIL INFORMATION ==================== -->
                        <div id="step-2" class="tab-pane" role="tabpanel">

                            <div class="section-header civil">
                                <iconify-icon icon="mdi:scale-balance" class="me-2"></iconify-icon>
                                Appellate Jurisdiction (Appeal/Revision)
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lower_court_case_no">Case No. (Lower Court)</label>
                                        <input type="text" class="form-control" id="lower_court_case_no"
                                            name="lower_court_case_no" placeholder="Lower court case no.">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="app_against">Appeal Against</label>
                                        <select class="form-control" id="app_against" name="app_against">
                                            <option value="">Select</option>
                                            <option value="Interim Order">Interim Order</option>
                                            <option value="Final Order">Final Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="o_date">Order Dated</label>
                                        <input type="date" class="form-control" id="o_date" name="o_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="court_name">Order By</label>
                                        <input type="text" class="form-control" id="court_name" name="court_name"
                                            placeholder="Court/Officer name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stay_granted">Stay Granted</label>
                                        <select class="form-control" id="stay_granted" name="stay_granted">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="suit_valuation">Suit Valuation</label>
                                        <input type="number" class="form-control" id="suit_valuation" name="suit_valuation"
                                            placeholder="Amount">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="civil_jurisdiction">Civil Jurisdiction</label>
                                        <select class="form-control" id="civil_jurisdiction" name="civil_jurisdiction">
                                            <option value="">Select</option>
                                            <option value="Class-I">Class-I</option>
                                            <option value="Class-II">Class-II</option>
                                            <option value="Class-III">Class-III</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cno">Court Room No.</label>
                                        <input type="text" class="form-control" id="cno" name="cno" placeholder="Room No.">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ==================== STEP 3: PROCEEDINGS ==================== -->
                        <div id="step-3" class="tab-pane" role="tabpanel">

                            <div class="section-header proceedings">
                                <iconify-icon icon="mdi:clipboard-list" class="me-2"></iconify-icon>
                                Case Proceeding
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="case_status">Case Status</label>
                                        <select class="form-control" id="case_status" name="case_status">
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Decided">Decided</option>
                                            <option value="Disposed">Disposed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="next_date">Next Date <span class="required">*</span></label>
                                        <input type="date" class="form-control" id="next_date" name="next_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="case_stage">Case Stage <span class="required">*</span></label>
                                        <select class="form-control" id="case_stage" name="case_stage" required>
                                            <option value="">Select Case Stage</option>
                                            <option value="Notice">Notice</option>
                                            <option value="Summon">Summon</option>
                                            <option value="Summon for Record">Summon for Record</option>
                                            <option value="Written Statement">Written Statement</option>
                                            <option value="Amended Written Statement">Amended Written Statement</option>
                                            <option value="Pre-Trial Reconciliation">Pre-Trial Reconciliation</option>
                                            <option value="Evidence of Plaintiff">Evidence of Plaintiff</option>
                                            <option value="Evidence of Defendant">Evidence of Defendant</option>
                                            <option value="Evidence of Petitioner">Evidence of Petitioner</option>
                                            <option value="Cross Examination">Cross Examination of Witnesses</option>
                                            <option value="Documentary Proof">Documentary Proof</option>
                                            <option value="Preliminary Arguments">Preliminary Arguments</option>
                                            <option value="Arguments">Arguments</option>
                                            <option value="Arguments on Application">Arguments on Application</option>
                                            <option value="Final Arguments">Final Arguments</option>
                                            <option value="For Order">For Order</option>
                                            <option value="Compromise">Compromise</option>
                                            <option value="Reply of Application">Reply of Application</option>
                                            <option value="Further Proceedings">Further Proceedings & Appropriate Order
                                            </option>
                                            <option value="Ex-Parte Evidence">Ex-Parte Evidence</option>
                                            <option value="Ex-Parte Arguments">Ex-Parte Arguments</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adjournment_reason">Adjournment Reason</label>
                                        <select class="form-control" id="adjournment_reason" name="adjournment_reason">
                                            <option value="">Nil</option>
                                            <option value="On Request of Both Parties">On Request of Both Parties</option>
                                            <option value="On Request of Plaintiff Party">On Request of Plaintiff Party
                                            </option>
                                            <option value="On Request of Defendant Party">On Request of Defendant Party
                                            </option>
                                            <option value="On Request of Petitioner Party">On Request of Petitioner Party
                                            </option>
                                            <option value="On Request of Respondent Party">On Request of Respondent Party
                                            </option>
                                            <option value="Non Availability of Counsel Plaintiff">Non Availability of
                                                Counsel Plaintiff</option>
                                            <option value="Non Availability of Counsel Defendant">Non Availability of
                                                Counsel Defendant</option>
                                            <option value="Non Availability of Counsel Both">Non Availability of Counsel
                                                Both</option>
                                            <option value="Non Availability of Record">Non Availability of Record</option>
                                            <option value="Non Deposit of Court Fee">Non Deposit of Court Fee</option>
                                            <option value="Non Deposit of Process Fee">Non Deposit of Process Fee</option>
                                            <option value="Strike of Bar">Strike of Bar</option>
                                            <option value="Presiding Officer on Leave">Presiding Officer on Leave</option>
                                            <option value="Presiding Officer Transferred">Presiding Officer Transferred
                                            </option>
                                            <option value="Declared Holiday">Declared Holiday</option>
                                            <option value="Death of Counsel">Death of Counsel</option>
                                            <option value="Misc">Misc.</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="short_order">Short Order</label>
                                        <textarea class="form-control" id="short_order" name="short_order" rows="3"
                                            placeholder="Enter short order details..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cp_remarks">Proceedings Remarks</label>
                                        <textarea class="form-control" id="cp_remarks" name="cp_remarks" rows="3"
                                            placeholder="Any additional remarks..."></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
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
        <!-- SmartWizard JS -->
        <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

        <script>
            // Urdu Tra     nslation Function (uses local proxy to bypass CORS)
            function text_translate(from, to) {
                var english_text = $.trim($(from).val());

                if (english_text !== "") {
                    $.ajax({
                        url: '{{ route("translate.urdu") }}',
                        type: 'POST',
                        data: { english_text: english_text, '_token': '{{ csrf_token() }}' },
                        dataType: 'json',
                        success: function (obj) {
                            if (obj.status === 'success') {
                                $(to).val(obj.urdu_text);
                            }
                        },
                        error: function () {
                            console.log('Translation API not available - manual input required');
                        }
                    });
                } else {
                    $(to).val('');
                }
            }

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


            $(document).ready(function () {
                // Initialize SmartWizard
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'default',
                            autoAdjustHeight: true,
                            transition: { animation: 'slideHorizontal' },
                            toolbar: {
                                position: 'bottom',
                                showNextButton: false,
                                showPreviousButton: false,
                                extraHtml: '<button class="btn btn-secondary sw-btn-prev" type="button"><iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>Previous</button>' +
                                    '<button class="btn btn-primary sw-btn-next" type="button">Next<iconify-icon icon="mdi:arrow-right" class="ms-1"></iconify-icon></button>' +
                                    '<button class="btn btn-success" id="saveBtn" type="button"><iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save & Finish</button>'
                            },
                            anchor: { enableNavigation: true, enableDoneState: true, markPreviousStepsAsDone: true },
                            keyboard: { keyNavigation: false }
                        });

                        // Step validation before moving to next step
                        $("#smartwizard").on("leaveStep", function (e, anchorObject, stepIndex, stepDirection) {
                            if (stepDirection === 'forward') {
                                if (stepIndex === 0) {
                                    let valid = true;
                                    const requiredFields = ['#judge_id', '#district', '#tehsil', '#p1', '#p2', '#i_date', '#i_no', '#a_date', '#cat', '#subcat'];
                                    requiredFields.forEach(field => {
                                        if ($(field).val() === '' || $(field).val() === null) {
                                            $(field).addClass('is-invalid');
                                            valid = false;
                                        } else {
                                            $(field).removeClass('is-invalid');
                                        }
                                    });
                                    if (!valid) {
                                        alert('Please fill all required fields in Basic Details');
                                        return false;
                                    }
                                }
                            }
                            return true;
                        });

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
                                return true;
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
                                $.get("{{ url('cnic') }}/" + c, function (d) { if (d == "found") $('#check_cnic').show(); });
                            }
                        });

                        $('#check_fir').hide();
                        $('#i_no').on('keyup', function () {
                            $('#check_fir').hide();
                            var c = $(this).val();
                            if (c !== '') {
                                $.get("{{ url('fir') }}/" + c, function (d) { if (d == "found") $('#check_fir').show(); });
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

                        // District/Tehsil Handling
                        window.changeTehsil = function () {
                            var d = $('#district').val();
                            if (d == '') {
                                $('#tehsil').val('').prop('disabled', true);
                            } else {
                                $('#tehsil').prop('disabled', false);
                                $('#tehsil .tehsil-option').hide().filter('[data-district-id="' + d + '"]').show();
                                $('#tehsil').val('');
                            }
                        };

                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

                        // Save & Finish Button
                        $(document).on('click', '#saveBtn', function (e) {
                            e.preventDefault();

                            let valid = true;
                            const requiredFields = ['#next_date', '#case_stage'];
                            requiredFields.forEach(field => {
                                if ($(field).val() === '' || $(field).val() === null) {
                                    $(field).addClass('is-invalid');
                                    valid = false;
                                } else {
                                    $(field).removeClass('is-invalid');
                                }
                            });

                            if (!valid) {
                                alert('Please fill all required fields in Proceedings');
                                return false;
                            }

                            var cv = $('#cnic').val().trim();
                            if (cv !== '' && cv !== '_____-_______-_' && !validateCNIC()) {
                                $('#smartwizard').smartWizard("goToStep", 0);
                                $('#cnic').focus();
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
                                    $('#saveBtn').html('<iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>Save & Finish');
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
                                var f = document.createElement('form'); f.method = 'POST'; f.action = '{{ route("excases") }}'; f.target = '_blank';
                                var t = document.createElement('input'); t.type = 'hidden'; t.name = '_token'; t.value = '{{ csrf_token() }}'; f.appendChild(t);
                                var i = document.createElement('input'); i.type = 'hidden'; i.name = 'id'; i.value = c; f.appendChild(i);
                                document.body.appendChild(f); f.submit(); document.body.removeChild(f);
                            }
                        };

                        $('#cameraModal').on('shown.bs.modal', function () { Webcam.attach('#my_camera'); });
                        $('#cameraModal').on('hidden.bs.modal', function () { Webcam.reset(); });
                    });
                </script>
    @endpush

@endsection