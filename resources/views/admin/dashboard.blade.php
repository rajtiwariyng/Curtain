@extends('admin.layouts.app') 

@section('content')
<div class="info-tabs">
    @if(auth()->user()->hasRole('Data Entry Operator'))
        <a href="/products">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($product) }}</h2>
                <p class="m-0 small">Total number of Products</p>
            </div>
        </a>
    @elseif(auth()->user()->hasRole('Fulfillment Desk'))
        <a href="/user_list">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_users.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($user) }}</h2>
                <p class="m-0 small">Total number of Users</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Franchise'))
        <a href="{{ route('franchise.temp.index') }}">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">0</h2>
                <p class="m-0 small">Total number of Appointments</p>
            </div>
        </a>
        <a href="/products">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">0</h2>
                <p class="m-0 small">Total number of Quotations</p>
            </div>
        </a>
        <a href="/user_list">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_users.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">0</h2>
                <p class="m-0 small">Total number of Orders</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Admin'))
        <a href="{{ route('franchise.temp.index') }}">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($franchise) }}</h2>
                <p class="m-0 small">Total number of Franchise</p>
            </div>
        </a>
        <a href="/products">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($product) }}</h2>
                <p class="m-0 small">Total number of Products</p>
            </div>
        </a>
        <a href="/user_list">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_users.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($user) }}</h2>
                <p class="m-0 small">Total number of Users</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Help Desk'))
        <a href="{{ route('franchise.temp.index') }}">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($franchise) }}</h2>
                <p class="m-0 small">Total number of Franchise</p>
            </div>
        </a>
        <a href="/products">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($product) }}</h2>
                <p class="m-0 small">Total number of Products</p>
            </div>
        </a>
        <a href="/user_list">
            <div class="card info-card">
                <img src="{{ asset('admin/images/tab_users.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($user) }}</h2>
                <p class="m-0 small">Total number of Users</p>
            </div>
        </a>
    @endif
</div>

<div class="dataOverviewSection">
    <div class="dataOverview">
        <div class="d-flex justify-content-between">
            <div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Appointments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Quotations</button>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-start align-items-center">
                <input type="date" name="dateFilter" id="dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}" class="form-control me-3">
                 <input type="date" name="dateFilter" id="dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}" class="form-control me-3">
                <a href="{{ route('appointments.list.index') }}" class="small">View All <i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">S/N</th>
                                <th>Appointment ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Pincode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointment as $idx=>$appointments)
                                <tr>
                                    <td>{{ $idx+1 }}</td>
                                    <td>{{ $appointments->uniqueid }}</td>
                                    <td>{{ $appointments->name }}</td>
                                    <td>{{ $appointments->mobile }}</td>
                                    <td>{{ $appointments->pincode }}</td>
                                    <td>
                                        
                                    @if($appointments->status == "1")
                                        {{$status = 'Pending';}}
                                    @elseif($appointments->status == "2")
                                        {{$status = 'Assigned';}}
                                    @elseif($appointments->status == "3")
                                        {{$status = 'Hold';}}
                                    @elseif($appointments->status == "4")
                                        {{$status = 'Completed';}}
                                    @else
                                        {{$status = 'Query Booked';}} <!-- Or any other fallback status -->
                                    @endif

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">S/N</th>
                                <th>Appointment ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $idx=>$quotation)
                                <tr>
                                    <td>{{ $idx+1 }}</td>
                                    <td>{{ $quotation->appointment['uniqueid'] }}</td>
                                    <td>{{ $quotation->name }}</td>
                                    <td>{{ $quotation->email }}</td>
                                    <td>{{ $quotation->number }}</td>
                                    <td>{{ $quotation->address }}</td>
                                    <td>
                                        
                                    @if($quotation->status == 0)
                                        {{$status = 'Hold';}}
                                    @elseif($appointments->status == 0)
                                        {{$status = 'Completed';}}
                                    @else
                                        {{$status = 'Hold';}} <!-- Or any other fallback status -->
                                    @endif

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assignAppointmentModal" tabindex="-1" aria-labelledby="assignAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignAppointmentModalLabel">Assign Franchise to Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('appointments.assign') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="appointmentId" name="appointment_id">
                    <div class="mb-3">
                        <label for="franchise" class="form-label">Select Franchise</label>
                        <select id="franchise" name="franchise_id" class="form-select">
                            <option value="">Select Franchise</option>
                            @foreach($franchise as $franchises)
                                <option value="{{ $franchises->id }}">{{ $franchises->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Franchise</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

 @section('script') 
 <script>
  document.getElementById('dateFilter').addEventListener('change', function() {
    let selectedDate = this.value;
    let baseUrl = "{{ route('super.admin.dashboard') }}";
    if (selectedDate) {
      window.location.href = baseUrl + "?dateFilter=" + selectedDate;
    } else {
      window.location.href = baseUrl; // Redirect without the dateFilter parameter
    }
  });
</script>
<script>
  function confirmAssign(appointmentId) {
    // Open modal and set appointment ID
    $('#assignAppointmentModal').modal('show');
    $('#appointmentId').val(appointmentId);
  }
  @if(session('success'))
  Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: "{{ session('success') }}",
    confirmButtonColor: '#3085d6'
  });
  @endif
</script>
<script>
  $(document).ready(function() {
    $(".dt-responsive").dataTable({
      responsive: true,
      columnDefs: [{
        responsivePriority: 1,
        targets: 0
      }, {
        responsivePriority: 2,
        targets: -1
      }]
    });
    $(".dt-responsive1").dataTable({
      responsive: true,
      columnDefs: [{
        responsivePriority: 1,
        targets: 0
      }, {
        responsivePriority: 2,
        targets: -1
      }]
    });
  });
</script> 
@endsection