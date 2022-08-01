<!-- Category Modal Start -->
<div class="modal fade" id="add_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form accept-charset="utf-8" id="add_category">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="category_name" class="col-form-label">Category Name</label>
						<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category name...">
						<small name="category_name_help" id="category_name_help" class="text-danger font-weight-bold"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Create</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Category Modal End -->

<!--Edit Category Modal Start -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form accept-charset="utf-8" id="editCategory">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					{{-- Edit Category Id --}}
					<input type="hidden" class="form-control" name="edit_category_id" id="edit_category_id">
					<div class="mb-3">
						<label for="category_name" class="col-form-label">Category Name</label>
						<input type="text" class="form-control" name="edit_category" id="edit_category" placeholder="Edit Category name...">
						<small name="edit_category_help" id="edit_category_help" class="text-danger font-weight-bold"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Update</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Category Modal End