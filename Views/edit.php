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
                            <a href="<?= base_url('Customer')?>" class="btn btn-danger float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('customer/update/' . $customer_master['id']); ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" name="customer_name" id="customer_name" value="<?= $customer_master['customer_name']; ?>" class="form-control" placeholder="Enter Customer Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="place">Place</label>
                                        <input type="text" name="place" id="place" value="<?= $customer_master['place']; ?>" class="form-control" placeholder="Enter Place">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" value="<?= $customer_master['mobile']; ?>" class="form-control" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="route_name">Route Name</label>
                                        <input type="text" name="route_name" id="route_name" value="<?= $customer_master['route_name']; ?>" class="form-control" placeholder="Enter Route Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="open_balance">Open Balance</label>
                                        <input type="text" name="open_balance" id="open_balance" value="<?= $customer_master['opbalance']; ?>" class="form-control" placeholder="Enter Open Balance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="close_balance">Close Balance</label>
                                        <input type="text" name="close_balance" id="close_balance" value="<?= $customer_master['clbalance']; ?>" class="form-control" placeholder="Enter Close Balance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="a_fixqty">a_fixqty</label>
                                        <input type="text" name="a_fixqty" id="a_fixqty" value="<?= $customer_master['a_fixqty']; ?>" class="form-control" placeholder="Enter a_fixqty">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_fixqty">b_fixqty</label>
                                        <input type="text" name="b_fixqty" id="b_fixqty" value="<?= $customer_master['b_fixqty']; ?>" class="form-control" placeholder="Enter b_fixqty">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="a_fixrate">a_fixrate</label>
                                        <input type="text" name="a_fixrate" id="a_fixrate" value="<?= $customer_master['a_fixrate'] ?? 0; ?>" class="form-control" placeholder="Enter a_fixrate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_fixrate">b_fixrate</label>
                                        <input type="text" name="b_fixrate" id="b_fixrate" value="<?= $customer_master['b_fixrate'] ?? 0; ?>" class="form-control" placeholder="Enter b_fixrate">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary px-4">Update Customer</button>
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
