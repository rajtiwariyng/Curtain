<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', 'Curtains & Blinds | Dashboard')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />
    @yield('seo')
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" href="{{ asset('admin/CSS/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/CSS/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/CSS/mutliselectInput.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/CSS/seachableInput.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <!-- Fancybox Links -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    @yield('css')
</head>

<body>
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-start">
            @include('admin.layouts.sidebar')
            <div class="w-100">
                @include('admin.layouts.nav')
                @include('admin.layouts.message')
                @yield('content')
            </div>
        </div>
        

        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- / Footer -->
    <!-- delete modal start -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
                <div class="d-flex justify-content-end">
                    <button type="button" class="secondary-btn me-2" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="confirmDelete" class="primary-btn">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete modal end -->

  
<!-- success Modal -->
<!-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="thankuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-check-circle" style="color: #181818; font-size: 40px;"></i>
                <h6 id="successMessage">Your Message</h6>
            </div>
        </div>
    </div>
</div> -->


<!-- error Modal -->
<!-- <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="thankuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-x-circle" style="color: #ff3f3f; font-size: 40px;"></i>
                <h6 id="errorMessage">Your Message</h6>
            </div>
        </div>
    </div>
</div> -->

<!-- Check for success message and show modal -->
@if(session('success'))
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the message
            document.getElementById('successMessage').textContent = "{{ session('success') }}";

            // Show the modal
            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script> -->
@endif

<!-- Check for error message and show modal -->
@if(session('error'))
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the error message
            document.getElementById('errorMessage').textContent = "{{ session('error') }}";

            // Show the modal
            let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script> -->
@endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- datatabel -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/JS/datatable.js') }}"></script>

    <!-- menu script -->
    <script src="{{ asset('admin/JS/sidebar.js') }}"></script>
    <script src="{{ asset('admin/JS/menu.js') }}"></script>
    <script src="{{ asset('admin/JS/franchise.js') }}"></script>
    <script src="{{ asset('admin/JS/multiselectInput.js') }}"></script>
    <script src="{{ asset('admin/JS/searchableselect.js') }}"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
        $('.select2').select2();
        var placeholder = "select";
        $(".mySelect").select2({
            placeholder: placeholder,
            allowClear: false,
            minimumResultsForSearch: 5
        });
    </script>
    @yield('script')
</body>

</html>