<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
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
                    <h6 class="m-0 font-weight-bold text-dark float-right"><?php echo date('Y-m-d h:ia'); ?></h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="m-0 font-weight-bold text-secondary">Branch Info</h6>
            &nbsp;
            &nbsp;
            <form>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputState">Branch</label>
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
                    <div class="form-group col-2">
                        <label for="incidentStatus">Incident Status</label>
                        <select class="form-control">
                            <option selected>Choose...</option>
                            <option>Early stage</option>
                            <option>Mid Stage</option>
                            <option>Closed</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h6 class="m-0 font-weight-bold text-secondary">Incident Info</h6>
                &nbsp;
                &nbsp;
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputState">Branch</label>
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
                    <div class="form-group col">
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

                    <div class="form-group col">
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
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Incident</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <div class="form-group col-2">
                        <label for="incidentStatus">Incident Status</label>
                        <select class="form-control">
                            <option selected>Choose...</option>
                            <option>Early stage</option>
                            <option>Mid Stage</option>
                            <option>Closed</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address..">
                </div>
                <hr>
                <h6 class="m-0 font-weight-bold text-secondary">Victim Info</h6>
                &nbsp;
                &nbsp;
                <div class="form-row">
                    <div class="form-group col-3">
                        <label>Fatalities</label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label>Fatalities</label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label>Injured</label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-3">
                        <label>Saved</label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Person</label>
                            </div>

                        </div>
                    </div>
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
                <hr>
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