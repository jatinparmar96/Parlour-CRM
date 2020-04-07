@extends('layouts.master')
@section('title')
Create a Service
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10 col-xs-12 offset-sm-1  offset-md-2">
        <div class="card">
            <div class="card-body">
                <form role="form" id="resource-create-form">
                    @csrf
                    <div class="form-group form-group-default ">
                        <label>Name</label>
                    <input type="text" name="name" value="{{$service->name}}" class="form-control" required>
                    </div>

                    <div class="form-group form-group-default">
                        <label>Cost</label>
                        <input type="number" name="cost" value="{{$service->cost}}" class="form-control" required>
                    </div>

                    <div class="form-group form-group-default">
                        <label>Charge</label>
                        <input type="number" value="{{$service->charge}}" name="charge" class="form-control" required>
                    </div>


                    <div class="form-group form-group-default">
                        <label>Description</label>
                        <input type="text" class="form-control" value="{{$service->description}}" name="description">
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
<script>
    function validateForm(event) {
        $('#resource-create-form').validate({
            'rules': {
                'name': 'required',
                'cost': 'required',
            },
            submitHandler: formSubmit
        });
    }

    function formSubmit() {
        const form = $('#resource-create-form')
        const formData = form.serializeArray();
        $.post("{{route('service.update',$service->id)}}"+"?_method=PUT", formData)
            .done(function (data) {
                $('body').pgNotification({
                        style: 'circle',
                        message: "Service Edited Successfully",
                        type: "success",
                        timeout: 4000,
                    })
                    .show()
            })
            .fail(function (error) {
                console.log(error)
            });
    }

</script>
@endsection
