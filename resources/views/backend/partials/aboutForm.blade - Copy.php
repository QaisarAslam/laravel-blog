<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->{{-- Ep_35(10:00) --}}
    <a href="#aboutPage" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="aboutPage">
        <h6 class="m-0 font-weight-bold text-primary">About Page</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse hide" id="aboutPage">
        <div class="card-body">{{-- Due to use of ajax Erase <form action="{{ url('/blogCreate') }}" to "" below Ep_36(07:00) --}} <form action="" id="about_cms" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="about_section_name" id="about_section_name" value="{{ $about_section->section_name ?? '' }}"> {{-- Ep_36(07:30) --}}
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label for="about_heading" class="ml-2">About Heading</label>
                        <input type="text" name="about_heading" id="about_heading" value="{{ $about_section->about_heading ?? '' }}" class="form-control" placeholder="About Us">
                        <small id="about_heading_help" class="text-danger ml-2"></small>
                    </div>

                    <div class="form-group col-sm-12 col-md-12">
                        <label for="about_short_description" class="ml-2">About Short Description</label>
                        <input type="text" name="about_short_description" id="about_short_description" value="{{ $about_section->about_short_description ?? '' }}" class="form-control" placeholder="Short Description">
                        <small id="about_short_description_help" class="text-danger ml-2"></small>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="about_description" class="ml-2">Description</label>
                        <textarea type="text" name="about_description" id="about_description" class="form-control" {{--  rows="5" or--}} style="height: 150px;" placeholder="Description">{{ $about_section->about_description ?? '' }}</textarea>
                        <small id="about_description_help" class="text-danger ml-2"></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>{{-- Ep_36(08:30) --}}
            </form>
        </div>
    </div>
</div>