@extends('admin.layouts.app')

@section('title', 'Franchise Temp List')

@section('content')
<style>
  table>thead{
    background: #6a6cff;
  }
  table > thead > tr > th{
    color: #ffffff !important;
  }
</style>
    <div class="card">
        <h5 class="card-header pb-0 text-md-start text-center">
            Appointment List
        </h5>
        <div class="nav-align-top nav-tabs-shadow mb-6">
          <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item" role="presentation">
              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons bx bx-loader bx-sm me-1_5 align-text-bottom"></i> Pending List <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span></span><i class="bx bx-home bx-sm d-sm-none"></i></button>
            </li>
            <li class="nav-item" role="presentation">
              <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false" tabindex="-1"><span class="d-none d-sm-block"><i class="tf-icons bx bxs-user-check bx-sm me-1_5 align-text-bottom"></i> Assigned List</span><i class="bx bx-user bx-sm d-sm-none"></i></button>
            </li>
            <li class="nav-item" role="presentation">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false" tabindex="-1"><span class="d-none d-sm-block"><i class="tf-icons bx bxs-user-check bx-sm me-1_5 align-text-bottom"></i> Hold List</span><i class="bx bx-user bx-sm d-sm-none"></i></button>
              </li>
              <li class="nav-item" role="presentation">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false" tabindex="-1"><span class="d-none d-sm-block"><i class="tf-icons bx bxs-user-check bx-sm me-1_5 align-text-bottom"></i> Confirmed List</span><i class="bx bx-user bx-sm d-sm-none"></i></button>
              </li>
              <li class="nav-item" role="presentation">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false" tabindex="-1"><span class="d-none d-sm-block"><i class="tf-icons bx bxs-user-check bx-sm me-1_5 align-text-bottom"></i> Completed List</span><i class="bx bx-user bx-sm d-sm-none"></i></button>
              </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
              <div class="card-datatable table-responsive">
                <table class="dt-responsive table border-top">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingAppointments as $appointment)
                            <tr>
                                
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->mobile }}</td>
                                <td>{{ $appointment->address }}</td>
                                <td>{{ $appointment->pincode }}</td>
                                <td>{{ $appointment->city }}</td>
                                <td>{{ $appointment->state }}</td>
                                <td>{{ $appointment->country }}</td>
                                <td>
                                    <a href="javascript:void(0);" 
                                       class="btn rounded-pill btn-icon btn-success" 
                                       onclick="confirmAssign('{{ $appointment->id }}')">
                                        <i class='bx bxs-user-check'></i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
              <div class="card-datatable table-responsive">
                <table class="dt-responsive1 table border-top">
                    <thead>
                        <tr>
                            
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignedAppointments as $franchise)
                            <tr>
                                
                                
                                <td>{{ $franchise->name }}</td>
                                <td>{{ $franchise->email }}</td>
                                <td>{{ $franchise->mobile }}</td>
                                <td>{{ $franchise->address }}</td>
                                <td>{{ $franchise->pincode }}</td>
                                <td>{{ $franchise->city }}</td>
                                <td>{{ $franchise->state }}</td>
                                <td>{{ $franchise->country }}</td>
                           
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
        
    </div>
    <!-- Assign Franchise Modal -->
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
                            @foreach($franchises as $franchise)
                                <option value="{{ $franchise->id }}">{{ $franchise->company_name }}</option>
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
