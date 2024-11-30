@extends('admin.layouts.app')

@section('title', 'User List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Users <span class="fw-normal text-muted">({{ count($users) }})</span></h6>
        <a href="#" class="primary-btn addBtn" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add
            Users</a>
    </div>

    <!-- Add User Modal Start -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formAuthentication" method="POST" action="{{ route('custom.register.submit') }}" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1 w-100">
                        <label for="name" class="form-label mb-1">Name</label>
                        <input type="text" class="form-control w-100" @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div id="passwordHelpBlock" class="form-text xsmall">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1 w-100">
                        <label for="email" class="form-label mb-1">Email ID</label>
                        <input type="email" class="form-control w-100" @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="example@domain.com">
                        @error('email')
                            <div id="passwordHelpBlock" class="form-text xsmall">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1 w-100">
                        <label for="password" class="form-label mb-1">Password</label>
                        <input type="password" @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required autofocus autocomplete="new-password" class="form-control w-100"
                            aria-describedby="passwordHelpBlock">
                            @error('password')
                                <div id="passwordHelpBlock" class="form-text xsmall">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-1 w-100">
                        <label for="password_confirmation" class="form-label mb-1">Confirm Password</label>
                        <input type="password" @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus class="form-control w-100"
                            aria-describedby="passwordHelpBlock">
                            @error('password_confirmation')
                                <div id="passwordHelpBlock" class="form-text xsmall">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-1 w-100">
                        <label for="role" class="form-label mb-1">Select Role</label>
                        <select class="form-select form-select-lg mb-3 w-100" @error('role') is-invalid @enderror" id="role" name="role" required autofocus
                            aria-label="Large select example">
                            <option value="">Select</option>
                                <option value="Admin">Admin</option>
                                <option value="Help Desk">Help Desk</option>
                                <option value="Fulfillment Desk">Fulfillment Desk</option>
                                <option value="Data Entry Operator">Data Entry Operator</option>
                                <option value="Accounts">Accounts</option>
                                <option value="Franchise">Franchise</option>
                                <option value="Franchise Team Member">Franchise Team Member</option>
                        </select>
                        @error('role')
                            <div id="passwordHelpBlock" class="form-text xsmall">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="secondary-btn addBtn"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="primary-btn addBtn">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add User Modal End -->
    <!-- delete modal start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are your sure you want to delete?</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="secondary-btn me-2 addBtn" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="primary-btn addBtn">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
    <!-- Edit User Modal Start -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="editUserForm" method="POST" action="{{ route('user.update', ['user' => '__user_id__']) }}" autocomplete="off">
                    @csrf
                    @method('PUT') <!-- PUT method for update -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editUserModalLabel">Edit User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1 w-100">
                            <label for="name" class="form-label mb-1">Name</label>
                            <input type="text" class="form-control w-100" id="editName" name="name" required autofocus>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="email" class="form-label mb-1">Email ID</label>
                            <input type="email" class="form-control w-100" id="editEmail" name="email" required autofocus>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="role" class="form-label mb-1">Role</label>
                            <select class="form-select form-select-lg mb-3 w-100" id="editRole" name="role" required>
                                <option value="Admin">Admin</option>
                                <option value="Help Desk">Help Desk</option>
                                <option value="Fulfillment Desk">Fulfillment Desk</option>
                                <option value="Data Entry Operator">Data Entry Operator</option>
                                <option value="Accounts">Accounts</option>
                                <option value="Franchise">Franchise</option>
                                <option value="Franchise Team Member">Franchise Team Member</option>
                            </select>
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
    <!-- Edit User Modal End -->

    <!-- Delete User Modal Start -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="secondary-btn me-2 addBtn" data-bs-dismiss="modal">Close</button>
                        <form id="deleteUserForm" method="POST" action="{{ route('user.destroy', ['user' => '__user_id__']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="primary-btn addBtn">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete User Modal End -->

    <!-- Change Status Modal Start -->
    <div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to change the status?</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="secondary-btn me-2 addBtn" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="primary-btn addBtn" id="changeStatusButton">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Status Modal End -->
    <div class="dataOverview mt-3">
        <div class="table-responsive">
            <table class="table" id="projectsTable">
                <thead>
                    <tr>
                        <th style="border-top-left-radius: 6px; border-bottom-left-radius: 6px;"
                            scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th style="border-top-right-radius: 6px; border-bottom-right-radius: 6px;"
                            scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $idx=>$user)
                    <tr>
                        <td>{{ $idx+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()[0] }}</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item small editBtn" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-role="{{ $user->getRoleNames()[0] }}">Edit</a></li>
                                    
                                    <li><a class="dropdown-item small" href="#" data-bs-toggle="modal"
                                            data-bs-target="#changePasswordModal">Change Password</a>
                                    </li>
                                    <li><a class="dropdown-item small" href="#">Active</a></li>
                                    <li><a class="dropdown-item small deleteBtn" href="#" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-id="{{ $user->id }}">Delete</a></li>

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
@endsection
@section('script')
<script>
    $(document).ready(function () {
        // Add custom validation method for regex pattern
        $.validator.addMethod("pattern", function (value, element, param) {
            if (this.optional(element)) {
                return true;
            }
            return param.test(value);
        }, "Invalid format.");

        // Initialize form validation
        $("#formAuthentication").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).+$/
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                role: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 8 characters long",
                    pattern: "Password must include uppercase, lowercase, number, and special character"
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "The password and its confirmation do not match"
                },
                role: {
                    required: "Please select a role"
                }
            },
            errorElement: "div", // Use div to display errors
            errorPlacement: function (error, element) {
                error.addClass("form-text text-danger xsmall");
                error.insertAfter(element); // Place the error directly after the input element
            },
            highlight: function (element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });
    });
</script>
<script>
    // Edit User Modal
    $('#editUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userId = button.data('id'); // Extract user ID from data-id attribute
        var name = button.closest('tr').find('td:eq(1)').text(); // Extract name from table row
        var email = button.closest('tr').find('td:eq(2)').text(); // Extract email from table row
        var role = button.closest('tr').find('td:eq(3)').text(); // Extract role from table row

        var modal = $(this);
        modal.find('#edit_name').val(name);
        modal.find('#edit_email').val(email);
        modal.find('#edit_role').val(role);

        var formAction = '/admin/users/' + userId;
        modal.find('form').attr('action', formAction);
    });

    // Delete User Modal
    $('#deleteUserModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userId = button.data('id'); // Extract user ID from data-id attribute

        var modal = $(this);
        var formAction = '/admin/users/' + userId;
        modal.find('#deleteUserForm').attr('action', formAction);
    });

    // Change Status Modal
    $('.change-status').on('click', function () {
        var userId = $(this).data('id');
        var currentStatus = $(this).data('status');
        var newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';
        
        $('#statusLabel').text(newStatus); // Update the status label text
        
        var formAction = '/admin/users/' + userId + '/status';
        $('#changeStatusForm').attr('action', formAction);
        
        $('#changeStatusModal').modal('show');
    });
</script>

@endsection

