<div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
        <div class="card">

            <form method="POST"  id="formAddEmployee" class="lcs-form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFirstName">First Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name"/>
                                <span class="text-danger input-error first_name-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputLastName">Last Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name"/>
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
                                        <option value="<?php echo $company->id;?>"><?php echo $company->name;?></option>
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
                                <input type="email" class="form-control" id="inputEmail" name="email"/>
                                <span class="text-danger input-error email-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputPhone">Phone :</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone"/>
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
                                <button type="submit" class="btn btn-success form-submit">Add</button>
                                <button type="button" class="btn btn-danger form-submit" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#formAddEmployee").submit(function (event) {
            event.preventDefault();
            $('.input-error').html("");

            /*var name= $("#inputName").val();
            var email= $("#inputEmail").val();
            var website= $("#inputWebsite").val();
            var image= $("#inputImage").val();*/
            let formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{URL::to('employee/addemployeeprocess')}}",
                //data: {"_token": "{{ csrf_token() }}",name:name,email:email,website:website,image:image},
                data: new FormData(this), 
                contentType:false,          // The content type used when sending data to the server.  
                cache:false,                // To unable request pages to be cached  
                processData:false,    
                success: function(data) {
                    if(data.success == true){
                        $('.message-box').html('<div class="alert alert-success">'+ data.message +'</div>');
                        $('#formAddEmployee')[0].reset();
                        setTimeout(function(){
                            window.location.reload();
                        },50);
                        
                    }
                },
                error: function(data){
                    var errors = data.responseJSON;
                    $.each(data.responseJSON.message, function (key, value) {
                        $('.'+key+'-error').html(value);
                    });
                    
                }
            });
        });

        
    });


    
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
     
    
</script>