<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Permit;
use App\PermitApplication;
use Validator;
use DataTables;
use Carbon\Carbon;
use App\Chemical;
use App\Laboratory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title=__('general.dashboard');       
        // $ctrl=new AnnouncementController();
        // $announcements=$ctrl->getActiveList($request);
        $chemicals = Chemical::all();
        $laboratories = Laboratory::all();
        /*
        $ctrlApp=new ApplicationController();
        $applications=$ctrlApp->getActiveList($request);*/

        $modelUser = User::where('id',Auth::user()->id)->first();

        //dd($applications);
        $vars=compact('title','modelUser','chemicals','laboratories');

        return view('home.index',$vars);
    }

	public function logout(){
		Auth::logout();
		return redirect('/login');
	}

    /**
     * Get a listing data of the resource
     * Pengguna
     * @return  Datatable
     */
    private function getIndexData(Request $request){
        $dataChemical=Chemical::query();
        $account_holder_id = \App\Helpers\UserModelDataHelper::getUserAccountHolderId();
        $dataModels = PermitApplication::where('account_holder_id', '=', $account_holder_id);
        $dataTableModels= $this->returnindexAjax($request,$dataModels,$dataChemical); 
        return $dataTableModels;
    }

    /**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
    public function returnindexAjax(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('application_date', function($query) use($request){
            return $query->created_at ? Carbon::parse($query->created_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name; 
        })
        ->addColumn('permit_no', function($query) use($request){
            return $query->permitPermit->permit_no ?? null;  
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        })
        ->addColumn('permit_period', function($query) use($request){
            if($query->permit_application_status_id == 4){
                return Carbon::parse($query->permit_start_date)->format('d-m-Y').' hingga '.Carbon::parse($query->permit_end_date)->format('d-m-Y');
            }else{
                return '';
            } 
        })
        ->addColumn('action', function($query) use($request){
            $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='" . url('permit_application/' . $query->getKey()) . "/reportview'>PAPAR</a>";
            return $buttonView;
        });
        
        return $modelDatatables;
    }

    /**
     * Get a listing of the resource using ajax
     * 
     * @return  \Illuminate\Http\Response
     */
    public function indexAjax(Request $request) {
        $dataTableModels=$this->getIndexData($request);
        return $dataTableModels->make(true);
    }


    //Penyemak Tugasan Baru
    private function getIndexDataPenyemak(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where('permit_application_status_id', 1)->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPenyemak($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPenyemak(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('application_date', function($query) use($request){
            return $query->created_at ? Carbon::parse($query->created_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPenyemak(Request $request) {
        $dataTableModels=$this->getIndexDataPenyemak($request);
        return $dataTableModels->make(true);
    }


    //Penyemak Tugasan Semasa
    private function getIndexDataPenyemak2(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where('permit_application_status_id', 2)->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPenyemak2($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPenyemak2(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('application_date', function($query) use($request){
            return $query->created_at ? Carbon::parse($query->created_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPenyemak2(Request $request) {
        $dataTableModels=$this->getIndexDataPenyemak2($request);
        return $dataTableModels->make(true);
    }

    //Penyemak Tugasan Selesai
    private function getIndexDataPenyemak3(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where(function($query2) {
                        $query2->where('permit_application_status_id', 4)->orWhere('permit_application_status_id', 5)->orWhere('permit_application_status_id', 99);
                    })->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPenyemak3($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPenyemak3(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('approve_date', function($query) use($request){
            return $query->approved_at ? Carbon::parse($query->approved_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        })
        ->addColumn('action', function($query) use($request){
            $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='" . url('permit/showPermit/' . $query->getKey()) . "'>PAPAR</a>";
            return $buttonView;
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPenyemak3(Request $request) {
        $dataTableModels=$this->getIndexDataPenyemak3($request);
        return $dataTableModels->make(true);
    }

    //Pelulus Tugasan Baru
    private function getIndexDataPelulus(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where('permit_application_status_id', 1)->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPelulus($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPelulus(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('application_date', function($query) use($request){
            return $query->created_at ? Carbon::parse($query->created_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPelulus(Request $request) {
        $dataTableModels=$this->getIndexDataPelulus($request);
        return $dataTableModels->make(true);
    }


    //Pelulus Tugasan Semasa
    private function getIndexDataPelulus2(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where('permit_application_status_id', 3)->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPelulus2($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPelulus2(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('application_date', function($query) use($request){
            return $query->created_at ? Carbon::parse($query->created_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPelulus2(Request $request) {
        $dataTableModels=$this->getIndexDataPelulus2($request);
        return $dataTableModels->make(true);
    }

    //Pelulus Tugasan Selesai
    private function getIndexDataPelulus3(Request $request){
        $KPDNBranch_id = \App\Helpers\UserModelDataHelper::getKPDNBranchId();
        $dataModels = PermitApplication::where(function($query2) {
                        $query2->where('permit_application_status_id', 4)->orWhere('permit_application_status_id', 5)->orWhere('permit_application_status_id', 99);
                    })->where('branch_id',$KPDNBranch_id);
        $dataTableModels= $this->returnindexAjaxPelulus3($request,$dataModels); 
        return $dataTableModels;
    }

    public function returnindexAjaxPelulus3(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->addColumn('approve_date', function($query) use($request){
            return $query->approved_at ? Carbon::parse($query->approved_at)->format('d-m-Y') : '';
        })
        ->addColumn('branch_id', function($query) use($request){
            return $query->permitBranch->name ?? null; 
        })
        ->addColumn('permit_application_status_id', function($query) use($request){
            if($query->permit_application_status_id == 1){
                //return "<a href='" . url('permit_application/' . $query->getKey()) . "/edit'>Permohonan Belum Lengkap</a>"; 
                return "Permohonan Belum Lengkap";
            }elseif($query->permit_application_status_id == 2 || $query->permit_application_status_id == 3){
                return "Pembaharuan Sedang Diproses"; 
            }elseif($query->permit_application_status_id == 4){
                return "Permohonan Diluluskan"; 
            }elseif($query->permit_application_status_id == 5 || $query->permit_application_status_id == 99){
                return "Permohonan Tidak Lulus"; 
            } 
        })
        ->addColumn('action', function($query) use($request){
            $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='" . url('permit/showPermit/' . $query->getKey()) . "'>PAPAR</a>";
            return $buttonView;
        });
        
        return $modelDatatables;
    }

    public function indexAjaxPelulus3(Request $request) {
        $dataTableModels=$this->getIndexDataPelulus3($request);
        return $dataTableModels->make(true);
    }

}
