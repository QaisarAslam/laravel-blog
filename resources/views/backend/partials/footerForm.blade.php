<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->{{-- Ep_35(10:00) --}}
    <a href="#footer" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="footer">
        <h6 class="m-0 font-weight-bold text-primary">Footer Section</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse hide" id="footer"> {{-- Ep_35(23:33) --}}
        <div class="card-body">
            <form action="" method="POST" id="footer_section_form" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="footer_section" id="footer_section" value="{{ $footer->section_name ?? '' }}" />
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label for="twitter" class="ml-2">Twitter Link</label>
                        <input type="text" name="twitter" id="twitter" value="{{ $footer->twitter ?? '' }}" class="form-control" placeholder="www.twitter.com/profile">
                        <small class="text-danger ml-2" id="twitter_help" name="twitter_help"></small>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label for="facebook" class="ml-2">Facebook Link</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $footer->facebook ?? '' }}" placeholder="www.facebook.com/profile">
                        <small class="text-danger ml-2" id="facebook_help" name="facebook_help"></small>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label for="instagram" class="ml-2">Instagram Link</label>
                        <input type="text" name="instagram" id="instagram" value="{{ $footer->instagram ?? '' }}" class="form-control" placeholder="www.instagram.com/profile">
                        <small class="text-danger ml-2" name="instagram_help" id="instagram_help"></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>