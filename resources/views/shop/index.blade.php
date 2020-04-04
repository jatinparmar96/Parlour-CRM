@extends('layouts.master')
@section('title')
    Employee
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="resource-table" class="table table-hover dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
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

<script type="text/javascript" src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js">
    <script type="text/javascript" src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js">
    <script type="text/javascript" src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js">
    <script src="assets/plugins/datatables-responsive/js/datatables.responsive.js" type="text/javascript">
    <script src="assets/plugins/datatables-responsive/js/lodash.min.js" type="text/javascript">
        <script>
    $(document).ready(function() {
        let data = JSON.parse('{!! $employees !!}');
        $('#resource-table').dataTable({
            data: data.data,
            columns:[
                {
                    data:'name'
                },
                {
                    data:'description'
                },
                {
                    data:'id',
                }
            ]
        });
   });
</script>
@endsection
