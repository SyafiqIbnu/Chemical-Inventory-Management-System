<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Order;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use Billable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasOrderView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.order');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','pickup_date','linked_user','link_used','status','totalamount','submitted_at','submitted_by','checked_at','checked_by','approved_at','approved_by','received_at','received_by',];
            foreach($fields as $key => $field){
                $language = 'order.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order.order','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Order::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order.index', compact('title' ));
        }
    }

    public function indexReview(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasOrderView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.order').__(' Untuk Disemak');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','pickup_date','linked_user','link_used','status','totalamount','submitted_at','submitted_by','checked_at','checked_by','approved_at','approved_by','received_at','received_by',];
            foreach($fields as $key => $field){
                $language = 'order.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order.order','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexDataReview($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Order::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order.index_review', compact('title' ));
        }
    }

    public function indexApprove(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasOrderView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.order').__(' Untuk Disahkan');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','pickup_date','linked_user','link_used','status','totalamount','submitted_at','submitted_by','checked_at','checked_by','approved_at','approved_by','received_at','received_by',];
            foreach($fields as $key => $field){
                $language = 'order.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order.order','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexDataApprove($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Order::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order.index_approve', compact('title' ));
        }
    }

    public function indexReceive(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasOrderView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.order').__(' Untuk Diterima (Hari Ini)');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','pickup_date','linked_user','link_used','status','totalamount','submitted_at','submitted_by','checked_at','checked_by','approved_at','approved_by','received_at','received_by',];
            foreach($fields as $key => $field){
                $language = 'order.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order.order','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexDataReceive($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Order::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
            
			$todaydate=Carbon::now()->format('d-m-Y');
            //calculate master calculation
            $totalayamactual=0;
            $totalayambuffer=0;
            $totalayamraw=0;
            $totalkambingactual=0;
            $totalkambingbuffer=0;
            $totalkambingraw=0;
            $totalpaxactual=0;
            $totalpaxbuffer=0;
            $sidecondimentactual=0;
            $sidecondimentbuffer=0;
            $orders=Order::where('status',3)->where('pickup_date',Carbon::now()->toDateString())->get();
            foreach($orders as $order){
                $orderproducts= \App\OrderProduct::where('order_id',$order->id)->get();
                foreach($orderproducts as $orderproduct){
                    if($orderproduct->product->food_group==1){//ayam
                        
                        $totalayamactual+=$orderproduct->bil_pax;
                        $totalpaxactual+=$orderproduct->bil_pax;
                    }
                    if($orderproduct->product->food_group==2){//kambing
                        $totalkambingactual+=$orderproduct->bil_pax;
                        $totalpaxactual+=$orderproduct->bil_pax;
                    }
                    if($orderproduct->product->food_group==3){//combo
                        $totalayamactual+=$orderproduct->bil_pax;
                        $totalkambingactual+=$orderproduct->bil_pax;
                        $totalpaxactual+=$orderproduct->bil_pax;
                    }
                    if($orderproduct->product->food_group==4){//nasi
                        $totalpaxactual+=$orderproduct->quantity;
                        
                    }
                    if($orderproduct->product->food_group==5){//condiments
                        $sidecondimentactual+=$orderproduct->quantity;
                    }
                    if($orderproduct->product->has_condiments==1){
                        $sidecondimentactual+=$orderproduct->bil_pax;
                    }

                    //untuk dessert takde lagi
                }
                
            }
            $totalayambuffer=$totalayamactual+10;
            $totalayamraw=$totalayambuffer/4;
            $totalkambingbuffer=$totalkambingactual*333;
            $totalkambingraw=$totalkambingbuffer/1000;
            $totalpaxbuffer=($totalpaxactual*10/100)+$totalpaxactual;
            $sidecondimentbuffer=($sidecondimentactual*10/100)+$sidecondimentactual;
            
			return view('order.index_receive', compact('title','todaydate',
            'totalayamactual','totalayambuffer','totalayamraw',
            'totalkambingactual','totalkambingbuffer','totalkambingraw',
            'totalpaxactual','totalpaxbuffer',
            'sidecondimentactual','sidecondimentbuffer'
        ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        if(Auth::user()->user_type_id==6 || Auth::user()->user_type_id==3 || Auth::user()->user_type_id==4){//customer,agent. dropship
            $dataModels=Order::where('created_by',Auth::user()->id);
        }else if(Auth::user()->user_type_id==2 ){//smart partner
            $dataModels=Order::where('linked_user',Auth::user()->id)->where('status','>',0);
        }else if(Auth::user()->user_type_id==1){
            $dataModels=Order::where('status','>',0);
        }else if(Auth::user()->user_type_id==5){
            $dataModels=Order::where('status','>=',3);
        }
       
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

    private function getIndexDataReview(Request $request){
        if(Auth::user()->user_type_id==2){
            $dataModels=Order::where('linked_user',Auth::user()->id)->where('status',1);
        }
       
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

    private function getIndexDataApprove(Request $request){
        if(Auth::user()->user_type_id==1){
            $dataModels=Order::where('status',2);
        }
       
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

    //today's approved orders
    private function getIndexDataReceive(Request $request){
        if(Auth::user()->user_type_id==5 || Auth::user()->user_type_id==1){
            $dataModels=Order::where('status',3)->where('pickup_date',Carbon::now()->toDateString());
        }
       
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

	/**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
	public function returnindexAjax(Request $request,$dataModels) {
		$modelDatatables = Datatables::of($dataModels)->with('linkeduser','orderstatus','createdby')
		->orderColumn('id', '-id $1')
		->addIndexColumn()
		->filter(function ($query) use($request){
			if(!empty($request->input('f_start_date'))){
				$request->f_start_date = Carbon::createFromFormat("d/m/Y", $request->f_start_date)->toDateString();
				$query->where('created_at', '>=', $request->f_start_date);
			}
			if(!empty($request->input('f_end_date'))){
				$request->f_end_date = Carbon::createFromFormat("d/m/Y", $request->f_end_date)->toDateString();
				$query->where('created_at', '<=', $request->f_end_date);
			}
		},true)
        ->addColumn('pickup_date', function($query) use($request){
            //$pickup_date=date_format(new DateTime($query->pickup_date),'dd/M/');
            return  $query->pickup_date;
        })
        ->addColumn('created_by', function($query) use($request){
            return  $query->createdby->name;
        })
        ->addColumn('linked_user', function($query) use($request){
            return  $query->linkeduser->name;
        })
        ->addColumn('status', function($query) use($request){
            if($query->status==0){
                return "BARU";
            }
            return  $query->orderstatus->name;
        })
		->addColumn('action', function($query) use($request){
$buttonSemak="<a title='Semak' type='button' class='btn btn-xs btn-info' href='".url('orderreview/'.$query->getKey())."'><i class='fas fa-check'></i></a>";
$buttonSah="<a title='Sah' type='button' class='btn btn-xs btn-info' href='".url('orderapprove/'.$query->getKey())."'><i class='fas fa-thumbs-up'></i></a>";
$buttonTerima="<a title='Terima' type='button' class='btn btn-xs btn-info' href='".url('orderreceive/'.$query->getKey())."'><i class='fa fa-cutlery'></i></a>";

			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('ordersummary/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('orderlinked/'.$query->getKey())."/products'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('order.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            if($query->status!=1 || Auth::user()->user_type_id!=2){
                $buttonSemak='';
            }

            if($query->status!=2 || Auth::user()->user_type_id!=1){
                $buttonSah='';
            }

            if($query->status!=3 || Auth::user()->user_type_id!=5 || Auth::user()->user_type_id!=1){
                $buttonTerima='';
            }

            if($query->status==0 || Auth::user()->user_type_id!=6){
				//$buttonView='';
			}

			if($query->status>0 ){
				$buttonEdit='';
			}

			if($query->status>0){
				$buttonDelete='';
			}				
				
			return $buttonView.' '.$buttonEdit.' '.$buttonDelete.' '.$buttonSemak.' '.$buttonSah.' '.$buttonTerima ;
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

    public function indexAjaxReview(Request $request) {
		$dataTableModels=$this->getIndexDataReview($request);
        return $dataTableModels->make(true);
    }

    public function indexAjaxApprove(Request $request) {
		$dataTableModels=$this->getIndexDataApprove($request);
        return $dataTableModels->make(true);
    }

    public function indexAjaxReceive(Request $request) {
		$dataTableModels=$this->getIndexDataReceive($request);
        return $dataTableModels->make(true);
    }

	/**
     * Display create form of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
		if(!PermissionHelper::hasOrderCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        //for agents and dropships, linked user is upline id
        $linked_user=\App\User::findOrFail(Auth::user()->upline_id);
        if($linked_user==null){
            return back()->withErrors('Referral ID Tidak Sah.')
            ->withInput();
        }

		$modelOrder = new Order();
		
        return view('order.create',compact('modelOrder','request','linked_user'));
    }

    /**
     * Display create form of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create_orderlinked(Request $request)
    {
        if($request->linked_user==null){
            return back()->withErrors('Link Pesanan Tidak Sah.')
            ->withInput();
        }
        $linked_user=\App\User::findOrFail($request->linked_user);
        if($linked_user==null){
            return back()->withErrors('Link Pesanan Tidak Sah.')
            ->withInput();
        }

		$modelOrder = new Order();
		
        return view('order.create',compact('modelOrder','request','linked_user'));
    }

    public function create_orderlinked_products(Request $request,$id){
        $modelOrder=Order::find($id);
        if($modelOrder->status>0){
            abort(403, __('Order Already Submitted'));
        }
        $products=\App\Products::orderBy('product_category','ASC')->get();
        $order_products= \App\OrderProduct::where('order_id',$id)->orderBy('id','ASC')->get();
        $product_categories=\App\ProductCategory::get();
        $countOrderProduct=$order_products->count();
      
        return view('order.create_products',compact('modelOrder','request','order_products',
        'products','product_categories','countOrderProduct'));
    }

    public function store_products(Request $request,$orderid){

        if($request->quantity>0)
        {
            //if product already exist
            $product=\App\Products::find($request->product_id);
            $orderProductExist= \App\OrderProduct::where('order_id',$orderid)->where('product_id',$request->product_id)->first();
            if($orderProductExist!=null){
                //update quantity
                $orderProductExist->quantity=$request->quantity;
                $orderProductExist->amount=$orderProductExist->price*$request->quantity;
                $orderProductExist->bil_pax=$product->pax_no*$request->quantity;
                $orderProductExist->save();
            }else{
                $data = $request->all();
                $orderProduct= new \App\OrderProduct();
                $orderProduct->fill($data);
                $orderProduct->order_id=$orderid;
                
                //calculate
                $orderProduct->price=$product->price;
                $orderProduct->amount=$product->price*$request->quantity;
                $orderProduct->bil_pax=$product->pax_no*$request->quantity;
                $orderProduct->created_by = Auth::user()->getKey();
                $orderProduct->save();
            }
            

            //Session::flash('success', __('general.success_create'));
            
        }
        return redirect(url("orderlinked")."/".$orderid."/products");
    }

    public function proceed(Request $request,$orderid){

        
        //set totalamount and pax
        $totalamount=0;
        $bilpax=0;
        
        $modelOrderProduct= \App\OrderProduct::where('order_id',$orderid)->get();
        foreach($modelOrderProduct as $order){
            $totalamount+=$order->amount;
            $bilpax+=$order->bil_pax;
        }
        
        $modelOrder=Order::find($orderid);
        $modelOrder->totalamount=$totalamount;
        $modelOrder->bil_pax=$bilpax;
        $modelOrder->save();

        $bankaccount= \App\UserBankaccount::where('user_id',$modelOrder->linked_user)->where('active',1)->first();

        $order_products= \App\OrderProduct::where('order_id',$orderid)->orderBy('id','ASC')->get();

        return view('order.proceed',compact('modelOrder','request','order_products','bankaccount'));

    }

    public function submit(Request $request,$orderid){

        if($request->filepath==null){
            return back()->withErrors('Sila Upload Resit Pembayaran');
        }
        
        
        //upload resit
        $dirName='public/uploads/orders';
        $input = $request->all();
        $orderDocument= new  \App\OrderDocument;
        $orderDocument->fill($input);
        $orderDocument->order_id=$orderid;
        //$orderDocument->save();
        //upload file
        $file=$request->filepath->store($dirName);
        $orderDocument->name="RESIT BAYARAN";
        $orderDocument->path=$file;
        $orderDocument->original_name=$file;
        $orderDocument->save();

        $modelOrder= Order::find($orderid);
        $modelOrder->status=1;
        $modelOrder->save();

        Session::flash('success', __('general.success_update'));
		return redirect(url("order"));

    }

    public function reviewedOrder(Request $request,$orderid){
        
        $modelOrder= Order::find($orderid);
        $modelOrder->status=2;
        $modelOrder->save();

        Session::flash('success', __('general.success_update'));
		return redirect(url("order"));
    }

    public function approvedOrder(Request $request,$orderid){
        
        $modelOrder= Order::find($orderid);
        $modelOrder->status=3;
        $modelOrder->save();

        Session::flash('success', __('general.success_update'));
		return redirect(url("order"));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/*
		if(!PermissionHelper::hasOrderCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'pickup_date' => 'required',
														//'linked_user' => 'required',
																					
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        //check if today
        if($request->pickup_date==Carbon::now()->toDateString() || $request->pickup_date<Carbon::now()->toDateString()){
            return back()->withErrors('Tarikh Tidak Sah')
            ->withInput();
        }
        //check if date's full of 2,000 pax
        $totalpax=0;
        $orderSum=Order::where('pickup_date',$request->pickup_date)->sum('bil_pax');
        if($orderSum>1999){
            return back()->withErrors('Pesanan Bagi Tarikh Dipilih Sudah Ditutup')
            ->withInput();
        }
        
        $modelOrder = new Order();
        $modelOrder->fill($data);
        $modelOrder->status=0;
        //$modelOrder->id = Convert::uuid('orders');
		$modelOrder->created_by = Auth::user()->getKey();
        $modelOrder->save();
        //\App\Classes\AuditTrailHelper::logAuditCreate("orders",$modelOrder->getKey(),$modelOrder->toArray());
        
        //Session::flash('success', __('general.success_create'));
        return redirect(url("orderlinked")."/".$modelOrder->id."/products");
    }

    

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
        /*
		if(!PermissionHelper::hasOrderView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelOrder = Order::findOrFail($id); 
        $title=__('order.title_show').__('order.title');
        return view('order.show',compact('title','modelOrder','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        /*
		if(!PermissionHelper::hasOrderEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelOrder = Order::findOrFail($id);    
		
        return view('order.edit',compact('modelOrder','request' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
		if(!PermissionHelper::hasOrderEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelOrder = Order::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'pickup_date' => [
					'required',
					Rule::unique('orders')->ignore($modelOrder->id),
				],
			 						 									'linked_user' => 'required',
													 									'link_used' => 'required|max:254',
													 									'status' => 'required',
													 									'totalamount' => 'required',
													 									'submitted_at' => 'required',
													 									'submitted_by' => 'required',
													 									'checked_at' => 'required',
													 									'checked_by' => 'required',
													 									'approved_at' => 'required',
													 									'approved_by' => 'required',
													 									'received_at' => 'required',
													 									'received_by' => 'required',
										        ]);     
        //Rule::unique('orders')->ignore($modelOrder->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelOrder -> fill($data);
        $modelOrder->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("orders",$modelOrder->getKey(),$modelOrder->toArray());
        $modelOrder -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("order"));	
    }
	
	/**
     * Delete the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
	public function destroy(Request $request, $id)
	{
        /*
		if(!PermissionHelper::hasOrderDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}*/		

		$modelOrder = Order::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("orders",$modelOrder->getKey(),$modelOrder->toArray());
		$modelOrder->delete();

        //must delete children
        //$order_products= \App\OrderProduct::where('order_id',$orderid)->delete();
        //$order_documents= \App\OrderDocument::where('order_id',$orderid)->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("order"));		 
	}

    public function orderSummary($orderid){
        $order_products= \App\OrderProduct::where('order_id',$orderid)->orderBy('id','ASC')->get();
        $modelOrder = Order::findOrFail($orderid);
        $order_documents= \App\OrderDocument::where('order_id',$orderid)->first();
        return view('order.order_summary',compact('modelOrder','order_products','order_documents'));
    }

    public function orderReview($orderid){
        $order_products= \App\OrderProduct::where('order_id',$orderid)->orderBy('id','ASC')->get();
        $modelOrder = Order::findOrFail($orderid);
        $order_documents= \App\OrderDocument::where('order_id',$orderid)->first();
        return view('order.order_review',compact('modelOrder','order_products','order_documents'));
    }

    public function orderApprove($orderid){
        $order_products= \App\OrderProduct::where('order_id',$orderid)->orderBy('id','ASC')->get();
        $modelOrder = Order::findOrFail($orderid);
        $order_documents= \App\OrderDocument::where('order_id',$orderid)->first();
        return view('order.order_approve',compact('modelOrder','order_products','order_documents'));
    }

    public function orderReceive($orderid){
        $order_products= \App\OrderProduct::where('order_id',$orderid)->orderBy('product_id','ASC')->get();
        $modelOrder = Order::findOrFail($orderid);
        $order_documents= \App\OrderDocument::where('order_id',$orderid)->first();
        $product_categories=\App\ProductCategory::get();
        
        return view('order.order_receive',compact('modelOrder','order_products',
        'order_documents','product_categories'));
    }

    

   
}
