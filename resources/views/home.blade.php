<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="{{ asset('admin/CSS/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/CSS/dashboard.css') }}">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-start">
            <custom-sidebar></custom-sidebar>
            <div class="w-100">
                <div class="topBar">
                    <div class="topbarLeft">
                        <h6 class="m-0 fw-bold">Welcome, Mr. Ramesh Kumar</h6>
                        <p class="m-0 small">Today is Saturday, 11th November 2022.</p>
                    </div>
                    <div class="topbarRight">
                        <div class="dropdown">
                            <div class="d-flex align-items-center justify-content-center" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center justify-content-start">
                                    <i class="bi bi-person-circle me-2" style="font-size: 32px; line-height: 0;"></i>
                                    <div>
                                        <p class="m-0 fw-bold" style="line-height: normal;">Ramesh</p>
                                        <p class="m-0 small" style="line-height: normal;">Executive</p>
                                    </div>
                                </div>
                                <i class="bi bi-chevron-down ms-3"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-tabs">
                    <a href="#">
                        <div class="card info-card">
                            <img src="{{ asset('admin/images/tab-icon.svg') }}" alt="">
                            <h2 class="fw-bold m-0 mb-1">250</h2>
                            <p class="m-0 small">Total number of Franchise</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="card info-card">
                            <img src="{{ asset('admin/images/tab-icon.svg') }}" alt="">
                            <h2 class="fw-bold m-0 mb-1">250</h2>
                            <p class="m-0 small">Total number of Products</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="card info-card">
                            <img src="{{ asset('admin/images/tab-icon.svg') }}" alt="">
                            <h2 class="fw-bold m-0 mb-1">250</h2>
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
                                <input type="date" name="dateFilter" id="dateFilter" placeholder="Filter by date"
                                    class="form-control me-3">
                                <a href="#" class="small">View All <i class="bi bi-arrow-right-short"></i></a>
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
                                                <th scope="col">Appointment ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Zip Code</th>
                                                <th scope="col">Status</th>
                                                <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;"
                                                    scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>#123458</td>
                                                <td>Ramesh Kumar</td>
                                                <td>+91 9765432110</td>
                                                <td>110059</td>
                                                <td><span class="badge badge-active">Completed</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="bi bi-three-dots-vertical" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                                            <li><a class="dropdown-item small" href="#">Assigned</a>
                                                            </li>
                                                            <li><a class="dropdown-item small" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">Rejected</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>01</td>
                                                <td>#123458</td>
                                                <td>Ramesh Kumar</td>
                                                <td>+91 9765432110</td>
                                                <td>110059</td>
                                                <td><span class="badge badge-inactive">Rejected</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="bi bi-three-dots-vertical" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                                            <li><a class="dropdown-item small" href="#">Assigned</a>
                                                            </li>
                                                            <li><a class="dropdown-item small" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">Rejected</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>01</td>
                                                <td>#123458</td>
                                                <td>Ramesh Kumar</td>
                                                <td>+91 9765432110</td>
                                                <td>110059</td>
                                                <td><span class="badge badge-pending">Pending</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="bi bi-three-dots-vertical" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                                            <li><a class="dropdown-item small" href="#">Assigned</a>
                                                            </li>
                                                            <li><a class="dropdown-item small" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">Rejected</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>01</td>
                                                <td>#123458</td>
                                                <td>Ramesh Kumar</td>
                                                <td>+91 9765432110</td>
                                                <td>110059</td>
                                                <td><span class="badge badge-assigned">Assigned</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="bi bi-three-dots-vertical" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                                            <li><a class="dropdown-item small" href="#">Assigned</a>
                                                            </li>
                                                            <li><a class="dropdown-item small" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">Rejected</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>01</td>
                                                <td>#123458</td>
                                                <td>Ramesh Kumar</td>
                                                <td>+91 9765432110</td>
                                                <td>110059</td>
                                                <td><span class="badge badge-active">Completed</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <i class="bi bi-three-dots-vertical" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item small" href="#">View</a></li>
                                                            <li><a class="dropdown-item small" href="#">Assigned</a>
                                                            </li>
                                                            <li><a class="dropdown-item small" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal">Rejected</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
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
            </div>
        </div>

        <footer>
            <div class="footer">
                <p class="m-0">Copyright © 2024 All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- datatabel -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/JS/datatable.js') }}"></script>

    <!-- menu script -->
    <script src="{{ asset('admin/JS/sidebar.js') }}"></script>
    <script src="{{ asset('admin/JS/menu.js') }}"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</body>

</html>