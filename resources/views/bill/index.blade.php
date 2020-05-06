@extends('layouts.master')
@section('styles')
    <link type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/jquery-datatable/media/css/jquery.dataTables.css')}}">
    <link type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}">
    <link media="screen" type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}">
    <link media="screen" type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}">
@endsection
@section('title', 'Bills')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-body" id="form-body">
                            <label>Start Date</label>
                            <div class="input-group input-daterange date">
                                <input type="text" id="start-date" class="form-control">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="end-date" class="form-control">
                                <button class="btn btn-success m-l-10" onclick="getDataByRange()">Get</button>
                            </div>
                            <div class=" m-t-10">
                                <button class="btn btn-info" onclick="getTodayData()">Today</button>
                                <button class="btn btn-warning" onclick="getMonthData()">Month</button>
                            </div>
                            <div class="form-group form-group-default m-t-10">
                                <label for="employee_id">Employee</label>
                                <select class="full-width" name="employee_id" id="employee_id"
                                        onchange="setEmployeeParam($(this).val())">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{route('bill.create')}}" class="btn btn-success text-white m-b-10">Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        <table id="resource-table" class="table table-hover dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Staff</th>
                                <th>Customer</th>
                                <th>Services</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th colspan="6" class="text-center">
                                    Total Price is <span id="total_price" class="text-success"></span>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}">
    </script>
    <script src="{{url('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}"
            type="text/javascript"></script>
    <script src="{{url('assets/plugins/datatables-responsive/js/lodash.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('assets/js/axios.min.js')}}"></script>
    <script src="{{url('assets/js/select-initializer.js')}}"></script>
    <script>
        let table = $('#resource-table');
        let params = {};
        $(document).ready(function () {
            table.dataTable({
                "sDom": "<'table-responsive't><'row'<p i>>",
                "sPaginationType": "bootstrap",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "iDisplayLength": 15,
                ajax: {
                    url: "{{route('bill.get')}}",
                    dataSrc: "data"
                },
                columns: [
                    {
                        data: null,
                    },
                    {
                        data: 'employee.name'
                    },
                    {
                        data: 'customer.name'
                    },
                    {
                        data: 'services',
                        render: function (data, type, row) {
                            return data.map(val => val.name).toString()
                        }
                    },
                    {
                        data: 'bill_price'
                    },
                    {
                        data: 'edit_url',
                        render: function (data, type, row) {
                            return `<a class='btn btn-sm btn-warning' href="${data}">Edit</a>`
                        }
                    }
                ],
                columnDefs: [
                    {"width": '5%', targets: 0},
                ]
            });

            $('.date').datepicker({
                format: 'dd-mm-yyyy',
                todayBtn: true
            });
            setSelectResource("{{route('getEmployees')}}", 'employee_id', null, '', true);
        });

        table.on('init.dt draw.dt', function () {
            table.api().column(0).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
            let total_price = 0;
            table.api().column(4).nodes().each(function (cell, i) {
                total_price += Number(cell.innerHTML);
            });
            $('#total_price').html(total_price)
        });
        $('#search-table').keyup(function () {
            table.fnFilter($(this).val());
        });

        function getDataByRange() {
            params['start_date'] = $('#start-date').val();
            params['end_date'] = $('#end-date').val();
            initializeDataTable();
        }

        function getTodayData() {
            delete params['start_date'];
            delete params['end_date'];
            initializeDataTable();
        }

        function getMonthData() {

            const date = new Date();
            params['start_date'] = convertDate(new Date(date.getFullYear(), date.getMonth(), 1));
            params['end_date'] = convertDate(new Date(date.getFullYear(), date.getMonth() + 1, 0));
            initializeDataTable();
        }

        function convertDate(inputFormat) {
            function pad(s) {
                return (s < 10) ? '0' + s : s;
            }

            var d = new Date(inputFormat);
            return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('-')
        }

        function setEmployeeParam(value) {
            params['employee_id'] = value;
            initializeDataTable()
        }

        function initializeDataTable() {
            let url = `{{route('bill.get')}}?`;
            parameter = [];
            Object.keys(params).forEach(value => {
                parameter.push(`${value}=${params[value]}`);
            });
            url += parameter.join('&');
            console.log(url);
            table.api().ajax.url(url).load();
        }


    </script>
@endsection
