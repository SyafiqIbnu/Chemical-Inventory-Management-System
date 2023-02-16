<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\File;
use App\Chemical;
class FileUploadController extends Controller
{
  public function createForm($chemicalid){
    
    return view('file_upload',compact('chemicalid'));
  }
  public function fileUpload(Request $req, $chemicalid){
    $exist=File::where('chemical_id',$chemicalid)->first();   
    if($exist!=null)
    {
      $exist->delete();
    } 
    $req->validate([
        'file' => 'required|mimes:pdf|max:2048'
        ]);
        $fileModel = new File();
        if($req->file()) {
            $fileName = $chemicalid.'_itemsheet.pdf';
            $filePath = $req->file('file')->storeAs('uploads/itemsheet', $fileName, 'public');

            $fileModel->chemical_id = $chemicalid;
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = $filePath;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
   public function view($chemicalid){
        $data = Chemical::find($chemicalid);
        return view('chemicalgeneral.viewfile',compact('data','chemicalid'));
   }
}