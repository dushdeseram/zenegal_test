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
                                <a type="button" class="btn btn-success" onclick="add_employee();">Add New</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tableeEmployees">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th style="width: 100px;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php  $x = 0;?>
                                        @foreach ($employees as $employee)
                                        <?php $x++;?>
                                        <tr>
                                            <td>{{ (($employees->firstItem() + $loop->index)) }}</td>
                                            <td><?php echo $employee->first_name;?></td>
                                            <td><?php echo $employee->last_name;?></td>
                                            <td>
                                                <?php $company= $CompanyModel->get_company_by_company_id($employee->company_id);
                                                    echo $company->name;
                                                ?>
                                            </td>
                                            <td><?php echo $employee->email;?></td>
                                            <td><?php echo $employee->phone;?></td>
                                            <td width="100px">
                                                <a onclick="view_employee(<?php echo $employee->id;?>);"><img src="{{ asset('images/png/view.png') }}"  width="15px"/></a>&nbsp;&nbsp;
                                                <a onclick="update_employee(<?php echo $employee->id;?>);"><img src="{{ asset('images/png/edit.png') }}"  width="15px"/></a>&nbsp;&nbsp;
                                                <a onclick="delete_employee(<?php echo $employee->id;?>);"><img src="{{ asset('images/png/delete.png') }}"  width="15px"/></a>&nbsp;&nbsp;
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
                                {{$employees->links("pagination::bootstrap-5")}}
                                
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

    function add_employee() {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('employee/addemployeeajax')}}",
            data: {"_token": "{{ csrf_token() }}"},
            success: function(content) {
                load_modal('Add Employee',content.element);
            },
            error: function(){

            }
        });

    }

    function view_employee(employee_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('employee/viewemployeeajax')}}",
            data: {"_token": "{{ csrf_token() }}",employee_id:employee_id},
            success: function(content) {
                load_modal('View Employee',content.element);
            },
            error: function(){

            }
        });

    }

    function update_employee(employee_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('employee/updateemployeeajax')}}",
            data: {"_token": "{{ csrf_token() }}",employee_id:employee_id},
            success: function(content) {
                load_modal('Update Employee',content.element);
            },
            error: function(){

            }
        });

    }

    function delete_employee(employee_id) {
        
        $.ajax({
            type:'POST',
            url: "{{URL::to('employee/deleteemployeeprocess')}}",
            data: {"_token": "{{ csrf_token() }}",employee_id:employee_id},
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