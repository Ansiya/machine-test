<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\Note;

class NoteController extends Controller
{
    public function index($us_id,$pf_id)
    {
    	return view('/create_notes',['us_id'=>$us_id, 'pf_id'=>$pf_id]);
    }
    public function create(Request $request)
    {
    	$us_id=$request->input('us_id');
    	$pf_id=$request->input('pf_id');
    	$note=$request->input('no_note');

    	$notes=Note::insertGetId([
    				'no_user'=>$us_id,
    				'no_profile'=>$pf_id,
    				'no_note'=>$note
    	]);

    	if($request->hasFile('file')){
          
            $path = public_path("app/public/file/");
 
            if(!is_dir($path))
                mkdir($path, 0755, true);

            $rname = basename( $request->file('file')->getClientOriginalName() );
            $extension = $request->file('file')->extension();
            
            $without_extension = rtrim($rname, ".".$extension);

            $filename = "{$notes}_{$without_extension}_$extension";


            move_uploaded_file($_FILES['file']['tmp_name'], $path.$filename);

            Note::where('no_id', $notes)
                        ->update([
                            'no_file' => $filename,
                            'no_file_rname'=>$rname
                        ]);

          }
    	return view('/create_notes',['us_id'=>$us_id,'pf_id'=>$pf_id]);
    }
    public function manage($us_id)
    {
    	$notes=Note::where('no_user',$us_id)
    	            ->get();
    	return view('/manage_notes',['us_id'=>$us_id,'notes'=>$notes]);
    }
    public function noteedit(Request $request)
    {
    	$no_id=$request->input('no_id');
    	$note=Note::where('no_id',$no_id)
                ->first();
    	return view("/update_notes",['note'=>$note]);
    }
    public function update(Request $request)
    {
    	$no_id=$request->input('no_id');
    	$us_id=$request->input('us_id');
    	$pf_id=$request->input('pf_id');
    	$note=$request->input('no_note');

    	$notes=Note::where('no_id',$no_id)
    	           ->update([
    				'no_note'=>$note
    	]);

    	if($request->hasFile('file')){
          
            $path = public_path("app/public/file/");
 
            if(!is_dir($path))
                mkdir($path, 0755, true);

            $rname = basename( $request->file('file')->getClientOriginalName() );
            $extension = $request->file('file')->extension();
            
            $without_extension = rtrim($rname, ".".$extension);

            $filename = "{$notes}_{$without_extension}_$extension";


            move_uploaded_file($_FILES['file']['tmp_name'], $path.$filename);

            Note::where('no_id', $notes)
                        ->update([
                            'no_file' => $filename,
                            'no_file_rname'=>$rname
                        ]);

          }
    	return redirect('/manage/note/'.$us_id);
    }
    public function delete(Request $request, $no_id)
    {
      try
      {
         Note::where('no_id',$no_id)->delete();
         return "Deleted";
      }
      catch(Exception $e)
      {
        return "Cannot delete";
         
      }
    }
}
