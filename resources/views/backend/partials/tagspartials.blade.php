<!-- Add Tag Modal Start -->
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form accept-charset="utf-8" id="addTag">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="tagName" class="col-form-label">Tag Name</label>
						<input type="text" class="form-control" name="tagName" id="tagName" placeholder="Tag name...">
						<small name="tagNameHelp" id="tagNameHelp" class="text-danger font-weight-bold"></small>
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
<!-- Add Tag Modal End -->

<!--Edit Tag Modal Start -->
<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form accept-charset="utf-8" id="editTagg">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					{{-- Edit Tag Id --}}
					<input type="hidden" class="form-control" name="editTagId" id="editTagId">
					<div class="mb-3">
						<label for="tagName" class="col-form-label">Tag Name</label>
						<input type="text" class="form-control" name="editTag" id="editTag" placeholder="Edit Tag Name...">
						<small name="editTagHelp" id="editTagHelp" class="text-danger font-weight-bold"></small>
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
<!-- Edit Tag Modal End -->