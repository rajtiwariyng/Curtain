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
</div>
 @elseif(auth()->user()->hasRole('Fulfillment Desk'))
<a href="/user_list">
        <div class="card info-card">
            <img src="{{ asset('admin/images/tab_users.svg') }}" alt="">
            <h2 class="fw-bold m-0 mb-1">{{ count($user) }}</h2>
            <p class="m-0 small">Total number of Users</p>
        </div>
    </a>
</div>
 @else

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
</div>

<div class="dataOverviewSection">
    <div class="dataOverview">
        <div class="d-flex justify-content-between">
            <div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab"
                            aria-controls="pills-home" aria-selected="true">Appointments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Quotations</button>
                    </li>

                </ul>
            </div>
            <div class="d-flex justify-content-start align-items-center">
                <input type="date" name="dateFilter" id="dateFilter" placeholder="Filter by date" value="{{ request('dateFilter') }}"
                    class="form-control me-3">
                <a href="{{ route('appointments.list.index') }}" class="small">View All <i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"
                                    scope="col">S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;"
                                    scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointment as $idx=>$appointments)
                                <tr>
                                    <td>{{ $idx+1 }}</td>
                                    <td>{{ $appointments->name }}</td>
                                    <td>{{ $appointments->email }}</td>
                                    <td>{{ $appointments->mobile }}</td>
                                    <td>{{ $appointments->address }}</td>
                                    <td>{{ $appointments->pincode }}</td>
                                    <td>{{ $appointments->city }}</td>
                                    <td>{{ $appointments->state }}</td>
                                    <td>{{ $appointments->country }}</td>
                                    <td><span class="badge badge-active">{{ $appointments->status }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <i class="bi bi-three-dots-vertical" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                {{-- <li><a class="dropdown-item small" href="#">View</a></li> --}}
                                                <li><a class="dropdown-item small" href="javascript:" onclick="confirmAssign('{{ $appointments->id }}')">Assign Franchise</a>
                                                </li>
                                                {{-- <li><a class="dropdown-item small" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal">Rejected</a></li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">

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
 @endif

@endsection

@section('script')
<script>
    document.getElementById('dateFilter').addEventListener('change', function () {
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