@extends('layouts.master')
@section('title')
    Add Customer
@endsection
@section('styles')
    <link media="screen" type="text/css" rel="stylesheet"
          href="{{url('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}">
@endsection
@section('breadcrumbs', Breadcrumbs::render('customer.create'))


@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-10 col-xs-12 offset-sm-1  offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form role="form" id="resource-create-form">
                        @csrf
                        <div class="form-group form-group-default ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Email</label>
                            <input type="email" value="" name="email_id" class="form-control">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Birth Date</label>
                            <div id="myDatepicker" class="input-group date">
                                <input type="text"
                                       name="birth_date" class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Anniversary Date</label>
                            <div id="myDatepicker" class="input-group date">
                                <input type="text"
                                       name="anniversary_date" class="form-control">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <button onclick="validateForm(event)" type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{url('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script>
        function validateForm(event) {
            $('#resource-create-form').validate({
                'rules': {
                    'name': 'required',
                    'email_id': 'email'
                },
                submitHandler: formSubmit
            });
        }
        $(document).ready(function () {
            $('.date').datepicker({
                format:'dd-mm-yyyy'
            });
        });
        function formSubmit() {
            const form = $('#resource-create-form')
            const formData = form.serializeArray();
            $.post("{{route('customer.store')}}", formData)
                .done(function (data) {
                    $('body').pgNotification({
                        style: 'circle',
                        message: "Customer Added Successfully",
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
