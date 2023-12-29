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
                            <a href="<?= base_url('expense')?>" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('expense_update/' . $expenses['id']); ?>" method="POST" onsubmit="return confirm('Are you sure you want to update this expense?');">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="<?= $expenses['name']; ?>" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" id="phone" value="<?= $expenses['phone']; ?>" class="form-control" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control" placeholder="Choose Photo">
                                    
                                        <img src="<?= base_url('uploads/'.$expenses['photo'])?>" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" id="amount" value="<?= $expenses['amount']; ?>" class="form-control" placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="expense">Expense</label>
                                        <input type="text" name="expense" id="expense" value="<?= $expenses['expense']; ?>" class="form-control" placeholder="Enter Expense" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="total_expense">Total Expense</label>
                                        <input type="number" name="total_expense" id="total_expense" value="<?= $expenses['total_expense']; ?>" class="form-control" placeholder="Enter Total Expense" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-4">Update Expense</button>
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
