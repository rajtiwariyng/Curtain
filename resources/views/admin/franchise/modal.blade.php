<!-- Confirmed Modal -->
<div class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="confirmedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmedModalLabel">Confirmed Franchise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content for Confirmed -->
                    <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table" id="pendingFranchise">
                            <thead>
                                <tr>

                                    <th>S/N</th>
                                    <th>Company Name</th>
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
                                @foreach($franchises as $franchise)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td>{{ $franchise->company_name }}</td>
                                    <td>{{ $franchise->user->name }}</td>
                                    <td>{{ $franchise->user->email }}</td>
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
</div>

<!-- Pending Modal -->
<div class="modal fade" id="pendingModal" tabindex="-1" aria-labelledby="pendingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendingModalLabel">Pending Franchise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content for Pending -->
                <div class="tab-pane fade show active" id="pills-confirm" role="tabpanel"
                aria-labelledby="pills-confirm-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Company Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($franchiseTempsPending as $idx => $franchisePending)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td>{{ $franchisePending->company_name }}</td>
                                <td>{{ $franchisePending->name }}</td>
                                <td>{{ $franchisePending->email }}</td>
                                <td>{{ $franchisePending->mobile }}</td>
                                <td>{{ $franchisePending->address }}</td>
                                <td>{{ $franchisePending->pincode }}</td>
                                <td>{{ $franchisePending->city }}</td>
                                <td>{{ $franchisePending->state }}</td>
                                <td>{{ $franchisePending->country }}</td>
                                <td><span class="badge badge-pending">Pending</span></td>
                                <td>
                                    <div class="dropdown">
                                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" data-bs-toggle="offcanvas"
                                                    href="#FranciseView" role="button"
                                                    aria-controls="FranciseView">View</a></li>
                                            <li>
                                                <a href="javascript:" class="dropdown-item small approve-franchise-btn"
                                                    data-franchise-id="{{ $franchisePending->id }}">Approve Franchise</a>
                                            </li>
                                            {{-- <li><a class="dropdown-item small" href="#" data-bs-toggle="modal"
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
            </div>
        </div>
    </div>
</div>

<!-- Rejected Modal -->
<div class="modal fade" id="rejectedModal" tabindex="-1" aria-labelledby="rejectedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectedModalLabel">Rejected Franchise</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content for Rejected -->
                <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;" scope="col">S/N
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Individual/Company</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Pincode</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($franchiseTempsReject as $idx => $franchiseReject)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td>{{ $franchiseReject->name }}</td>
                                <td>{{ $franchiseReject->email }}</td>
                                <td>{{ $franchiseReject->company_name }}</td>
                                <td>{{ $franchiseReject->mobile }}</td>
                                <td>{{ $franchiseReject->pincode }}</td>
                                <td>{{ $franchiseReject->city }}</td>
                                <td><span class="badge badge-inactive">Rejected</span></td>
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