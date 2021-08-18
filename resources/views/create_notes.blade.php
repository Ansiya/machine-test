@extends('layouts.public')

@section('content')



<div class="panel-header panel-header-sm"> </div>
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Create Note</h5>
                <form method="post" action="/create" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                  <input type="hidden" name="us_id" value="{{$us_id}}"/>
                  <input type="hidden" name="pf_id" value="{{$pf_id}}"/>

                  <div class="form-group col-lg-6 col-md-6">
                    <label>Note</label>
                    <input type="text" class="form-control" required name="no_note" id="no_note">
                  </div>

                  <div class=" col-lg-6 col-md-6">
                    <label>File</label>
                    <input type="file"   name="file" id="file" style="display: block;border: 1px solid #ccc;padding: 5px;width:100%;border-radius: 20px;">
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <button class="btn btn-primary pull-right" id="transfer" type="submit" >Create</button>
                    
                  </div>
                </form>
              </div>
		       </div>
	        </div>
        </div>
      </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection

