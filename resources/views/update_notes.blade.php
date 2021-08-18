<!DOCTYPE html>
<html>

 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <form method="post" action="/update" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <input type="hidden" name="no_id" value="{{$note->no_id}}"/>
                  <input type="hidden" name="us_id" value="{{$note->no_user}}"/>
                  <input type="hidden" name="pf_id" value="{{$note->no_profile}}"/>


                  <div class="form-group col-lg-12 col-md-12">
                    <label>Note</label>
                    <input type="text" class="form-control" value="{{$note->no_note}}" required name="no_note" id="no_note">
                  </div>

                  <div class=" col-lg-12 col-md-12">
                    <label>File</label>
                    <input type="file"   class="form-control" name="file" id="file" value="{{$note->no_file_rname}}" style="display: block;border: 1px solid #ccc;padding: 5px;width:100%;border-radius: 20px;">
                  </div>
                  <div class="form-group col-lg-12 col-md-12">
                    <button class="btn btn-primary pull-right" id="transfer" type="submit" >Update</button>
                    
                  </div>
                </form>
              </div>
		       </div>
	        </div>
        </div>
      </div>
      </html>