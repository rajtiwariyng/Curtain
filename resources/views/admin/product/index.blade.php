@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')

<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Product <span class="fw-normal text-muted">({{ count($products) }})</span></h6>
        <a href="{{ route('products.create') }}" class="primary-btn addBtn">+ Add
            Product</a>
    </div>
    <div class="dataOverview mt-3">
        <div class="d-flex align-items-center justify-content-end mb-3">
            <a class="secondary-btn me-2 addBtn" href="{{ url('products/download/csv') }}"><i class="bi bi-cloud-arrow-down me-2"></i>
                Export Data</a>
            <a class="secondary-btn addBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"><i class="bi bi-filter me-2"></i> Filter</a>
        </div>
        <div class="table-responsive">
            <table class="table" id="projectsTable">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <!-- <th>Product Name</th> -->
                        <th>Tally Code</th>
                        <th>SKU</th>
                        <th>MRP</th>
                        <!-- <th>Unit</th> -->

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-10">
                            <a href="{{ asset('storage/' . $product->image) }}" data-fancybox
                                data-caption="{{ $product->tally_code }}">
                                <img class="tabelImage" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->image_alt }}" />
                            </a>

                        </td>
                        <!-- <td>{{ $product->product_name }}</td> -->
                        <td>{{ $product->tally_code }}</td>
                        <td>{{ $product->design_sku }}</td>
                        <td>{{ $product->mrp }}</td>
                        <!-- <td>{{ $product->unit }}</td> -->
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item small"
                                            href="{{ route('products.edit', $product->id) }}">Edit</a></li>
                                    <li>
                                        <a class="dropdown-item small viewProductLink" data-bs-toggle="offcanvas"
                                            href="#ProductView" role="button" aria-controls="ProductView"
                                            data-product-id="{{ $product->id }}">
                                            View
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item small" href="javascript:"
                                            onclick="openDeleteModal({{ $product->id }})">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Offcanvas Sidebar -->
