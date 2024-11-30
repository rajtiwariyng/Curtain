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
            Users  List
        </h5>
              <div class="card-datatable table-responsive">
                <table class="dt-responsive table border-top">
                    <thead>
                        <tr>
                            
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Ban User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                
                                
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()[0] }}</td>
                                <td>
                                  <a href="javascript:void(0);" 
                                  class="btn rounded-pill btn-icon btn-danger" 
                                      onclick="confirmApproval('{{ route('franchise.approve', $user->id) }}')">
                                      <i class='bx bx-block'></i>
                                  </a>    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
    </div>
@endsection

@section('script')
<script>
  function confirmApproval(url) {
      Swal.fire({
          title: 'Are you sure?',
          text: "Do you want to approve this franchise?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, approve it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = url;
          }
      });
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
