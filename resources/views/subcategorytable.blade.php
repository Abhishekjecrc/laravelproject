<!-- {{$i=1;}} -->
@foreach ($cat as $category)
<tr>
    <td>{{$i++}}</td>
    <td class="row-data">{{$category->sub_category_name}}</td>
    <td>{{$category->categoryname}}</td>
    <td class="row-data"> <img src="{{ asset('storage/app/image/3/'.$category->image) }}" style="width: 50px;height: 50px;" /> </td>
    <td class="row-data">{{ date('Y-m-d', strtotime($category->created_at))}}</td>
    @if($category->status=='Active')
    <td class="row-data"><button type="button" id="status" value={{$category->status."_". $category->id }} class="status btn btn-primary btn-rounded waves-effect">Active</button></td>
    @else
    <td class="row-data"><button type="button" id="status" value={{$category->status."_".$category->id}} class=" btn status btn-danger btn-rounded waves-effect">Inactive</button></td>
    @endif
    <td>
        <button type="button" id="edit" onclick="edit('{{$category->sub_category_name}}','{{$category->id}}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class=" btn edit btn-primary btn-rounded waves-effect"><i class="fa fa-pencil-square-o"></i></button>
        <button type="button" id="delete" onclick="SubcategoryDelete('{{$category->id}}')" data-bs-toggle="modal" data-bs-target="#subcategorydelete" class=" btn edit btn-danger btn-rounded waves-effect"><i class="fa fa-trash-o"></i></button>
    </td>
</tr>
@endforeach


<script>
    $(".status").click(() => {
        var data = event.target.value;
        var status = data.split('_')
        status = (status[0] == 'Active') ? "Deactive" : "Active"
        Swal.fire({
            title: 'Are you sure want to ' + status + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ' + status + ' it!'
        }).then((result) => {
            if (result.isConfirmed) {
                jQuery.ajax({
                    url: "{{ url('/subcategorystatus') }}",
                    method: 'GET',
                    data: {
                        name: data,
                    },
                    success: function(result) {
                        Swal.fire(
                            status,
                            'Your Category has been ' + status + '.',
                            'success'
                        )
                        jQuery.ajax({
                            url: "{{ url('/tableData') }}",
                            method: 'GET',
                            success: function(result) {
                                $("tbody").html(result)
                            }
                        });
                    }
                });
            }
        })
    })

    function edit(name, id) {
        $("#Edit_category_name").val(name)
        $("#edit_category_id").val(id)
    }

    function SubcategoryDelete(id) {
        $("#deleteid").val(id)
    }
</script>
