<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Laboratory;
use App\Faculty;
use App\Chemical;
use App\Staff;
use App\LaboratoryType;
class ReportController extends Controller
{
    public function ShowLaboratoryReport(Request $request)
    {
        if($request->faculty_id != null && $request->type_id != null)
        {
            $laboratories=Laboratory::where("faculty",$request->faculty_id)
            ->where("type",$request->type_id)->get();
        }
        //Find Only through faculty
        elseif($request->faculty_id != null && $request->type_id == null)
        {
            $laboratories=Laboratory::where("faculty",$request->faculty_id)->get();
        }
        //Find Only through type
        elseif($request->faculty_id == null && $request->type_id != null)
        {
            $laboratories=Laboratory::where("type",$request->type_id)->get();
        }
        else{
            $laboratories=Laboratory::all();
        }
        $modelLaboratory = new Laboratory();
		$faculty_list = Faculty::pluck('name','id');
        $type_list = LaboratoryType::pluck('name','id');

        return view('report.laboratory_report',compact('laboratories','modelLaboratory','faculty_list','type_list'));
    }

    public function ShowChemicalReport(Request $request)
    {   //All Filled
        if($request->laboratory_id != null && $request->staff_id != null && $request->item_brand != null && $request->item_location != null)
        {
            $chemicals=Chemical::where("laboratory_id",$request->laboratory_id)
            ->where("staff_id",$request->staff_id)
            ->where("item_brand",$request->item_brand)
            ->where("item_location",$request->item_location)->get();
        }
        //Find through laboratory_id and staff_id
        if($request->laboratory_id != null && $request->staff_id != null && $request->item_brand == null && $request->item_location == null)
        {
            $chemicals=Chemical::where("laboratory_id",$request->laboratory_id)
            ->where("staff_id",$request->staff_id)->get();
        }
        //Find through laboratory_id and item_brand
        if($request->laboratory_id != null && $request->staff_id == null && $request->item_brand != null && $request->item_location == null)
        {
            $chemicals=Chemical::where("laboratory_id",$request->laboratory_id)
            ->where("item_brand",$request->item_brand)->get();
        }
        //Find through laboratory_id and item_location
        if($request->laboratory_id != null && $request->staff_id == null && $request->item_brand == null && $request->item_location != null)
        {
            $chemicals=Chemical::where("laboratory_id",$request->laboratory_id)
            ->where("item_location",$request->item_location)->get();
        }
        //Find through item_brand and item_location
        if($request->laboratory_id == null && $request->staff_id == null && $request->item_brand != null && $request->item_location != null)
        {
            $chemicals=Chemical::where("item_brand",$request->item_brand)
            ->where("item_location",$request->item_location)->get();
        }
        //Find Only through laboratory
        elseif($request->laboratory_id != null && $request->staff_id == null && $request->item_brand == null)
        {
            $chemicals=Chemical::where("laboratory_id",$request->laboratory_id)->get();
        }
        //Find Only trough Staff
        elseif($request->laboratory_id == null && $request->staff_id != null)
        {
            $chemicals=Chemical::where("staff_id",$request->staff_id)->get();
        }
        //Find Only trough Item Brand
        elseif($request->laboratory_id == null && $request->staff_id == null && $request->item_brand != null)
        {
            $chemicals=Chemical::where("item_brand",'like','%'.$request->item_brand.'%')->get();
        }
        //Find Only trough Item Location
        elseif($request->laboratory_id == null && $request->staff_id == null && $request->item_brand == null && $request->item_location != null)
        {
            $chemicals=Chemical::where("item_location",'like','%'.$request->item_location.'%')->get();
        }
        //Find Only trough Date Opened
        elseif($request->laboratory_id == null && $request->staff_id == null && $request->item_brand == null && $request->item_location == null
        && $request->date_opened != null)
        {
            $chemicals=Chemical::where("date_opened",$request->date_opened)->get();
        }
        //Find Only trough Expiration Date
        elseif($request->laboratory_id == null && $request->staff_id == null && $request->item_brand == null && $request->item_location == null
        && $request->date_opened == null && $request->expiration_date != null)
        {
            $chemicals=Chemical::where("expiration_date",$request->expiration_date)->get();
        }
        else{
            $chemicals = Chemical::all();
        }
        $modelChemical = new Chemical();
		$laboratory_list = Laboratory::pluck('name','id');
        $staff_list = Staff::pluck('name','id');

        return view('report.chemical_report',compact('chemicals','laboratory_list','modelChemical','staff_list'));
    }
}
