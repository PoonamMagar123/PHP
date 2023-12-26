<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Employee  
                            <a href="<?= base_url('employee')?>" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('employee/update/' . $employees['id']); ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="<?= $employees['first_name']; ?>" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="<?= $employees['last_name']; ?>" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $employees['email']; ?>" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Phone</label>
                                        <input type="number" name="phone" value="<?= $employees['phone']; ?>" class="form-control" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="designation" value="<?= $employees['designation']; ?>" class="form-control" placeholder="Enter Designation">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-4">Update Employee</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
