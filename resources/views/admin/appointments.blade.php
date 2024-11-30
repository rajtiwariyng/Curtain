@extends('admin.layouts.app')

@section('title', 'Customert Appointment List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Appointments <span class="fw-normal text-muted">({{ count($pendingAppointments)+count($assignedAppointments) }})</span></h6>
        
    </div>

    <div class="dataOverview mt-3">
        <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-confirm-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-confirm" type="button" role="tab"
                        aria-controls="pills-confirm" aria-selected="true">Appointment Booked <span
                            class="fw-normal small">({{ count($pendingAppointments) }})</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-pending" type="button" role="tab"
                        aria-controls="pills-pending" aria-selected="false">Franchise Assigned<span
                            class="fw-normal small">({{ count($assignedAppointments) }})</span></button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-rejected-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-rejected" type="button" role="tab"
                        aria-controls="pills-rejected" aria-selected="false">Rejected <span
                            class="fw-normal small">(5)</span></button>
                </li> --}}

            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-confirm" role="tabpanel"
                aria-labelledby="pills-confirm-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingAppointments as $idx=>$appointment)
                                <tr>
                                    <td>{{ $idx+1 }}</td>
                                    <td>{{ $appointment->name }}</td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->mobile }}</td>
                                    <td>{{ $appointment->address }}</td>
                                    <td>{{ $appointment->pincode }}</td>
                                    <td>{{ $appointment->city }}</td>
                                    <td>{{ $appointment->state }}</td>
                                    <td>{{ $appointment->country }}</td>
                                    <td>
                                        
                                        <div class="dropdown">
                                            <i class="bi bi-three-dots-vertical" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                {{-- <li><a class="dropdown-item small" href="#">View</a></li> --}}
                                                <li>
                                                    <a href="javascript:" class="dropdown-item small approve-franchise-btn" data-franchise-id="{{ $appointment->id }}" onclick="confirmAssign('{{ $appointment->id }}')">Assign Franchise</a>
                                                </li>
                                                {{-- <li><a class="dropdown-item small" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">Reject</a></li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-pending" role="tabpanel"
                aria-labelledby="pills-pending-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="pendingFranchise">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Franchise</th>
                            <th>Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignedAppointments as $idx=>$franchise)
                            <tr>
                                
                                <td>{{ $idx+1 }}</td>
                                <td>{{ $franchise->name }}</td>
                                <td>{{ $franchise->email }}</td>
                                <td>{{ $franchise->mobile }}</td>
                                <td>{{ $franchise->address }}</td>
                                <td>{{ $franchise->pincode }}</td>
                                <td>{{ $franchise->city }}</td>
                                <td>{{ $franchise->state }}</td>
                                <td>{{ $franchise->country }}</td>
                                <td><span class="badge badge-active">{{ $franchise->franchise_name }}</span></td>
                                <td>{{ $franchise->appointment_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-rejected" role="tabpanel"
                aria-labelledby="pills-rejected-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"
                                    scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Individual/Company</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Pincode</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>
                                <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;"
                                    scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>01</td>
                                <td>Ramesh Kumar</td>
                                <td>Campany</td>
                                <td>abc pvt ltd</td>
                                <td>+91 9876543211</td>
                                <td>110059</td>
                                <td>New Delhi</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                            <li><a class="dropdown-item small" href="#">Confirm</a>
                                            </li>
                                            <li><a class="dropdown-item small" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Ramesh Kumar</td>
                                <td>Campany</td>
                                <td>abc pvt ltd</td>
                                <td>+91 9876543211</td>
                                <td>110059</td>
                                <td>New Delhi</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                            <li><a class="dropdown-item small" href="#">Confirm</a>
                                            </li>
                                            <li><a class="dropdown-item small" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Ramesh Kumar</td>
                                <td>Campany</td>
                                <td>abc pvt ltd</td>
                                <td>+91 9876543211</td>
                                <td>110059</td>
                                <td>New Delhi</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                            <li><a class="dropdown-item small" href="#">Confirm</a>
                                            </li>
                                            <li><a class="dropdown-item small" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Ramesh Kumar</td>
                                <td>Campany</td>
                                <td>abc pvt ltd</td>
                                <td>+91 9876543211</td>
                                <td>110059</td>
                                <td>New Delhi</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                            <li><a class="dropdown-item small" href="#">Confirm</a>
                                            </li>
                                            <li><a class="dropdown-item small" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Ramesh Kumar</td>
                                <td>Campany</td>
                                <td>abc pvt ltd</td>
                                <td>+91 9876543211</td>
                                <td>110059</td>
                                <td>New Delhi</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                            <li><a class="dropdown-item small" href="#">Confirm</a>
                                            </li>
                                            <li><a class="dropdown-item small" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Approval Modal -->
<div class="modal fade" id="assignAppointmentModal" tabindex="-1" aria-labelledby="approveFranchiseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('appointments.assign') }}" method="POST">
                @csrf
                
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="approveFranchiseModalLabel">Approve Franchise</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="appointmentId" name="appointment_id">
                    <div class="mb-3">
                        <label for="franchise" class="form-label">Select Franchise<span class="requried">*</span></label>
                        <select id="franchise" name="franchise_id" class="form-select w-100" required>
                            <option value="">Select Franchise</option>
                            @foreach($franchises as $franchise)
                                <option value="{{ $franchise->id }}">{{ $franchise->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Appointment Date</label>
                        <input type="date" name="dateFilter" id="dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}"
                    class="form-control me-3 w-100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="primary-btn">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Add Franchise Modal End -->
@endsection

@section('script')
<script>
    function confirmAssign(appointmentId) {
    // Open modal and set appointment ID
    $('#assignAppointmentModal').modal('show');
    $('#appointmentId').val(appointmentId);
}

    // $(document).ready(function() {
        $('#pincode').on('blur', function() {
            var pincode = $(this).val();
            if (pincode) {
                $.ajax({
                    url: '/get-location',
                    method: 'POST',
                    data: {
                        pincode: pincode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#country').val(response.country);
                        $('#state').val(response.state);
                        $('#city').val(response.city);
                    },
                    error: function() {
                        alert('Location not found!');
                    }
                });
            }
        });
    // });
</script>

    <script>
        $(document).ready(function(){
            $(".dt-responsive").dataTable({
              responsive: true,
              columnDefs: [
                  { responsivePriority: 1, targets: 0 },
                  { responsivePriority: 2, targets: -1 }
              ]
            });
            $(".dt-responsive1").dataTable({
              responsive: true,
              columnDefs: [
                  { responsivePriority: 1, targets: 0 },
                  { responsivePriority: 2, targets: -1 }
              ]
            });
        });
    </script>
   
@endsection
