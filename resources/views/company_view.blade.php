<div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
        <div class="card">

            <form method="POST"  id="formViewCompany" class="lcs-form">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputName">Name : <span class="required">*</span></label>
                                <input type="text" class="form-control" id="inputName" name="name" value="{{$company->name}}" readonly />
                                <span class="text-danger input-error name-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEmail">Email :</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$company->email}}" readonly />
                                <span class="text-danger input-error email-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputWebsite">Website :</label>
                                <input type="text" class="form-control" id="inputWebsite" name="website" value="{{$company->website}}" readonly/>
                                <span class="text-danger input-error website-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-md-8">
                            <div class="form-group">
                                <input type="file" name="image" placeholder="Choose image" id="inputImage">
                                <span class="text-danger input-error image-error"></span>
                                <div id="uploadmessage"></div>
                            </div>

                        </div> -->

                        <div class="col-md-4">
                            <?php if($company->logo!=""){?>
                                <img id="preview-image-before-upload" src="{{ asset('../storage/app/'.$company->logo.'')}} " alt="preview image" style="max-width: 100%;">
                            <?php }else{ ?>
                                <img id="preview-image-before-upload" src="{{ asset('images/jpg/no-image.jpg') }}" alt="preview image" style="max-width: 100%;">
                            <?php } ?>
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
                                <!-- <button type="submit" class="btn btn-success form-submit">Add</button> -->
                                <button type="button" class="btn btn-danger form-submit" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

