<div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
        <div class="card">

            <form method="POST"  id="formViewEmployee" class="lcs-form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFirstName">First Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" value="{{$employee->first_name}}" readonly/>
                                <span class="text-danger input-error first_name-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputLastName">Last Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" value="{{$employee->last_name}}" readonly/>
                                <span class="text-danger input-error last_name-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputCompanyId">Company : <span class="required">*</span></label>
                                <select class="form-control" id="inputCompanyId" name="company_id">
                                    <option value="">Select Company</option>
                                    <?php foreach ($companies as $key => $company) { ?>
                                        <option value="<?php echo $company->id;?>" <?php if($company->id==$employee->company_id){echo "selected";};?>><?php echo $company->name;?></option>
                                    <?php } ?>
                                </select>
                                <span class="text-danger input-error company_id-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEmail">Email :</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$employee->email}}" readonly/>
                                <span class="text-danger input-error email-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputPhone">Phone :</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" value="{{$employee->phone}}" readonly />
                                <span class="text-danger input-error phone-error"></span>
                            </div>
                        </div>
                    </div>

                   
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="message-box"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="button" class="btn btn-danger form-submit" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
