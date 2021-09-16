
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
        @include('header')

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-lg-12">
                        <div class="card">
                           <div class="row card-header">
                                <h3>Product View</h3>
                            </div>
                                <div class="card-body">
                                  <table class="table">
                                     <thead class="thead-dark">
				         <tr>
					   <th scope="col">#</th>
					   <th scope="col">Name</th>
					   <th scope="col">Create at</th>
					   <th scope="col">Status</th>
					   <th scope="col">Action</th>
					</tr>
				     </thead>
                                     <tbody>
                                         @foreach ($prodectlist as $prodectlist)
                                          <tr>
                                             <td>{{$prodectlist->id}}</td>
                                             <td>{{$prodectlist->product_name}}</td>
                                             <td>{{date('y-m-d',strtotime($prodectlist->created_at))}}</td>
                                             <td>{{$prodectlist->status}}</td>
                                             <td>
                                                <button type="button" id="edit" style="border-radius: 10px;"  class=" btn  btn-primary  btn-sm"><i class="fa  fa-pencil-square-o "></i></button>

                                                <button type="button" id="delete" style="border-radius: 10px;" class=" btn edit btn-warning btn-sm "><i class="fa fa-eye"></i></button>
                                              </td>
                                        </tr> 
                                        @endforeach     
                                        </tbody>   
                                    </table>
                                </div>
                                                <div class="card-footer">
                                                        <a> Back</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        @include('scrpit')

</body>
</html>