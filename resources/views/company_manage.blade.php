@extends('layouts.app')

@section('content')

<div class="row purchace-popup">
    <div class="col-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-header d-block d-md-flex">
                <h5 class="mb-0">{{ $page_title }}</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <a type="button" class="btn btn-success" onclick="add_company();">Add New</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tableCompanies">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th style="width: 100px;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php  $x = 0;?>
                                        @foreach ($companies as $company)
                                        <?php $x++;?>
                                        <tr>
                                            <td>{{ ($companies->total() - ($companies->firstItem() + $loop->index)) + 1 }}</td>
                                            <td></td>
                                            <td><?php echo $company->name;?></td>
                                            <td><?php echo $company->email;?></td>
                                            <td><?php echo $company->website;?></td>
                                            <td width="100px">
                                                <a onclick="view_company(<?php echo $company->id;?>);"><img src="{{ asset('images/png/view.png') }}"  width="15px"/></a>&nbsp;&nbsp;
                                                <a onclick="update_company(<?php echo $company->id;?>);"><img src="{{ asset('images/png/edit.png') }}"  width="15px"/></a>&nbsp;&nbsp;
                                                <a onclick="delete_company(<?php echo $company->id;?>);"><img src="{{ asset('images/png/delete.png') }}"  width="15px"/></a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <div id="tableMessage"></div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{$companies->links("pagination::bootstrap-5")}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    /*window.addEventListener('DOMContentLoaded', event => {
        const tableCompanies = document.getElementById('tableCompanies');
        if (tableCompanies) {
            new simpleDatatables.DataTable(tableCompanies);
        }
    });*/

    function add_company() {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('company/addcompanyajax')}}",
            data: {"_token": "{{ csrf_token() }}"},
            success: function(content) {
                load_modal('Add Company',content.element);
            },
            error: function(){

            }
        });

    }

    function view_company(company_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('company/viewcompanyajax')}}",
            data: {"_token": "{{ csrf_token() }}",company_id:company_id},
            success: function(content) {
                load_modal('View Company',content.element);
            },
            error: function(){

            }
        });

    }

    function update_company(company_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('company/updatecompanyajax')}}",
            data: {"_token": "{{ csrf_token() }}",company_id:company_id},
            success: function(content) {
                load_modal('Update Company',content.element);
            },
            error: function(){

            }
        });

    }

    function delete_company(company_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('company/deletecompanyprocess')}}",
            data: {"_token": "{{ csrf_token() }}",company_id:company_id},
            success: function(content) {
                if(content==1){
                    $('#tableMessage').html('<div class="alert alert-success">Data deleted successfully</div>');
                    setTimeout(function(){
                        window.location.reload();
                    },50);
                }else{
                    $('#tableMessage').html('<div class="alert alert-success">Something went wrong</div>');
                    setTimeout(function(){
                        window.location.reload();
                    },50);
                }
            },
            error: function(){

            }
        });

    }



</script>

@endsection