<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>



<div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Add new report</h6>
                </div>
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-dark float-right"><?php echo date('Y-m-d H:i'); ?></h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Stadium</option>
                            <option>Pengkalan</option>
                            <option>AreaB</option>
                            <option>AreaC</option>
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <div class="form-group col-md-4">
                        <label for="inputState">Incident Type</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Fire</option>
                            <option>Others</option>
                        </select>
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;

                    <div class="form-group col-md-4">
                        <label for="">Incident datetime</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Support document</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label">Choose file...</label>
                        </div>

                    </div>
                </div>
                <div class="row float-right">
                    <button type="submit" class="btn btn-dark">Clear all</button>
                    &nbsp;
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
    </div>


</div>




<?php

include('includes/scripts.php');
include('includes/footer.php');

?>