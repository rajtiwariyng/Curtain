@extends('admin.layouts.app')

@section('title', 'User List')

@section('content')
<div class="dataOverviewSection mt-3">
    <div class="section-title">
        <h6 class="fw-bold m-0">All Users <span class="fw-normal text-muted">({{ count($users) }})</span></h6>
        <a href="#" class="primary-btn addBtn" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add Users</a>
    </div>

    <!-- Add User Modal Start -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formAuthentication" method="POST" action="{{ route('custom.register.submit') }}" autocomplete="off">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addUserModalLabel">Add User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Input Fields for Name, Email, Password, etc. -->
                        <div class="mb-1 w-100">
                            <label for="name" class="form-label mb-1">Name</label>
                            <input type="text" class="form-control w-100" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-1 w-100">
                            <label for="email" class="form-label mb-1">Email ID</label>
                            <input type="email" class="form-control w-100" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-1 w-100">
                            <label for="password" class="form-label mb-1">Password</label>
                            <input type="password" id="password" name="password" class="form-control w-100" required>
                            @error('password') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-1 w-100">
                            <label for="password_confirmation" class="form-label mb-1">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control w-100" required>
                            @error('password_confirmation') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-1 w-100">
                            <label for="role" class="form-label mb-1">Select Role</label>
                            <select class="form-select form-select-lg w-100" id="role" name="role" required>
                                <option value="">Select</option>
                                <option value="Admin">Admin</option>
                                <option value="Help Desk">Help Desk</option>
                                <option value="Franchise">Franchise</option>
                            </select>
                            @error('role') <div class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add User Modal End -->

    <!-- Edit User Modal Start -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="editUserForm" method="POST" action="{{ route('user.update', ['user' => '__user_id__']) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editUserModalLabel">Edit User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1 w-100">
                            <label for="edit_name" class="form-label mb-1">Name</label>
                            <input type="text" class="form-control w-100" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="edit_email" class="form-label mb-1">Email ID</label>
                            <input type="email" class="form-control w-100" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="edit_role" class="form-label mb-1">Role</label>
                            <select class="form-select form-select-lg w-100" id="edit_role" name="role" required>
                                <option value="Admin">Admin</option>
                                <option value="Help Desk">Help Desk</option>
                                <option value="Franchise">Franchise</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit User Modal End -->

    <!-- Change Password Modal Start -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="changePasswordForm" method="POST" action="{{ route('user.change-password', ['user' => '__user_id__']) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="changePasswordModalLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1 w-100">
                            <label for="current_password" class="form-label mb-1">Current Password</label>
                            <input type="password" class="form-control w-100" id="current_password" name="current_password" required>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="new_password" class="form-label mb-1">New Password</label>
                            <input type="password" class="form-control w-100" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-1 w-100">
                            <label for="new_password_confirmation" class="form-label mb-1">Confirm New Password</label>
                            <input type="password" class="form-control w-100" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="secondary-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Change Password Modal End -->

    <!-- Delete User Modal Start -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="secondary-btn me-2" data-bs-dismiss="modal">Close</button>
                        <form id="deleteUserForm" method="POST" action="{{ route('user.delete', ['user' => '__user_id__']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="primary-btn">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete User Modal End -->

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}"
                                data-email="{{ $user->email }}"
                                data-role="{{ $user->role }}">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                data-id="{{ $user->id }}">
                                Delete
                            </button>
                            <button class="btn btn-warning btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#changePasswordModal"
                                data-id="{{ $user->id }}">
                                Change Password
                            </button>
                        </div>
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
    $(document).ready(function () {
        // Edit User Modal
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 
            var name = button.data('name'); 
            var email = button.data('email'); 
            var role = button.data('role'); 
            
            var modal = $(this);
            modal.find('#edit_name').val(name);
            modal.find('#edit_email').val(email);
            modal.find('#edit_role').val(role);

            var formAction = '{{ route('user.update', ['user' => '']) }}' + '/' + userId;
            modal.find('form').attr('action', formAction);
        });

        // Change Password Modal
        $('#changePasswordModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 

            var modal = $(this);
            var formAction = '{{ route('user.change-password', ['user' => '']) }}' + '/' + userId;
            modal.find('form').attr('action', formAction);
        });

        // Delete User Modal
        $('#deleteUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var userId = button.data('id'); 

            var modal = $(this);
            var formAction = '{{ route('user.delete', ['user' => '']) }}' + '/' + userId;
            modal.find('#deleteUserForm').attr('action', formAction);
        });

        // jQuery Validation for User Forms
        $("#formAuthentication").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    equalTo: "#password"
                },
                role: {
                    required: true
                }
            },
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password_confirmation: {
                    equalTo: "Please enter the same password again"
                },
                role: "Please select a role"
            }
        });

        $("#changePasswordForm").validate({
            rules: {
                current_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                new_password_confirmation: {
                    equalTo: "#new_password"
                }
            },
            messages: {
                current_password: "Please provide your current password",
                new_password: {
                    required: "Please provide a new password",
                    minlength: "Your password must be at least 6 characters long"
                },
                new_password_confirmation: {
                    equalTo: "Please enter the same password again"
                }
            }
        });
    });
</script>
@endsection
