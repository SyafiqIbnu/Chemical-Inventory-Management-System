<?php
/**
 * Created by Mohamad Fairol Zamzuri B Che Sayuti
 * User: mfz_peyo@yahoo.com
 * Date: 25 Sept 2017
 * Time: 11:00 am
 */
namespace App\Classes;

use App\Trail;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DPExportListHelper extends Facade{
	protected static function getFacadeAccessor() { return 'DPExportListHelper'; }

	public static function showReport($type,$vars){
            if($type=="html"){
                $template=$vars['templates']['html'];	
                return view($template,$vars);	
            }else if($type=="excel"){
                return self::exportToExcel($vars);
            }else if($type=="pdf"){
                return self::exportToPdf($vars);
            }else{
                return "Invalid";
            }       
	}
	
	public static function exportToPdf($vars){
            $template=$vars['templates']['pdf'];
            $pdf = PDF::loadView($template,$vars);

            if(isset($vars['paperOption'])){
                $paperOption=$vars['paperOption'];
                $pdf->setPaper($paperOption['s'],$paperOption['o']);
            }
            $export_filename=Request()->path();
        
            if(isset($vars['export_filename'])){
                $export_filename=$vars['export_filename'];
            }
            return $pdf->stream($export_filename.'.pdf');
	}

	public static function exportToExcel($vars){
		$title=$vars['title'];

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$filename=$title.".xlsx";

		$data = [];
		$rows=$vars['results'];
		$headings=$vars['headings'];
		$fields=$vars['fields'];
		$title=$vars['title'];
		if(isset($vars['company'])){
			$company=$vars['company'];
		}

		$lastCol="A";
		foreach($rows as $row) {
			$b=array();
			foreach($fields as $col){
				$b[]=html_entity_decode($row->$col);
			}
			$data[]=$b;
		}

		foreach($headings as $f) {
			$spreadsheet->getActiveSheet()->getColumnDimension($lastCol)->setAutoSize(true);
			$lastCol++;
		}
		$sheet->setCellValue('A1',config('app.name'));		
		$sheet->setCellValue('A2',$title);		
		$sheet->mergeCells('A1:'.$lastCol.'1');
		$sheet->mergeCells('A2:'.$lastCol.'2');
		$sheet->getStyle('A1')->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, 'textRotation' => 0, 'wrapText' => TRUE ] );
		$sheet->getStyle('A2')->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, 'textRotation' => 0, 'wrapText' => TRUE ] );
		
		$sheet->fromArray($headings, null, 'A4', false, false);
		$sheet->fromArray($data, null, 'A5', false, false);

		$offset=5;
		$rowCount=count($data);
		$offset+=$rowCount;
		$offset++;
		//$sheet->prependRow(1, $headings);
		$sheet->fromArray(array(__('general.generated_by').' :', Auth::user()->name),null,'A'.$offset++);
		$sheet->fromArray(array(__('general.generated_date').' :', date('d-M-Y H:i')),null,'A'.$offset++);
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		//print $title;
		//exit();
		/*Excel::create($title, function($excel) use ($vars) {
			$selectedValue='0';

			if ( ! empty( $id))
			{
				$selectedValue=$id;
			}
			
			$excel->sheet('Sheet 1', function($sheet) use ($vars){
				$data = [];
				$rows=$vars['results'];
				$headings=$vars['headings'];
				$fields=$vars['fields'];
				$title=$vars['title'];
				if(isset($vars['company'])){
					$company=$vars['company'];
				}
		
				$lastCol="A";
				foreach($rows as $row) {
				   $b=array();
				   foreach($fields as $col){
					   $b[]=html_entity_decode($row->$col);
				   }
				   $data[]=$b;
			   }
			   $sheet->fromArray($data, null, 'A1', false, false);
			   $sheet->prependRow(1, $headings);
			   foreach($headings as $f) {
					$lastCol++;
			   }
			   $sheet->prependRow(1, [$title]);
			   $sheet->mergeCells('A1:'.$lastCol.'1');
			   $sheet->cell('A1', function($cell) {
				   $cell->setAlignment('center');
			   });
			   
			   $sheet->prependRow(1, [config('app.name')]);
			   $sheet->mergeCells('A1:'.$lastCol.'1');
			   $sheet->cell('A1', function($cell) {
				   $cell->setAlignment('center');
			   });
			   
			   $sheet->prependRow(2, ['']);
			   $sheet->prependRow(4, ['']);
			   
			   if(isset($company)){
					$sheet->prependRow(5, [__('company.company_name').' :'.$company->cpy_name]);
					$sheet->prependRow(6, [__('company.company_regno').' :'.$company->cpy_regno]);
					$sheet->prependRow(7, [__('company.company_type').' :'.$company->ct_name]);
			   	   $sheet->prependRow(8, ['']);
			   }
			   			   
			   //Append Exporter Info
			   $sheet->appendRow(array('',''));
			   $sheet->appendRow(array(__('general.generated_by').' :', Auth::user()->user_fullname));
			   $sheet->appendRow(array(__('general.generated_date').' :', date('d-M-Y H:i')));
			});   
		})->export('xlsx');
		*/
	}	
}

?>