<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->{{-- Ep_35(10:00) --}}
    <a href="#contactPage" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="contactPage">
        <h6 class="m-0 font-weight-bold text-primary">Contact Page</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse hide" id="contactPage">
        <div class="card-body">
            <div class="card-body">
                <form action="" id="contact_cms" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="contact_section_name" id="contact_section_name" value="{{ $contact_section->section_name ?? '' }}">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label for="contact_heading" class="ml-2">Contact Heading</label>
                            <input type="text" name="contact_heading" id="contact_heading" value="{{ $contact_section->contact_heading ?? '' }}" class="form-control" placeholder="Contact Us">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label for="contact_short_description" class="ml-2">Why Contact Us</label>
                            <input type="text" name="contact_short_description" id="contact_short_description" class="form-control" value="{{ $contact_section->contact_short_description ?? '' }}" placeholder="Short Description">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="contact_description" class="ml-2">Description</label>
                            <textarea type="text" name="contact_description" id="contact_description" class="form-control" {{--  rows="5" or--}} style="height: 150px;" placeholder="Description">{{ $contact_section->contact_description ?? '' }}</textarea>
                            <small class="text-danger ml-2"></small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>