@extends('admin.layouts.app')

@section('title', 'Franchise Temp List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Franchise <span
                class="fw-normal text-muted">({{ count($franchiseTempsPending) + count($franchiseTempsReject) + count($franchises)  }})</span></h6>
        <a href="#" class="primary-btn addBtn" data-bs-toggle="modal" data-bs-target="#addFranchiseModal1">+ Add
            Franchise</a>
    </div>

    <div class="dataOverview mt-3">
        <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending"
                        aria-selected="true">Pending <span
                            class="fw-normal small">({{ count($franchiseTempsPending) }})</span></button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-rejected-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-rejected"
                        aria-selected="false">Rejected <span class="fw-normal small">({{ count($franchiseTempsReject) }})</span></button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-confirm-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-confirm" type="button" role="tab" aria-controls="pills-confirm"
                        aria-selected="false">Confirmed <span
                            class="fw-normal small">({{ count($franchises) }})</span></button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <!-- for configm -->
            <div class="tab-pane fade " id="pills-confirm" role="tabpanel" aria-labelledby="pills-confirm-tab"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="confirmFranchise">
                        <thead>
                            <tr>

                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Pincode</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>Registration Type</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($franchises  as $idx => $franchise)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td>{{ $franchise->user->name }}</td>
                                <td>{{ $franchise->user->email }}</td>
                                <td>{{ $franchise->mobile }}</td>
                                <td>{{ $franchise->pincode }}</td>
                                <td>{{ $franchise->city }}</td>
                                <td>{{ $franchise->state }}</td>
                                <td>{{ $franchise->country }}</td>
                                <td>{{ $franchise->address }}</td>
                                <td>{{ $franchise->registerationType }}</td>
                                <td>
                                    <div>
                                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:" id="open-franchise-details-{{ $franchise->id }}" class="dropdown-item" data-id="{{ $franchise->id }}" data-checkType="confirm">View</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- for pending -->
            <div class="tab-pane fade show active" id="pills-pending" role="tabpanel"
                aria-labelledby="pills-pending-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Registration Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($franchiseTempsPending as $idx => $franchisePending)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td>{{ $franchisePending->name }}</td>
                                <td>{{ $franchisePending->email }}</td>
                                <td>{{ $franchisePending->mobile }}</td>
                                <td>{{ $franchisePending->city }}</td>
                                <td>{{ $franchisePending->pincode }}</td>
                                <td>{{ $franchisePending->registerationType }}</td>
                                <td><span class="badge badge-pending">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:" id="open-franchise-details-{{ $franchisePending->id }}" class="dropdown-item" data-id="{{ $franchisePending->id }}" data-checkType="pending">View</a>
                                            </li>
                                            <li>
                                                <a href="javascript:" class="dropdown-item small approve-franchise-btn"
                                                    data-franchise-id="{{ $franchisePending->id }}">Confirm</a>
                                            </li>

                                            <li>
                                                <a href="javascript:" class="dropdown-item small reject-franchise-btn"
                                                    data-franchise-id="{{ $franchisePending->id }}">Reject</a>
                                            </li>
                                            <!-- <li><a class="dropdown-item small" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">Reject</a></li> -->
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- for reject -->
            <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">S/N
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">City</th>
                                <th scope="col">Pincode</th>
                                <th scope="col">Registration Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($franchiseTempsReject as $idx => $franchiseReject)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td>{{ $franchiseReject->name }}</td>
                                <td>{{ $franchiseReject->email }}</td>
                                <td>{{ $franchiseReject->mobile }}</td>
                                <td>{{ $franchiseReject->city }}</td>
                                <td>{{ $franchiseReject->pincode }}</td>
                                <td>{{ $franchiseReject->registerationType }}</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div>
                                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:" id="open-franchise-details-{{ $franchiseReject->id }}" class="dropdown-item" data-id="{{ $franchiseReject->id }}" data-checkType="reject">View</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- View franchise details Offcanvas -->
            <div class="offcanvas FranciseViewSidebar offcanvas-start" tabindex="-1" id="FranciseView" aria-labelledby="FranciseViewLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title fw-bold" id="FranciseViewLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <table class="table table-hover">
                        <tbody></tbody>
                    </table>
                </div>
                <div class="offcanvas-footer">
                    <div class="d-flex justify-content-start p-3 border-top">
                        <button type="button" class="secondary-btn me-2 addBtn" data-bs-dismiss="offcanvas">Cancel</button>
                        <!-- <button type="button" class="primary-btn addBtn">Approve</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Approval Modal -->
<div class="modal fade" id="approveFranchiseModal" tabindex="-1" aria-labelledby="approveFranchiseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="approveFranchiseForm" method="POST"
                action="{{ route('franchise.approve', ['id' => '__franchise_id__']) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="approveFranchiseModalLabel">Approve Franchise</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve this franchise?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectFranchiseModal" tabindex="-1" aria-labelledby="rejectFranchiseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="rejectFranchiseForm" method="POST"
                action="{{ route('franchise.reject', ['id' => '__franchise_id__']) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rejectFranchiseModalLabel">Reject Franchise</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve this franchise?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Franchise Modal Start -->
<div class="modal fade" id="addFranchiseModal1" tabindex="-1" aria-labelledby="addFranchiseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Franchise</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('franchise_temp.store_admin') }}" method="POST" id="contact-form1">
                @csrf
                <input type="hidden" name="status" id="status" value="pending">
                <div class="modal-body">

                    <div class="mb-3 w-100">
                        <label for="NameInput" class="form-label mb-1">Name<span class="requried">*</span></label>
                        <input type="text" class="form-control w-100" id="name" name="name">
                    </div>
                    <div class="mb-3 w-100">
                        <label for="UserEmailInput" class="form-label mb-1">Email ID<span
                                class="requried">*</span></label>
                        <input type="email" class="form-control w-100" id="email" name="email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="contactNumberInput" class="form-label mb-1">Contact Number<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="mobile" name="mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="altcontactNumberInput" class="form-label mb-1">Alternate Contact
                                    Number</label>
                                <input type="number" class="form-control w-100" id="alt_mobile" name="alt_mobile">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="registerationType" class="form-label">Registration Type<span
                                        class="requried">*</span></label>
                                <select name="registerationType" class="form-control form-select w-100" id="registerationType">
                                    <option value="">Select Registration Type</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Company">Company</option>
                                    <option value="Proprietor">Proprietor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="company_name" class="form-label">Company Name <span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control w-100" id="company_name" name="company_name"
                                    placeholder="Enter Company Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="employees" class="form-label">Number of Employees<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="employees" name="employees"
                                    placeholder="Enter Number of Employees">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 w-100">
                        <label for="franchiseAddress" class="form-label mb-1">Address<span
                                class="requried">*</span></label>
                        <textarea name="address" class="form-control w-100" id="address" name="address"
                            style="height: 70px;"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="pincodeInput" class="form-label mb-1">Pincode<span
                                        class="requried">*</span></label>
                                <input type="number" class="form-control w-100" id="pincode" name="pincode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> Country<span
                                        class="requried">*</span></label>
                                <input type="text" class="form-control w-100" id="country" name="country" value="India" required readonly>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> State<span
                                        class="requried">*</span></label>
                                <select name="state" id="state" class="form-control w-100">
                                    <option value="">Select State</option>
                                    @foreach ($groupedCityStateData as $state => $cities)
                                    <option value="{{ $state }}">{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 w-100">
                                <label for="countryInput" class="form-label mb-1"> City<span
                                        class="requried">*</span></label>
                                <select name="city" id="city" class="form-control w-100">
                            <option value="">Select City</option>
                            <!-- Cities will be populated dynamically based on the selected state -->
                        </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn addBtn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="primary-btn addBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Franchise Modal End -->
@endsection

@section('script')

<script>

    function showApproveFranchiseModal(franchiseId) {
        var form = document.getElementById('approveFranchiseForm');
        var actionUrl = form.action.replace('__franchise_id__', franchiseId); // Replace the placeholder with the actual franchise ID
        form.action = actionUrl; // Update the form action URL

        $('#approveFranchiseModal').modal('show');
    }

    $(document).on('click', '.approve-franchise-btn', function(e) {
        e.preventDefault();
        var franchiseId = $(this).data('franchise-id'); // Get the franchise ID from the button's data attribute
        showApproveFranchiseModal(franchiseId); // Trigger the modal
    });

    function showRejectFranchiseModal(franchiseId) {
        var form = document.getElementById('rejectFranchiseForm');
        var actionUrl = form.action.replace('__franchise_id__', franchiseId); // Replace the placeholder with the actual franchise ID
        form.action = actionUrl; // Update the form action URL

        $('#rejectFranchiseModal').modal('show');
    }

    $(document).on('click', '.reject-franchise-btn', function(e) {
        e.preventDefault();
        var franchiseId = $(this).data('franchise-id'); // Get the franchise ID from the button's data attribute
        showRejectFranchiseModal(franchiseId); // Trigger the modal
    });
</script>
<script>
    
    $(document).ready(function() {
        $(document).on('click', '[id^="open-franchise-details-"]', function () {
        var franchiseId = $(this).data('id'); // Get franchise ID dynamically
        var franchiseType = $(this).data('checktype'); // Get franchise ID dynamically
        

        // Ajax request to get franchise details
        $.ajax({
            url: '/franchise/details/' + franchiseId +'/'+ franchiseType,  // Make sure the URL is correct
            method: 'GET',
            success: function (response) {
                if (response.status === 'success') {
                    var franchise = response.data;
                    // Populate table data dynamically
                    if(franchiseType == 'confirm'){
                        $('#FranciseViewLabel').text(franchise.user.name);

                        let franchiseDetailsHtml = '';

                            // Check if each value is not null or blank, then append the row to the HTML string
                            
                            if (franchise.user && franchise.user.email) {
                                franchiseDetailsHtml += `<tr><th>Email Id</th><td>${franchise.user.email}</td></tr>`;
                            }
                            if (franchise.mobile) {
                                franchiseDetailsHtml += `<tr><th>Mobile Number</th><td>${franchise.mobile}</td></tr>`;
                            }
                            if (franchise.registerationType) {
                                franchiseDetailsHtml += `<tr><th>Registration Type</th><td>${franchise.registerationType}</td></tr>`;
                            }
                            if (franchise.company_name) {
                                franchiseDetailsHtml += `<tr><th>Company Name</th><td>${franchise.company_name}</td></tr>`;
                            }
                            if (franchise.employees) {
                            franchiseDetailsHtml += `<tr><th>Number of Employees</th><td>${franchise.employees}</td></tr>`;
                            }
                            if (franchise.address) {
                                franchiseDetailsHtml += `<tr><th>Address</th><td>${franchise.address}</td></tr>`;
                            }
                            if (franchise.pincode) {
                                franchiseDetailsHtml += `<tr><th>Pincode</th><td>${franchise.pincode}</td></tr>`;
                            }
                            
                            if (franchise.city) {
                                franchiseDetailsHtml += `<tr><th>City</th><td>${franchise.city}</td></tr>`;
                            }
                            if (franchise.state) {
                                franchiseDetailsHtml += `<tr><th>State</th><td>${franchise.state}</td></tr>`;
                            }
                            if (franchise.country) {
                                franchiseDetailsHtml += `<tr><th>Country</th><td>${franchise.country}</td></tr>`;
                            }

                            // Inject the constructed HTML into the table body
                            $('#FranciseView .offcanvas-body table tbody').html(franchiseDetailsHtml);
                    }else{
                        $('#FranciseViewLabel').text(franchise.name);

                        let franchiseDetailsHtml = '';

                        // Check if each value is not null, undefined, or blank, then append the row to the HTML string
                        
                        if (franchise.email) {
                            franchiseDetailsHtml += `<tr><th>Email Id</th><td>${franchise.email}</td></tr>`;
                        }
                        if (franchise.mobile) {
                            franchiseDetailsHtml += `<tr><th>Mobile Number</th><td>${franchise.mobile}</td></tr>`;
                        }
                        if (franchise.alt_mobile) {
                            franchiseDetailsHtml += `<tr><th>Alternate Mobile Number</th><td>${franchise.alt_mobile}</td></tr>`;
                        }
                        if (franchise.registerationType) {
                            franchiseDetailsHtml += `<tr><th>Registration Type</th><td>${franchise.registerationType}</td></tr>`;
                        }
                        if (franchise.company_name) {
                            franchiseDetailsHtml += `<tr><th>Company Name</th><td>${franchise.company_name}</td></tr>`;
                        }
                        if (franchise.employees) {
                            franchiseDetailsHtml += `<tr><th>Number of Employees</th><td>${franchise.employees}</td></tr>`;
                        }
                        if (franchise.address) {
                            franchiseDetailsHtml += `<tr><th>Address</th><td>${franchise.address}</td></tr>`;
                        }
                        if (franchise.pincode) {
                            franchiseDetailsHtml += `<tr><th>Pincode</th><td>${franchise.pincode}</td></tr>`;
                        }

                        if (franchise.city) {
                            franchiseDetailsHtml += `<tr><th>City</th><td>${franchise.city}</td></tr>`;
                        }
                        if (franchise.state) {
                            franchiseDetailsHtml += `<tr><th>State</th><td>${franchise.state}</td></tr>`;
                        }
                        if (franchise.country) {
                            franchiseDetailsHtml += `<tr><th>Country</th><td>${franchise.country}</td></tr>`;
                        }
                        

                        // Inject the constructed HTML into the table body
                        $('#FranciseView .offcanvas-body table tbody').html(franchiseDetailsHtml);
                    }
                    

                    // Show the off-canvas modal
                    $('#FranciseView').offcanvas('show');
                } else {
                    alert('Franchise details not found.');
                }
            },
            error: function () {
                alert('An error occurred while fetching the data.');
            }
        });
    });
        
        $(".dt-responsive").dataTable({
            responsive: true,
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ]
        });
        $(".dt-responsive1").dataTable({
            responsive: true,
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ]
        });
    });