<div class="offcanvas ProductViewSidebar offcanvas-start" tabindex="-1" id="ProductView"
    aria-labelledby="ProductViewLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="ProductViewLabel">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <table class="table table-hover">
            <tbody id="offcanvas-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Type</th>
                                <td>{{ $product->productType->product_type ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>{{ $product->tally_code ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>File Number</th>
                                <td>{{ $product->file_number ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Supplier Name</th>
                                <td>{{ $product->Supplier->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Supplier Collection</th>
                                <td>{{ $product->SupplierCollection->collection_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Supplier Collection Design</th>
                                <td>{{ $product->SupplierCollectionDesign->design_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Design SKU</th>
                                <td>{{ $product->design_sku ??'' }}</td>
                            </tr>
                            @if(!empty($product->width))
                            <tr>
                                <th>Width</th>
                                <td>{{ $product->width ?? '' }}</td>
                            </tr>
                            @endif

                            @if(!empty($product->rubs_martendale))
                            <tr>
                                <th>Rubs Martendale</th>
                                <td>{{ $product->rubs_martendale ?? '' }} </td>
                            </tr>
                            @endif
                            <tr>
                                <th>Usage</th>
                                <td>
                                    {{ $product->usage ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Type (Technical specs)</th>
                                <td>{{ $product->type  ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Design Type</th>
                                <td>{{ $product->design_type  ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Color</th>
                                <td>{{ $product->colour  ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Composition</th>
                                <td>{{ $product->composition  ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <td>{{ $product->note  ?? ''}}</td>
                            </tr>

                            <tr>
                                <th>Image Gallery</th>
                                <td>
                                    @if(!empty($product))
                                    <a href="{{ asset('storage/' . $product->image) }}" data-fancybox
                                        data-caption="{{ $product->tally_code }}">
                                        <img class="tabelImage" src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->image_alt }}" />
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $product->created_at ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $product->updated_at  ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </tbody>
        </table>
    </div>
</div>

<!-- Filter Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title" id="FilterSidebarLabel">Add Filters</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form action="{{ url('products') }}" method="get" id="fiter_form">
        <div class="offcanvas-body">
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Type</label>
                <select class="form-select w-100" id="type" name="type" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Supplier Name</label>
                <select name="supplier_name" id="supplier_name" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Supplier Collection</label>
                <select name="supplier_collection" id="supplier_collection" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Supplier Collection Design</label>
                <select name="supplier_collection_design" id="supplier_collection_design" class="form-select w-100" aria-label="Default select example">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="mb-1 w-100">
                <label for="TallyCodeInput" class="form-label mb-1">MRP From</label>
                <input type="range" class="w-100" id="TallyCodeInput">
                <div class="values d-flex justify-content-between">
                    <span class="text-muted">₹100</span>
                    <span class="text-muted">₹1000</span>
                </div>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Colour</label>
                <select name="colour" id="colour" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($colours as $colour)
                    <option value="{{ $colour->id }}">{{ $colour->color }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Composition</label>
                <select name="composition" id="composition" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($compositions as $composition)
                    <option value="{{ $composition->id }}">{{ $composition->composition }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Usage</label>
                <select name="usage" id="usage" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($usages as $ug => $usage)
                    <option value="{{ $usage->id }}">{{ $usage->usages }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2 w-100">
                <label class="form-label m-0 mb-1">Design Type</label>
                <select name="design_type" id="design_type" class="form-select w-100" aria-label="Default select example">
                    <option selected>Select</option>
                    @foreach ($designTypes as $dt => $designType)
                    <option value="{{ $designType->id }}"> {{ $designType->design_type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="offcanvas-footer">
            <div class="d-flex justify-content-start p-3 border-top">
                <!-- <button type="button" class="secondary-btn me-2 addBtn" id="clearBtn" name="clearBtn" data-bs-dismiss="offcanvas">Clear</button> -->
                <button type="button" class="secondary-btn me-2 addBtn" id="clearBtn" name="clearBtn" data-bs-dismiss="offcanvas">Clear</button>
                <button type="submit" class="primary-btn addBtn">Apply</button>
            </div>
        </div>
    </form>
</div>
<!-- Filter Sidebar end -->


<!-- delete modal start -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteUserForm" method="POST"
                action="{{ route('products.destroy', ['product' => '__product_id__']) }}" autocomplete="off">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- delete modal end -->

@endsection
@section('script')
<script>
    function openDeleteModal(productId) {
        // Update the form action dynamically
        const form = document.getElementById('deleteUserForm');
        const actionUrl = "{{ route('products.destroy', ['product' => ':productId']) }}".replace(':productId', productId);
        form.action = actionUrl;

        // Show the modal (assuming you're using Bootstrap's modal)
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
        deleteModal.show();
    }
</script>
<script>
    $(document).ready(function() {
        $('.viewProductLink').on('click', function() {
            var productId = $(this).data('product-id');

            // Send AJAX request to fetch product details
            $.ajax({
                url: '/product/' + productId + '/details', // Change this URL to your actual endpoint
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        var product = response;

                        // Populate the offcanvas with product details
                        $('#ProductViewLabel').text(product.product_name);
                        $('#offcanvas-body').html(`
                            <tr><th class="w-25">Product Type</th><td>${product.product_type.product_type || '-'}</td></tr>
                        <tr><th class="w-25">Tally Code</th><td>${product.tally_code || '-'}</td></tr>
                        <tr><th class="w-25">File Number</th><td>${product.file_number || '-'}</td></tr>
                        <tr><th class="w-25">Supplier Name</th><td>${product.supplier.name || '-'}</td></tr>
                        <tr><th class="w-25">Supplier Collection</th><td>${product.getSupplierCollections || '-'}</td></tr>
                        <tr><th class="w-25">Supplier Collection Design</th><td>${product.collection_design || '-'}</td></tr>
                        <tr><th class="w-25">Image</th>
                            <td>
                                <a href="${product.image}" data-fancybox data-caption="Product Image">
                                    <img class="tableImage" src="${product.image}" alt="Product Image" />
                                </a>
                            </td>
                        </tr>
                        <tr><th class="w-25">Currency</th><td>${product.currency || '-'}</td></tr>
                        <tr><th class="w-25">Supplier Price</th><td>${product.supplier_price || '-'}</td></tr>
                        <tr><th class="w-25">Freight</th><td>${product.freight || '-'}</td></tr>
                        <tr><th class="w-25">Duty %</th><td>${product.duty_percentage || '-'}</td></tr>
                        <tr><th class="w-25">Profit %</th><td>${product.profit_percentage || '-'}</td></tr>
                        <tr><th class="w-25">GST %</th><td>${product.gst_percentage || '-'}</td></tr>
                        <tr><th class="w-25">MRP</th><td>${product.mrp || '-'}</td></tr>
                        <tr><th class="w-25">Unit</th><td>${product.unit || '-'}</td></tr>
                        <tr><th class="w-25">Colour</th><td>${product.colour || '-'}</td></tr>
                        <tr><th class="w-25">Composition</th><td>${product.composition || '-'}</td></tr>
                        <tr><th class="w-25">Design Type</th><td>${product.design_type || '-'}</td></tr>
                        <tr><th class="w-25">Usage</th><td>${product.usage || '-'}</td></tr>
                        <tr><th class="w-25">Note</th><td>${product.note || '-'}</td></tr>
                        `);
                    } else {
                        alert('Product not found');
                    }
                },
                error: function() {
                    alert('Error loading product details.');
                }
            });
        });
    });

    $('#supplier_name').change(function() {
        const supplierId = $(this).val();

        // Clear dependent dropdowns
        $('#supplier_collection').empty().append('<option value="">Select Supplier Collection</option>');
        $('#supplier_collection_design').empty().append('<option value="">Select Supplier Collection Design</option>');

        if (supplierId) {
            // Fetch Supplier Collections
            $.ajax({
                url: `/supplier-collection/${supplierId}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length === 0) {
                        $('#supplier_collection').append('<option value="" disabled>No collections found</option>');
                    } else {
                        data.forEach(item => {
                            $('#supplier_collection').append(`<option value="${item.id}">${item.collection_name}</option>`);
                        });
                    }
                },
                error: function() {
                    alert('Error retrieving collections');
                }
            });
        }
    });

    // Supplier Collection Change Handler
    $('#supplier_collection').change(function() {
        const collectionId = $(this).val();
        const supplierId = $('#supplier_name').val();

        // Clear dependent dropdown
        $('#supplier_collection_design').empty().append('<option value="">Select Supplier Collection Design</option>');

        if (collectionId && supplierId) {
            // Fetch Supplier Collection Designs
            $.ajax({
                url: `/supplier-collection-designs/${supplierId}/${collectionId}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length === 0) {
                        $('#supplier_collection_design').append('<option value="" disabled>No designs found</option>');
                    } else {
                        data.forEach(item => {
                            $('#supplier_collection_design').append(`<option value="${item.id}">${item.design_name}</option>`);
                        });
                    }
                },
                error: function() {
                    alert('Error retrieving designs');
                }
            });
        }
    });
</script>
@endsection