@extends('admin.layouts.app')

@section('title', 'Customert Appointment List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Query Booked <span class="fw-normal text-muted">({{ count($appointments) }})</span></h6>
      <a href="{{ route('export.book.query') }}">Export</a>
    </div>

    <div class="dataOverview mt-3">
        <!-- <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Pending <span class="fw-normal small">({{ $pendingCount }})</span></button>
                </li>
            </ul>
        </div> -->

        <!-- all data view -->

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                <!-- This content will be dynamically populated -->
            </div>

        </div>

        <div class="table-responsive">
            <table class="table" id="querybooked-table">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <!-- <th>Address</th> -->
                        <th>Pincode</th>
                        <th>City</th>
                        <th>State</th>
                        <!-- <th>Country</th>
                        <th>Status</th>
                        <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                   
                @foreach($appointments as $key =>  $appointment)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->mobile }}</td>
                    <td>{{ $appointment->pincode }}</td>
                    <td>{{ $appointment->city }}</td>
                    <td>{{ $appointment->state }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- end all data view -->



    </div>
</div>

@endsection

@section('script')

@endsection