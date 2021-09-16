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
						<div class="row card-header">
							<div class="col-lg-9">
								<strong class="card-title">Category</strong>
							</div>
							<div class="col-lg-3 ">
								<button class="btn btn-success" id="add_category" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="fa  fa-plus"></i> Add Category </button>
							</div>
						</div>
						<div class="card-body">
							<table class="table" id="category_table">
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Category Name</th>
										<th scope="col">Image</th>
										<th scope="col">Create At</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .animated -->
	</div>


	<!-- Add Model -->

	<div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Add Category </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_add" method="" enctype="multipart/form-data">

						<div class="mb-3">
							<label for="category-name" class="col-form-label">Category Name:</label>
							<input type="text" class="form-control" name="category-name" id="category-name">
						</div>
						<div class="mb-3">
							<label for="category_image" class="col-form-label">Category Image:</label>
							<input type="file" accept="image/png, image/gif, image/jpeg" class="form-contro-file " name="image" id="category_image">
						</div>
					</form>
					<img id="blah" src="#" alt="your image" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="insert" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Add categroy MODEl END -->

	<!-- Edit Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Category Edit</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_edit" method="" enctype="multipart/form-data">

						<div class="mb-3">
							<label for="Edit_category_name" class="col-form-label">Category Name:</label>
							<input type="text" class="form-control" name="category-name" id="Edit_category_name">
						</div>
						<div class="mb-3">
							<label for="edit_category_image" class="col-form-label">Category Image:</label>
							<input type="file" accept="image/png, image/gif, image/jpeg" class="form-control-file" name="image" id="edit_category_image">
						</div>
						<input type="hidden" value="" name="category_id" id="edit_category_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="update" class="btn btn-primary" data-bs-dismiss="modal">Updated</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Delete -->

	<div class="modal fade" id="Delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Category Delete</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form_delete" method="">
						<div class="mb-3">
							<label for="Edit_category_name" class="col-form-label">Remark:</label>
							<input type="text" class="form-control" name="remark" id="remark">
						</div>

						<input type="hidden" value="" name="delete_category_id" id="delete_category_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="delete" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
				</div>
			</div>
		</div>
	</div>



	@include('scrpit')

	<script>
		$(document).ready(() => {
			$("#blah").hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-Token': '{{csrf_token() }}'
				}
			})
			jQuery.ajax({
				url: "{{ url('/ajaxRequest') }}",
				method: 'GET',
				success: function(result) {
					$("tbody").html(result)
				}
			});
		})
		$("#add_category").click(() => {
			$("input").attr("required", "true");
		})
		$("#insert").click(() => {
			if (($("#category-name").val() === '') || ($("#category_image").get(0).files.length === 0)) {

				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Please Insert All Feild!',
				})
			} else {
				$("#addCategory").modal('hide');
				var formData = new FormData($("#form_add")[0]);
				$.ajax({
					url: "{{ url('/insert') }}",
					method: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					success: function(result) {
						Swal.fire(
							status,
							'Your Category has been  Add',
							'success'
						)
						jQuery.ajax({
							url: "{{ url('/ajaxRequest') }}",
							method: 'GET',
							success: function(result) {
								$("tbody").html(result)
							}
						});
					},
					error: function(result) {
						Swal.fire(
							status,
							'This Category Aleady Exist',
							'error'
						)
					}
				});
			}
		});
		$("#update").click(() => {
			var formData = new FormData($("#form_edit")[0]);
			$.ajax({
				url: "{{ url('/edit') }}",
				method: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function(result) {

				}
			});
		});
		$("#category_image").change((event) => {
			blah.src = ''
			var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
			if (!allowedExtensions.exec($("#category_image").val())) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Please Select Vaild File!',
				})
				$("#category_image").val('')
				return false;
			} else {
				$("#blah").show()
				blah.src = URL.createObjectURL(event.target.files[0]);
			}
		})
	</script>

	<script>
		$("#delete").click(() => {
			if ($("#remark").val() === '') {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Please Enter Remark!',
				})
			} else {
				Swal.fire({
					title: 'Are you sure want to Delete ?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, Delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: "{{ url('/edit2') }}",
							method: 'POST',
							data: {
								remark: $("#remark").val(),
								id: $("#delete_category_id").val()
							},
							success: function(result) {
								Swal.fire(
									status,
									'Your Category has been Deleted .',
									'success'
								)
								jQuery.ajax({
									url: "{{ url('/ajaxRequest') }}",
									method: 'GET',
									success: function(result) {
										$("tbody").html(result)
									}
								});
							},
							error: function(result) {
								Swal.fire(
									status,
									  "Please Delete before SubCategory",
									'error'
								)
							}
						});
					}
				})
			}
		})
	</script>
</body>

</html>