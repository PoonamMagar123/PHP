<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Employee Data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                    <?php
                        // if (session()->getFlashdata('status')) {
                        //     echo "<h4>" . session()->getFlashdata('status') . "</h4>";
                        // }
                    ?>
                    <?php
                        if (session()->getFlashdata('status')) {
                            $status = session()->getFlashdata('status');
                            echo '<div class="alert alert-info" role="alert">' . $status . '</div>';
                        }
                    ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Employee Data 
                            <a href="<?= base_url('employee_add')?>" class="btn btn-primary float-right">Add Employee</a>
                    </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach($employees as $row) :?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['first_name'] ?></td>
                                            <td><?= $row['last_name'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['designation'] ?></td>
                                            <td><?= $row['created_at'] ?></td>
                                            <td>
                                                <a href="<?= base_url('employee/edit/'.$row['id'])?>" class="btn btn-success btn-sm">Edit</a>
                                                
                                                <!-- <a href="<//?= base_url('employee/delete/'.$row['id'])?>" class="btn btn-danger btn-sm">Delete</a> -->
                                                <form action="<?= base_url('employee/delete/'.$row['id'])?>" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
