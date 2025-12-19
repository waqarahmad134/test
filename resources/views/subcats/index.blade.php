@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops!</strong> There were some problems with your input.
    <ul class="mb-0">
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

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
</style>

<div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h5 class="title-5 mb-4">Subcategory Management</h5>
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
            <button class="btn btn-success text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2" id="createNewProduct">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Create New Subcategory
            </button>
        </div>
        
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcats as $index => $subcat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $subcat->name }}</td>
                        <td>{{ $subcat->cname($subcat->cat_id) }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm editProduct" data-id="{{ $subcat->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm deleteProduct" data-id="{{ $subcat->id }}">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No subcategories found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24 w-100">
            <p class="text-sm text-secondary-light mb-0">
                Showing {{ $subcats->count() }} of {{ $subcats->count() }} entries
            </p>
        </div>
    </div>
</div>

<!-- Modal - New UI -->
<div class="modal fade" id="ajaxModel" tabindex="-1" aria-labelledby="ajaxModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Create/Edit Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group mb-3">
                        <label for="name"><strong>Name:</strong></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Subcategory Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cat_id"><strong>Category:</strong></label>
                        <select class="form-control" id="cat_id" name="cat_id" required>
                            <option value="">Select Category</option>
                            @foreach($cats as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        // Setup AJAX for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create New Product
        $('#createNewProduct').click(function () {
            $('#saveBtn').val("create-subcategory");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#myModalLabel').html("Create New Subcategory");
            $('#ajaxModel').modal('show');
        });

        // Edit Product
        $(document).on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ route('subcats.index') }}" + '/' + product_id + '/edit', function (data) {
                $('#myModalLabel').html("Edit Subcategory");
                $('#saveBtn').val("edit-subcategory");
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#cat_id').val(data.cat_id);
            });
        });

        // Save Button - Use form submit instead of button click
        $('#productForm').on('submit', function (e) {
            e.preventDefault();
            
            // Check if form is valid
            if (!this.checkValidity()) {
                $(this).addClass('was-validated');
                return false;
            }
            
            $('#saveBtn').html('Saving...');

            $.ajax({
                data: $(this).serialize(),
                url: "{{ route('subcats.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#productForm').trigger("reset");
                    $('#productForm').removeClass('was-validated');
                    $('#ajaxModel').modal('hide');
                    // Reload page to show updated data
                    location.reload();
                },
                error: function (xhr) {
                    console.log('Error:', xhr);
                    $('#saveBtn').html('Save');
                    var err = xhr.responseJSON || {};
                    alert(err.message || 'An error occurred, please try again.');
                }
            });
        });

        // Delete Product
        $(document).on('click', '.deleteProduct', function () {
            var product_id = $(this).data("id");
            if (!confirm("Are you sure you want to delete this subcategory?")) {
                return false;
            }

            $.ajax({
                type: "DELETE",
                url: "{{ route('subcats.store') }}" + '/' + product_id,
                success: function (data) {
                    // Reload page to show updated data
                    location.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                    alert('An error occurred, please try again.');
                }
            });
        });

        // Modal Close Handler
        $('#ajaxModel').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
            $(this).data('bs.modal', null);
            $(this).attr('aria-hidden', 'true');
            $(this).removeClass('show');
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '');
            $(this).find('form').trigger('reset');
        });
    });
</script>
@endpush

@endsection
