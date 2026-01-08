@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp


@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<style>
body.modal-open {
  overflow: hidden !important;
}

@media only screen and (min-width: 760px) {
  table {
    display: table !important;
  }
}

.dtable-container {
  max-width: 100% !important;

  table {
    white-space: nowrap !important;
    width: 100% !important;
    border-collapse: collapse !important;
  }
}

/* Sticky columns for first two columns */
.sticky-col {
  position: sticky;
  background: #fff;
  z-index: 9;
}

.institution-button-new {
  margin-right: 5px;
}

/* CNIC Validation Styles */
#cnic_new.is-invalid {
  border-color: #dc3545;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 3.6 .4.4.4-.4m0 4.8-.4-.4-.4.4'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right calc(0.375em + 0.1875rem) center;
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
  padding-right: calc(1.5em + 0.75rem);
}

#cnic_new.is-valid {
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

</style>

<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h5 class="title-5 mb-4">Institutions Management</h5>
      </div>
    </div>
  </div>
</div>

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <form action="" method="GET" class="d-flex gap-2">
                <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                    <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request()->per_page == 20 ? 'selected' : '' }}>20</option>
                    <option value="30" {{ request()->per_page == 30 ? 'selected' : '' }}>30</option>
                </select>
                <div class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request()->search }}">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </div>
                <button type="button" class="btn btn-secondary clear-filter-btn" style="display: none;">Clear Filter</button>
            </form>
        </div>
        
        <div class="d-flex gap-2">
            <button class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2 institution-button-new" data-institution-type="civil">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Civil/Family
            </button>
            <button class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2 institution-button-new" data-institution-type="criminal">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Criminal
            </button>
            <button class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2 institution-button-new" data-institution-type="misc">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Misc.
            </button>
        </div>
        
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Action</th>
                        <th scope="col">Institution Type</th>
                        <th scope="col">Picture</th>
                        <th scope="col">CNIC</th>
                        <th scope="col">Party1</th>
                        <th scope="col">Party2</th>
                        <th scope="col">Party1 Contact No</th>
                        <th scope="col">Party2 Contact No</th>
                        <th scope="col">Institution Date</th>
                        <th scope="col">Institution No</th>
                        <th scope="col">Category</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">FIR No</th>
                        <th scope="col">FIR Year</th>
                        <th scope="col">Offence</th>
                        <th scope="col">Police Station</th>
                        <th scope="col">Jurisdiction</th>
                        <th scope="col">Appeal Against</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order By</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Date of Appearance</th>
                        <th scope="col">Court Room No.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cases as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm editProduct" data-id="{{ $product->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteProduct" data-id="{{ $product->id }}">Delete</button>
                            <a href="{{ url('finalprint/'.$product->id) }}" class="btn btn-warning btn-sm" target="_blank">View</a>
                        </td>
                        <td>{{ $product->caset }}</td>
                        <td>
                            @if($product->pic)
                                <img src="{{ url('storage/app/' . $product->pic) }}" alt="" style="width: 50px; height:50px">
                            @endif
                        </td>
                        <td>{{ $product->cnic }}</td>
                        <td>{{ $product->p1 }}</td>
                        <td>{{ $product->p2 }}</td>
                        <td>{{ $product->m1 }}</td>
                        <td>{{ $product->m2 }}</td>
                        <td>{{ $product->i_date }}</td>
                        <td>{{ $product->i_no }}</td>
                        <td>{{ $product->cname($product->cat) }}</td>
                        <td>{{ $product->sname($product->subcat) }}</td>
                        <td>{{ $product->c_type }}</td>
                        <td>{{ $product->fir_no }}</td>
                        <td>{{ $product->fir_year }}</td>
                        <td>{{ $product->offence }}</td>
                        <td>{{ $product->ps_id ? $product->psname($product->ps_id) : '' }}</td>
                        <td>{{ $product->jur }}</td>
                        <td>{{ $product->app_against }}</td>
                        <td>{{ $product->o_date }}</td>
                        <td>{{ $product->court_name }}</td>
                        <td>{{ $product->jname($product->judge_id) }}</td>
                        <td>{{ $product->a_date }}</td>
                        <td>{{ $product->cno }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="25" class="text-center">No cases found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24 w-100">
            <p class="text-sm text-secondary-light mb-0">
                Showing {{ $cases->count() }} of {{ $cases->count() }} entries
            </p>
        </div>
    </div>
</div>


<!-- Institution Modal - New UI -->
<div class="modal fade" id="ajaxModelNew" tabindex="-1" aria-labelledby="ajaxModelNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabelNew">Case Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" onclick="addclass()">
                <div class="container-fluid">

                    <div class="text-center mb-4">
                        <h4>Basic Info</h4>
                    </div>

                    <form id="productFormNew" name="productFormNew" class="needs-validation" novalidate>
                        <input type="hidden" name="product_id" id="product_id_new">
                        <input type="hidden" name="caset" id="caset_new">
                        
                        <div class="row mb-4">
                            <div class="col-md-12 mb-3">
                                <label><strong>Images</strong></label>
                                <div class="border rounded p-3" id="images-container-new" style="min-height: 150px;">
                                    <div class="text-muted text-center py-3" id="no-images-message">No images added yet. Use capture or upload to add images.</div>
                                    <div class="row g-2" id="images-gallery-new"></div>
                                </div>
                                
                                <div class="d-flex gap-2 mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalNew" data-bs-dismiss="modal">
                                        <i class="fa fa-camera mr-2"></i>Capture Image
                                    </button>
                                    <label for="file-upload-new" class="btn btn-success mb-0" style="cursor: pointer;">
                                        <i class="fa fa-upload mr-2"></i>Upload from System
                                    </label>
                                    <input type="file" id="file-upload-new" name="images[]" multiple accept="image/*" style="display: none;">
                                </div>
                                
                                <!-- Hidden inputs for storing image data -->
                                <div id="hidden-images-inputs-new"></div>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cnic_new"><strong>Person CNIC</strong></label>
                                    <input type="text" class="form-control" id="cnic_new" name="cnic" placeholder="XXXXX-XXXXXXX-X" required>
                                    <small class="form-text text-danger" id="cnic_error_new" style="display: none;">Please enter a valid Pakistani CNIC format (XXXXX-XXXXXXX-X)</small>
                                    <a href="#" onclick="sendvalueNew(event)" target="_blank">
                                        <small class="form-text text-danger" id="check_new">CNIC already exists</small>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="p1_new"><strong>Party1</strong></label>
                                    <input type="text" class="form-control" id="p1_new" name="p1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="p2_new"><strong>Party2</strong></label>
                                    <input type="text" class="form-control" id="p2_new" name="p2">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="m1_new"><strong>Party1 Contact No</strong></label>
                                <input type="text" class="form-control" id="m1_new" name="m1">
                            </div>
                            <div class="col-md-6">
                                <label for="m2_new"><strong>Party2 Contact No</strong></label>
                                <input type="text" class="form-control" id="m2_new" name="m2">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="i_date_new"><strong>Institution Date</strong></label>
                                <input type="date" class="form-control" id="i_date_new" name="i_date" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="i_no_new"><strong>Institution No</strong></label>
                                <input type="text" class="form-control" id="i_no_new" name="i_no">
                                <small class="form-text text-danger" id="check1_new">Case already entered 4 times</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cat_new"><strong>Category</strong></label>
                                <select class="form-control" id="cat_new" name="cat" onchange="changeNew();">
                                    <option value="">Select:</option>
                                    @foreach($cats as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="subcat_new"><strong>Subcategory</strong></label>
                                <select class="form-control" id="subcat_new" name="subcat" disabled>
                                    <option value="">Select:</option>
                                    @foreach($subcats as $s)
                                    <option value="{{$s->id}}" class="subcat-option-new" data-cat-id="{{$s->cat_id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="judge_id_new"><strong>Assigned To</strong></label>
                            <select class="form-control" id="judge_id_new" name="judge_id">
                                <option value="">Select:</option>
                                @foreach($judges as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cno_new"><strong>Court Room No.</strong></label>
                                <input type="text" class="form-control" id="cno_new" name="cno">
                            </div>
                            <div class="col-md-6">
                                <label for="a_date_new"><strong>Date of Appearance</strong></label>
                                <input type="date" class="form-control" id="a_date_new" name="a_date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div id="criminal_details_new" style="display: none;">
                            <div class="text-center mb-4">
                                <h4>Criminal Detail</h4>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="c_type_new"><strong>Case Type</strong></label>
                                    <select class="form-control" id="c_type_new" name="c_type">
                                        <option value="">Select</option>
                                        <option value="NA">NA</option>
                                        <option value="FIR">FIR</option>
                                        <option value="Private Complaint">Private Complaint</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fir_no_new"><strong>FIR No</strong></label>
                                    <input type="text" class="form-control" id="fir_no_new" name="fir_no">
                                </div>
                                <div class="col-md-6">
                                    <label for="fir_year_new"><strong>FIR Year</strong></label>
                                    <input type="text" class="form-control" id="fir_year_new" name="fir_year">
                                </div>
                                <div class="col-md-6">
                                    <label for="offence_new"><strong>Offence</strong></label>
                                    <input type="text" class="form-control" id="offence_new" name="offence">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="ps_id_new"><strong>Police Station</strong></label>
                                <select class="form-control" id="ps_id_new" name="ps_id">
                                    <option value="">Select:</option>
                                    @foreach($pss as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="civil_details_new" style="display: none;">
                            <div class="text-center mb-4">
                                <h4>Appeal Detail</h4>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jur_new"><strong>Appellant Jurisdiction</strong></label>
                                    <select class="form-control" id="jur_new" name="jur">
                                        <option value="">Select</option>
                                        <option value="Appellant Jurisdiction (Appeal/Revision)">Appellant Jurisdiction (Appeal/Revision)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="app_against_new"><strong>Appeal Against</strong></label>
                                    <input type="text" class="form-control" id="app_against_new" name="app_against">
                                </div>
                                <div class="col-md-6">
                                    <label for="o_date_new"><strong>Order Dated</strong></label>
                                    <input type="date" class="form-control" id="o_date_new" name="o_date" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="court_name_new"><strong>Order By</strong></label>
                                    <input type="text" class="form-control" id="court_name_new" name="court_name">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mt-4">
                            <button type="submit" class="btn btn-success" id="saveBtnNew" value="create">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Camera Modal - New UI -->
<div class="modal fade text-center" id="exampleModalNew" tabindex="-1" aria-labelledby="exampleModalNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-sm">

            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title mx-auto" id="exampleModalNewLabel">Capture Image</h5>
                <button type="button" class="btn-close position-absolute" style="right: 15px;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 pt-0">
                <form id="productForm1New" name="productForm1New" class="form-horizontal">
                    <input type="hidden" name="product_id" id="product_id_cam_new">

                    <div class="camera-box my-3 p-2 border rounded bg-light">
                        <div id="my_camera_new" class="w-100 rounded" style="max-width: 100%; height: auto; aspect-ratio: 4 / 3; overflow: hidden;"></div>
                    </div>

                    <input type="hidden" name="image" class="image-tag-new">

                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary px-4" onclick="take_snapshot_new()" data-bs-dismiss="modal">
                            <i class="fa fa-camera mr-2"></i>Take Snapshot
                        </button>
                    </div>
                </form>
            </div>

            <div class="modal-footer border-0"></div>

        </div>
    </div>
</div>


@push('scripts')
<!-- jQuery InputMask Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

<script>
    // ============ NEW UI JAVASCRIPT LOGIC ============
    
    // ============ MULTIPLE IMAGE HANDLING ============
    let capturedImagesNew = []; // Array to store captured images (base64)
    let uploadedImagesNew = []; // Array to store uploaded file objects
    
    // Initialize image arrays when modal opens
    function initializeImagesNew() {
        capturedImagesNew = [];
        uploadedImagesNew = [];
        updateImagesDisplayNew();
    }
    
    // Update the images gallery display
    function updateImagesDisplayNew() {
        const gallery = $('#images-gallery-new');
        const noImagesMsg = $('#no-images-message');
        const hiddenInputs = $('#hidden-images-inputs-new');
        
        // Clear only non-existing images (keep existing image inputs)
        gallery.find('.image-item-wrapper').not('[data-existing="true"]').closest('.col-md-3').remove();
        hiddenInputs.find('input[name^="captured_images"]').remove();
        
        const totalImages = capturedImagesNew.length + uploadedImagesNew.length;
        const existingImages = gallery.find('[data-existing="true"]').length;
        
        if (totalImages === 0 && existingImages === 0) {
            noImagesMsg.show();
        } else {
            noImagesMsg.hide();
            
            // Display captured images
            capturedImagesNew.forEach((imgData, index) => {
                const imageId = 'captured_' + index;
                const col = $('<div class="col-md-3 col-sm-4 col-6"></div>');
                const wrapper = $('<div class="image-item-wrapper"></div>');
                const img = $('<img src="' + imgData + '" alt="Captured Image">');
                const removeBtn = $('<button type="button" class="remove-image-btn" data-image-id="' + imageId + '" data-type="captured" data-index="' + index + '">&times;</button>');
                
                wrapper.append(img).append(removeBtn);
                col.append(wrapper);
                gallery.append(col);
            });
            
            // Display uploaded images
            uploadedImagesNew.forEach((file, index) => {
                const imageId = 'uploaded_' + index;
                const col = $('<div class="col-md-3 col-sm-4 col-6"></div>');
                const wrapper = $('<div class="image-item-wrapper"></div>');
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = $('<img src="' + e.target.result + '" alt="Uploaded Image">');
                    const removeBtn = $('<button type="button" class="remove-image-btn" data-image-id="' + imageId + '" data-type="uploaded" data-index="' + index + '">&times;</button>');
                    
                    wrapper.append(img).append(removeBtn);
                    col.append(wrapper);
                    gallery.append(col);
                };
                reader.readAsDataURL(file);
            });
        }
    }
    
    // Handle file upload
    $('#file-upload-new').on('change', function(e) {
        const files = Array.from(e.target.files);
        
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                uploadedImagesNew.push(file);
            }
        });
        
        updateImagesDisplayNew();
        // Reset file input to allow selecting same file again
        $(this).val('');
    });
    
    // Handle image removal
    $(document).on('click', '.remove-image-btn', function() {
        const type = $(this).data('type');
        const index = $(this).data('index');
        
        if (type === 'captured') {
            capturedImagesNew.splice(index, 1);
            updateImagesDisplayNew();
        } else if (type === 'uploaded') {
            uploadedImagesNew.splice(index, 1);
            updateImagesDisplayNew();
        } else if (type === 'existing') {
            // Mark existing image for deletion
            $('input[name="existing_image"]').attr('name', 'delete_existing_image');
            $(this).closest('.col-md-3').remove();
            // Show no images message if no images left
            if ($('#images-gallery-new .col-md-3').length === 0) {
                $('#no-images-message').show();
            }
        }
    });
    
    // ============ END MULTIPLE IMAGE HANDLING ============
    
    $(document).ready(function() {
        // Initialize InputMask for Pakistani CNIC format: XXXXX-XXXXXXX-X
        $('#cnic_new').inputmask({
            mask: '99999-9999999-9',
            placeholder: 'XXXXX-XXXXXXX-X',
            showMaskOnHover: true,
            showMaskOnFocus: true,
            clearIncomplete: true
        });
        
        // CNIC Validation Pattern: XXXXX-XXXXXXX-X (5 digits, hyphen, 7 digits, hyphen, 1 digit)
        var cnicPattern = /^\d{5}-\d{7}-\d{1}$/;
        
        // CNIC Format Validation for New UI
        function validateCNIC() {
            var cnicValue = $('#cnic_new').inputmask('unmaskedvalue'); // Get unmasked value
            var cnicDisplayValue = $('#cnic_new').val(); // Get displayed value with mask
            var cnicError = $('#cnic_error_new');
            var checkNew = $('#check_new');
            var cnicInput = $('#cnic_new');
            
            if (cnicDisplayValue === '' || cnicValue === '') {
                cnicError.hide();
                checkNew.hide();
                cnicInput.removeClass('is-invalid is-valid');
                return false;
            }
            
            // Check if mask is complete (all digits filled)
            if (cnicValue.length === 13 && cnicPattern.test(cnicDisplayValue)) {
                cnicError.hide();
                cnicInput.removeClass('is-invalid').addClass('is-valid');
                return true;
            } else {
                cnicError.show();
                cnicInput.removeClass('is-valid').addClass('is-invalid');
                checkNew.hide();
                return false;
            }
        }
        
        // Validate on blur
        $('#cnic_new').on('blur', validateCNIC);
        
        // Validate on input (real-time feedback)
        $('#cnic_new').on('input', function() {
            var cnicValue = $(this).inputmask('unmaskedvalue');
            // Only show validation feedback if user has typed enough characters
            if (cnicValue.length >= 5) {
                validateCNIC();
            } else {
                $('#cnic_error_new').hide();
                $(this).removeClass('is-invalid is-valid');
            }
        });
        
        // CNIC Check for New UI (duplicate check)
        $('#check_new').hide();
        $('#cnic_new').on('keyup', function() {
            $('#check_new').hide();
            var code = $(this).val().trim();
            
            // Only check for duplicates if format is valid and complete
            if (code !== '' && code.length === 15 && cnicPattern.test(code)) {
                $.get("cnic" + '/' + code, function(data) {
                    if (data == "found") {
                        $('#check_new').show();
                    }
                })
            }
        });

        // FIR Check for New UI
        $('#check1_new').hide();
        $('#i_no_new').on('keyup', function() {
            $('#check1_new').hide();
            var code = $('#i_no_new').val();
            if (code !== '') {
                $.get("fir" + '/' + code, function(data) {
                    if (data == "found") {
                        $('#check1_new').show();
                    }
                })
            }
        });

        // Category Change for New UI
        window.changeNew = function() {
            var cat = document.getElementById("cat_new").value;
            if (cat == '') {
                document.getElementById("subcat_new").value = '';
                document.getElementById("subcat_new").disabled = true;
            } else {
                document.getElementById("subcat_new").disabled = false;
                $('#subcat_new .subcat-option-new').hide();
                $('#subcat_new .subcat-option-new[data-cat-id="' + cat + '"]').show();
            }
        }

        // Setup AJAX for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Institution Type Buttons - New UI
        var institutionTypeNew = '';
        $('.institution-button-new').click(function() {
            institutionTypeNew = $(this).data('institution-type');
            
            $('#institution_type_new').val(institutionTypeNew);
            $('#saveBtnNew').val("create-product");
            $('#product_id_new').val('');
            $('#productFormNew').trigger("reset");
            // Initialize images array for new entry
            initializeImagesNew();
            // Set today's date for date fields
            var today = new Date().toISOString().split('T')[0];
            $('#i_date_new').val(today);
            $('#a_date_new').val(today);
            $('#o_date_new').val(today);
            // Re-initialize CNIC inputmask after form reset
            $('#cnic_new').inputmask('remove');
            $('#cnic_new').inputmask({
                mask: '99999-9999999-9',
                placeholder: 'XXXXX-XXXXXXX-X',
                showMaskOnHover: true,
                showMaskOnFocus: true,
                clearIncomplete: true
            });

            // Set modal title based on institution type
            var modalTitle = "Create New Institution";
            if (institutionTypeNew === 'civil') {
                modalTitle = "Create Civil/Family Institution";
                $('#caset_new').val('Civil/Family Case');
                $('#institution_type_new').val('civil');
            } else if (institutionTypeNew === 'criminal') {
                modalTitle = "Create Criminal Institution";
                $('#caset_new').val('Criminal/Case');
                $('#institution_type_new').val('criminal');
            } else if (institutionTypeNew === 'misc') {
                modalTitle = "Create Misc. Case Institution";
                $('#caset_new').val('Misc. Case');
                $('#institution_type_new').val('misc');
            }
            $('#myModalLabelNew').html(modalTitle);

            $('#ajaxModelNew').modal('show');

            if (institutionTypeNew === 'civil') {
                $('#criminal_details_new').hide();
                $('#civil_details_new').hide();
            } else if (institutionTypeNew === 'criminal') {
                $('#criminal_details_new').show();
                $('#civil_details_new').hide();
            } else if (institutionTypeNew === 'misc') {
                $('#criminal_details_new').hide();
                $('#civil_details_new').show();
            } else {
                $('#criminal_details_new').show();
                $('#civil_details_new').show();
            }
        });

        // Modal Close Handlers - New UI
        $('#ajaxModelNew').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
            $(this).data('bs.modal', null);
            $(this).attr('aria-hidden', 'true');
            $(this).removeClass('show');
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '');
            $(this).find('form').trigger('reset');
            $(this).find('.modal-title').html('Case Details');
            $('#criminal_details_new').show();
            $('#civil_details_new').show();
            // Reset images
            initializeImagesNew();
            // Reset CNIC inputmask
            $('#cnic_new').inputmask('remove');
            $('#cnic_new').removeClass('is-invalid is-valid');
            $('#cnic_error_new').hide();
            $('#check_new').hide();
        });

        $('#exampleModalNew').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
            $(this).data('bs.modal', null);
            $(this).attr('aria-hidden', 'true');
            $(this).removeClass('show');
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '');
            $(this).find('form').trigger('reset');
        });

        // Edit Product - New UI
        $(document).on('click', '.editProduct', function() {
            var product_id = $(this).data('id');
            document.getElementById("subcat_new").disabled = false;

            $.get("{{ route('cases.index') }}" + '/' + product_id + '/edit', function(data) {
                $('#modelHeadingNew').html("Edit Product");
                $('#saveBtnNew').val("edit-user");
                $('#ajaxModelNew').modal('show');
                $('#caset_new').val(data.caset);
                $('#product_id_new').val(data.id);
                // Set CNIC value and re-initialize inputmask
                $('#cnic_new').val(data.cnic);
                $('#cnic_new').inputmask('remove'); // Remove existing mask
                $('#cnic_new').inputmask({
                    mask: '99999-9999999-9',
                    placeholder: 'XXXXX-XXXXXXX-X',
                    showMaskOnHover: true,
                    showMaskOnFocus: true,
                    clearIncomplete: true
                });
                $('#p1_new').val(data.p1);
                $('#p2_new').val(data.p2);
                $('#a_date_new').val(data.a_date);
                $('#cno_new').val(data.cno);
                $('#m1_new').val(data.m1);
                $('#m2_new').val(data.m2);
                $('#i_date_new').val(data.i_date);
                $('#i_no_new').val(data.i_no);
                $('#cat_new').val(data.cat);
                $('#subcat_new').val(data.subcat);
                $('#c_type_new').val(data.c_type);
                $('#fir_no_new').val(data.fir_no);
                $('#fir_year_new').val(data.fir_year);
                $('#offence_new').val(data.offence);
                $('#jur_new').val(data.jur);
                $('#app_against_new').val(data.app_against);
                $('#o_date_new').val(data.o_date);
                $('#court_name_new').val(data.court_name);
                $('#judge_id_new').val(data.judge_id);
                $('#ps_id_new').val(data.ps_id);

                // Load existing image if available
                initializeImagesNew();
                if (data.pic) {
                    var imageUrl = "{{ url('storage/app') }}" + '/' + data.pic;
                    var imagePath = data.pic;
                    // Store existing image path for reference
                    $('#hidden-images-inputs-new').append('<input type="hidden" name="existing_image" value="' + imagePath + '">');
                    // Display existing image
                    var gallery = $('#images-gallery-new');
                    var col = $('<div class="col-md-3 col-sm-4 col-6"></div>');
                    var wrapper = $('<div class="image-item-wrapper" data-existing="true"></div>');
                    var img = $('<img src="' + imageUrl + '" alt="Existing Image">');
                    var removeBtn = $('<button type="button" class="remove-image-btn" data-image-id="existing" data-type="existing">&times;</button>');
                    wrapper.append(img).append(removeBtn);
                    col.append(wrapper);
                    gallery.append(col);
                    $('#no-images-message').hide();
                }

                var casetValue = $('#caset_new').val();

                if (casetValue === 'Civil/Family Case') {
                    modalTitle = "Edit Civil/Family Institution";
                    $('#institution_type_new').val('civil');
                    $('#criminal_details_new').hide();
                    $('#civil_details_new').hide();
                } else if (casetValue === 'Criminal/Case') {
                    modalTitle = "Edit Criminal Institution";
                    $('#institution_type_new').val('criminal');
                    $('#criminal_details_new').show();
                    $('#civil_details_new').hide();
                } else if (casetValue === 'Misc. Case') {
                    modalTitle = "Edit Misc. Case Institution";
                    $('#institution_type_new').val('misc');
                    $('#criminal_details_new').hide();
                    $('#civil_details_new').show();
                }
            })
        });

        // Save Button - New UI
        $('#saveBtnNew').click(function(e) {
            e.preventDefault();
            
            // Validate CNIC format before submission
            var cnicValue = $('#cnic_new').val().trim();
            if (cnicValue !== '') {
                if (!validateCNIC()) {
                    $('#cnic_new').focus();
                    return false;
                }
            }
            
            // Check if form is valid
            var form = document.getElementById('productFormNew');
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return false;
            }
            
            $(this).html('Saving...');

            // Create FormData to handle file uploads
            var formData = new FormData($('#productFormNew')[0]);
            
            // For backward compatibility, send first image as 'image' (base64)
            // Priority: First captured image (base64) for main image field
            if (capturedImagesNew.length > 0) {
                formData.append('image', capturedImagesNew[0]);
                // Add remaining captured images to array
                for (var i = 1; i < capturedImagesNew.length; i++) {
                    formData.append('captured_images[]', capturedImagesNew[i]);
                }
            }
            
            // Add all uploaded files
            uploadedImagesNew.forEach(function(file, index) {
                formData.append('uploaded_images[]', file);
            });
            
            // Add total images count
            var totalImages = capturedImagesNew.length + uploadedImagesNew.length;
            formData.append('total_images', totalImages);
            
            // If no captured images but we have uploaded files, 
            // backend will need to handle the first uploaded file as the main image
            if (capturedImagesNew.length === 0 && uploadedImagesNew.length > 0) {
                formData.append('use_first_uploaded_as_main', '1');
            }

            $.ajax({
                data: formData,
                url: "{{ route('cases.store') }}",
                type: "POST",
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    $('#productFormNew').trigger("reset");
                    // Set today's date for date fields after reset
                    var today = new Date().toISOString().split('T')[0];
                    $('#i_date_new').val(today);
                    $('#a_date_new').val(today);
                    $('#o_date_new').val(today);
                    $('#ajaxModelNew').modal('hide');
                    // Reload page to show updated data
                    location.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                    var err = jQuery.parseJSON(data.responseText);
                    console.log(err.message);
                    alert(err.message);
                    $('#saveBtnNew').html('Save');
                }
            });
        });

        // Delete Product - New UI
        $(document).on('click', '.deleteProduct', function() {
            var product_id = $(this).data("id");
            if (!confirm('Are You sure want to delete ! ')) {
                return false;
            } else {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('cases.store') }}" + '/' + product_id,
                    success: function(data) {
                        // Reload page to show updated data
                        location.reload();
                    },
                    error: function(data) {
                        var err = jQuery.parseJSON(data.responseText);
                        console.log(err.message);
                        alert(err.errors);
                        console.log('Error:', data.responseText);
                    }
                });
            }
        });

        // Webcam Setup - New UI
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        // Attach to different camera element
        window.attachCameraNew = function() {
            Webcam.attach('#my_camera_new');
        }

        // Take Snapshot - New UI
        window.take_snapshot_new = function() {
            Webcam.snap(function(data_uri) {
                $(".image-tag-new").val(data_uri);
                // Add captured image to array
                capturedImagesNew.push(data_uri);
                updateImagesDisplayNew();
                $('#ajaxModelNew').modal('show');
                
                if ($('#institution_type_new').val() === 'civil') {
                    $('#criminal_details_new').hide();
                    $('#civil_details_new').hide();
                } else if ($('#institution_type_new').val() === 'criminal') {
                    $('#criminal_details_new').show();
                    $('#civil_details_new').hide();
                } else if ($('#institution_type_new').val() === 'misc') {
                    $('#criminal_details_new').hide();
                    $('#civil_details_new').show();
                }
            });
        }

        // Helper function for CNIC submission - New UI
        window.sendvalueNew = function(event) {
            event.preventDefault();
            var cnic = document.getElementById('cnic_new').value;

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

        // Attach camera when modal opens
        $('#exampleModalNew').on('shown.bs.modal', function () {
            attachCameraNew();
        });
    });

    // Helper function for modal
    function addclass() {
        $('body').addClass('modal-open');
    }

    // ============ END NEW UI JAVASCRIPT LOGIC ============
</script>
@endpush


@endsection
