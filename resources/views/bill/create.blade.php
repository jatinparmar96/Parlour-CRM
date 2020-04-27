@extends('layouts.master')
@section('title')
    Create Bill
@endsection
@section('styles')
    <style>
        .modal-open .select2-container {
            z-index: 0 !important;
        }
    </style>
    <link type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/jquery-datatable/media/css/jquery.dataTables.css')}}">
    <link type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}">
    <link media="screen" type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-10 col-xs-12 offset-sm-1  offset-md-2">
            <div class="card" id="form-body">
                <div class="card-body">
                    <form role="form" id="resource-create-form">
                        @csrf
                        <div class="form-group form-group-default ">
                            <label for="customer_id">Customer Name</label>
                            <select class="full-width" name="customer_id" id="customer_id">
                            </select>
                        </div>
                        <div class="form-group form-group-default ">
                            <label for="employee_id">Employee</label>
                            <select class="full-width" name="employee_id" id="employee_id">
                            </select>
                        </div>
                        <div class="card card-transparent">
                            <div class="card-header ">
                                <div class="card-title">Services
                                </div>
                                <div class="pull-right">
                                    <div class="col-xs-12">
                                        <button type="button" aria-label="" id="show-modal" data-toggle="modal"
                                                data-target="#service-modal"
                                                class="btn btn-primary btn-cons"><i
                                                class="pg-icon">add</i> Add Service
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body">
                                <table class="table demo-table-dynamic table-responsive-block"
                                       id="service-list-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button onclick="validateForm(event)" type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="service-modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group form-group-default ">
                            <label for="service">Service</label>
                            <select class="full-width" name="service" id="service">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-service">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{url('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}"></script>
    <script src="{{url('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}"
            type="text/javascript"></script>
    <script src="{{url('assets/plugins/datatables-responsive/js/lodash.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let selectedServices = [];
        $(document).ready(function () {
            setSelectResource("{{route('getEmployees')}}", 'employee_id');
            setSelectResource("{{route('getCustomers')}}", 'customer_id');
            setSelectResource("{{route('getServices')}}", 'service', 'service-modal',true);
            let table = $('#service-list-table').DataTable({
                "sDom": "t",
                "destroy": true,
                "paging": false,
                "scrollCollapse": true,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [[1, 'asc']],
            });
            table.on('draw', function () {
                table.column(0).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('#add-service').on('click', function () {
                const serviceData = JSON.parse($('#service').val());
                selectedServices.push(serviceData);
                table.row.add([
                    '',
                    serviceData.name,
                    serviceData.charge,
                    `<a class="btn btn-sm btn-danger"><i class="pg-icon text-white ">cross</i></a>`
                ]).draw(false);
            });
            $('#service-list-table tbody').on('click', 'a.btn.btn-sm', function () {
                selectedServices.splice(table.row($(this).parents('tr')).index(), 1);
                table
                    .row($(this).parents('tr'))
                    .remove()
                    .draw();
            });
        });

        function setSelectResource(url, selectId, dropDownParent = null,stringifyValue=false) {
            axios.get(url).then((data) => {
                let parsedData = JSON.parse(data.data.data);

                if(stringifyValue){
                    parsedData = parsedData.map(value => {
                        return {'id': JSON.stringify(value), 'text': value.name}
                    });
                }
                else{
                    parsedData = parsedData.map(value => {
                        return {'id': value.id, 'text': value.name}
                    });
                }

                if (!dropDownParent) {
                    $("#" + selectId).select2({
                        dropdownParent: $("#form-body"),
                        data: parsedData
                    });
                } else {
                    $("#" + selectId).select2({
                        dropdownParent: $("#" + dropDownParent),
                        data: parsedData
                    });
                }

            });
        }

        // Validate the Form
        function validateForm(event) {
            $('#resource-create-form').validate({
                'rules': {
                    'name': 'required',
                },
                submitHandler: formSubmit
            });
        }

        function formSubmit() {
            const form = $('#resource-create-form')
            let formData = form.serializeArray();
            formData.service_id = selectedServices;
            console.log(formData)
            $.post("{{route('bill.store')}}", formData)
                .done(function (data) {
                    $('body').pgNotification({
                        style: 'circle',
                        message: "Employee Added Successfully",
                        type: "success",
                        timeout: 4000,
                    })
                        .show()
                    form[0].reset();
                })
                .fail(function (error) {
                    console.log(error)
                });
        }
    </script>
@endsection
