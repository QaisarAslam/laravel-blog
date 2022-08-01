<!-- Add Tag Modal Start -->
<div class="modal fade" id="msgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form accept-charset="utf-8" id="msgForm">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contact Message</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="name" class="col-form-label">Name</label>
						<input type="text" class="form-control" name="name" readonly="" id="name">
					</div>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="email" class="col-form-label">email</label>
						<input type="text" class="form-control" name="email" readonly="" id="email">
					</div>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="name" class="col-form-label">Message</label>
						<textarea name="message" readonly="" id="message" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Add Tag Modal End -->