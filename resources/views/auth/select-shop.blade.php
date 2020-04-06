<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Shop</title>
    @include('components.styles')
</head>

<body>
    <!-- START PAGE CONTENT -->
    <div class="content full-height">
        <!-- START PAGE COVER -->
        <div class="container-fluid full-height container-fixed-lg ">
            <div class="row align-items-center full-height">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column" style="min-height: 500px;">
                            <div class="row align-items-center flex-1">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <form action="{{route('setShop')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Select Shop</label>
                                            <select name="shop" class="cs-select cs-skin-slide"
                                                data-init-plugin="cs-select">
                                                @foreach ($shops as $shop)
                                                <option value="{{$shop->id}}">{{$shop->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-success">Select</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/classie/classie.js" type="text/javascript"></script>
    @include('components.scripts')

</body>

</html>
