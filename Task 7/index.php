<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Managment System</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- Add new User Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="mb-3">
                            <input type="username" name="username" class="form-control form-control-lg" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                            <div class="invalid-feedback">Email is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="role" name="role" class="form-control form-control-lg" placeholder="Enter Role" required>
                            <div class="invalid-feedback">Role is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add new User Modal End -->

    <!-- Edit User Modal Start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <input type="username" name="username" id="username" class="form-control form-control-lg" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                            <div class="invalid-feedback">Email is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="role" name="role" id="role" class="form-control form-control-lg" placeholder="Enter Role" required>
                            <div class="invalid-feedback">Role is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update User" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal End -->

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">User Managment System</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add New user</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>