</script>
<script>
    $('#addFranchiseModal1').on('shown.bs.modal', function() {
    $("#contact-form1").validate({
        rules: {
            company_name: "required",
            name: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            alt_mobile: {
                digits: true,
                minlength: 10,
                maxlength: 15,
                notEqualTo: "#mobile"
            },
            employees: {
                required: true,
                digits: true
            },
            address: "required",
            pincode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            city: "required",
            state: "required",
            country: "required"
        },
        messages: {
            company_name: "Please enter your company name",
            name: "Please enter your name",
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            mobile: {
                required: "Please enter your mobile number",
                digits: "Please enter a valid mobile number"
            },
            alt_mobile: {
                digits: "Please enter a valid alternative mobile number",
                minlength: "Alternative mobile number should be at least 10 digits",
                maxlength: "Alternative mobile number should not exceed 15 digits",
                notEqualTo: "Alternative mobile number should not be the same as the mobile number"
            },
            employees: "Please enter the number of employees",
            address: "Please enter your address",
            pincode: {
                required: "Please enter your pincode",
                digits: "Please enter a valid pincode"
            },
            city: "Please enter your city",
            state: "Please enter your state",
            country: "Please enter your country"
        },
        errorElement: "div", // Use div to display errors
        errorPlacement: function(error, element) {
            error.addClass("form-text text-danger xsmall");
            error.insertAfter(element); // Place the error directly after the input element
        },
        highlight: function(element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
        submitHandler: function(form) {
            // If validation passes, submit the form
            form.submit(); // This triggers the form submission
        }
    });
});
</script>

<script>
    var input = document.querySelector("#mobile");
    var iti = "";
    // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
    window.iti = iti;

    function saveData() {
        const formData = {
            company_name: $("#company_name").val(), // Match the name attribute in the input
            name: $("#name").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val(),
            alt_mobile: $("#alt_mobile").val(),
            employees: $("#employees").val(),
            address: $("#address").val(),
            pincode: $("#pincode").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            country: $("#country").val(),
            _token: $("input[name='_token']").val(), // CSRF token
        };

        $.ajax({
            type: "POST",
            url: "{{ route('franchise_temp.store_admin') }}", // Your server-side script to save data
            data: formData,
            success: function(response) {
                //alert('ddd');
                document.getElementById('contact-form1').style.display = 'none'; // Hide all form fields
                document.getElementById('form-title1').style.display = 'none';
                document.getElementById('thankYouMessage1').style.display = 'block'; // Show the thank you message
                $("#contact-form")[0].reset(); // Reset the form after successful submission
            },
            error: function(xhr, status, error) {
                alert("An error occurred while saving data: " + error);
            }
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const registrationType = document.getElementById("registerationType");
        const companyNameField = document.getElementById("company_name").parentElement;
        const employeesField = document.getElementById("employees").parentElement;

        // Initially hide the fields
        companyNameField.style.display = "none";
        employeesField.style.display = "none";

        // Add event listener for change on Registration Type field
        registrationType.addEventListener("change", function() {
            const selectedValue = registrationType.value;

            if (selectedValue === "Company" || selectedValue === "Proprietor") {
                companyNameField.style.display = "block";
                employeesField.style.display = "block";
            } else {
                companyNameField.style.display = "none";
                employeesField.style.display = "none";
            }
        });
    });
</script>
<script>
            $(document).ready(function() {

                $('#company_name').prop('required', false);
                $('#employees').prop('required', false);

                // Monitor the registration type change
                $('#registerationType').on('change', function() {
                    var registrationType = $(this).val();

                    if (registrationType === "Company" || registrationType === "Proprietor") {
                        // Make company name and employees fields required if Company or Proprietor is selected
                        $('#company_name').prop('required', true);
                        $('#employees').prop('required', true);
                    } else {
                        // Otherwise, remove the required attribute
                        $('#company_name').prop('required', false);
                        $('#employees').prop('required', false);
                    }
                });


                var cityStateData = @json($groupedCityStateData);

                // Handle state change
                $('#state').on('change', function() {
                    var selectedState = $(this).val();
                    var cities = cityStateData[selectedState] || [];
                    
                    $('#city').empty();
                    $('#city').append('<option value="" disabled selected>Select City</option>');
   
                    cities.sort(function(a, b) {
                        return a.city_name.localeCompare(b.city_name); // Sort in ascending order
                    });
                    $.each(cities, function(index, city) {
                        $('#city').append('<option value="' + city.city_name + '">' + city.city_name + '</option>');
                    });
                });
            });

            // Enable client-side validation styles
            document.getElementById('franchise_temp').addEventListener('submit', function(event) {
                const form = event.target;
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        </script>
@endsection