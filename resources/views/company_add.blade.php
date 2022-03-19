<div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
        <div class="card">

            <form method="POST"  id="formAddCompany" class="lcs-form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputName">Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputName" name="name"/>
                                <span class="text-danger input-error name-error"></span>
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
                                <label for="inputWebsite">Website :</label>
                                <input type="text" class="form-control" id="inputWebsite" name="website"/>
                                <span class="text-danger input-error website-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" name="image" placeholder="Choose image" id="inputImage">
                                <span class="text-danger input-error image-error"></span>
                                <div id="uploadmessage"></div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <img id="preview-image-before-upload" src="{{ asset('images/jpg/no-image.jpg') }}" alt="preview image" style="max-width: 100%;">
                            <input type="hidden" name="image_path" id="image_path">
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
        $("#formAddCompany").submit(function (event) {
            event.preventDefault();
            $('.input-error').html("");

            /*var name= $("#inputName").val();
            var email= $("#inputEmail").val();
            var website= $("#inputWebsite").val();
            var image= $("#inputImage").val();*/
            let formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{URL::to('company/addcompanyprocess')}}",
                //data: {"_token": "{{ csrf_token() }}",name:name,email:email,website:website,image:image},
                data: new FormData(this), 
                contentType:false,          // The content type used when sending data to the server.  
                cache:false,                // To unable request pages to be cached  
                processData:false,    
                success: function(data) {
                    if(data.success == true){
                        $('.message-box').html('<div class="alert alert-success">'+ data.message +'</div>');
                        $('#formAddCompany')[0].reset();
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputImage").change(function(){
            $("#image_path").text("");
            //$("#image").val("");

            readURL(this);
            
        });

        
    });


    
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
     
    
</script>