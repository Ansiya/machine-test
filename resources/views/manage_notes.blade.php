@extends('layouts.public')

@section('content')
<style>
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #f96332;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="panel-header panel-header-sm"> </div>
 <div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Notes List</h5>
          <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                  <div class="modal-body">
                      <div id="note_edit">
                      
                      </div>
                  </div>
              </div>
          </div>
          </div> 

          <table class="table table-stripped">
					<tr>
						<th>Note</th>
						<th>file</th>
						<th>Manage Account</th>
						
					</tr>
				    @foreach($notes as $no)
				     <tr id="no_{{$no->no_id}}">
				     	<td>{{$no->no_note}}</td>
				     	<td>{{$no->no_file_rname}}</td>
				     	<td>
                <button class="btn btn-primary" onclick="editno({{$no->no_id}})"><i class='fas fa-edit'></i></button>
                <button class="btn btn-primary" onclick="deleteno({{$no->no_id}})"><i class='fas fa-trash'></i></button>
				        </td>
				    </tr>
				 
				@endforeach
			</table>
			</div>
		</div>
	</div>
</div>

<script>
      var csrf_token = "{{ csrf_token() }}";

      function deleteno(no_id){
            if( confirm('Are you sure you want to delete this note?') ){
                location.href = "/note/delete/" + no_id;
            }
        }

      function editno(no_id)
      {
        $.post("/note/edit",{
          no_id: no_id,
           _token: csrf_token
          
        }, function(data){
             $("#note_edit").html(data);
             $("#noteModal").modal('show');
             alert(edited);
             location.reload()
        });
      }
</script>
@endsection