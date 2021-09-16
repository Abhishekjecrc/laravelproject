<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('links')
</head>

<body>
    <!-- Header-->
    @include('header')
    <!-- /header -->
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row card-header" style="background-color: slategray">
                            <div class="col-md-9">
                                <h3>View Details</h3>
                            </div>
                            <div class="col-md-3">
                                <h4> <a href="adddetails" class="text-black" style="color: lightgray"><i class="fa  fa-plus"></i> Add Details</a></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="width-20">Name:</th>
                                            <td><input type="text" value="John Doe" disabled style="border: none;"> </td>
                                        </tr>
                                        <tr>
                                            <th>Brand:</th>
                                            <td> <input type="text" value="Oppo" disabled style="border: none;"></td>
                                        </tr>
                                        <tr>
                                            <th>Model:</th>
                                            <td> <input type="text" value="K20" disabled style="border: none;"></td>
                                        </tr>
                                        <tr>
                                            <th>Category:</th>
                                            <td>Mobile</td>
                                        </tr>
                                        <tr>
                                            <th>Gender:</th>
                                            <td>Male</td>
                                        </tr>
                                        <tr>
                                            <th>Size group:</th>
                                            <td>XL</td>
                                        </tr>
                                        <tr>
                                            <th>Color:</th>
                                            <td>White</td>
                                        </tr>
                                        <tr>
                                            <th>SKU:</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Relase Price (USD):</th>
                                            <td>14878 <b>$</b></td>
                                        </tr>
                                        <tr>
                                            <th>Relase Price (INR):</th>
                                            <td>17888<b>₹</b></td>
                                        </tr>
                                        <tr>
                                            <th>Relase Date:</th>
                                            <td>123 Fake St.<br>Albany NY, 12202</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
    @include('scrpit')


</body>

</html>