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
                                <table class="table table-bordered" id="tableStudentTransactions">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Invoice Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection