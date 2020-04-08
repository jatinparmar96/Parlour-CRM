@extends('layouts.master')
@section('title')
    Customers
@endsection

@section('breadcrumbs', Breadcrumbs::render('customer'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    <table id="resource-table" class="table table-hover dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript" src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js"></script>
    <script src="assets/plugins/datatables-responsive/js/datatables.responsive.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables-responsive/js/lodash.min.js" type="text/javascript"></script>
        <script>
            let table = $('#resource-table');
    $(document).ready(function () {
        let data = {!!$customers!!};

        table.dataTable({
            "sDom": "<'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5,
            data: data,
            columns:[
                {
                    data:'id',
                },
                {
                    data:'name'
                },
                {
                    data:'phone_number'
                },
                {
                    data:'email_id',
                },
                {
                    data:'action',
                }
            ]
        });
    });

    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });

</script>
@endsection
