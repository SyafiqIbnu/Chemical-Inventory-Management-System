<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use \App\Permission;

class GeneratePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $qs="SELECT * FROM `permission_groups`";
       $pgroups=DB::select(DB::raw($qs));
       foreach ($pgroups as $pgroup) {
           $prefix=$pgroup->prefix;
           
           $pName="$prefix".'_create';      
           //dd($pName);
           $this->createPermission($pName);
           
           $pName="$prefix".'_edit';
           $this->createPermission($pName);
                      
           $pName="$prefix".'_view';
           $this->createPermission($pName);
                      
           $pName="$prefix".'_delete';
           $this->createPermission($pName);
       }       
    }

    function createPermission($pName){
        $permission=Permission::where('name',$pName)->first();
        //dd($pName.'====='.$permission);
        echo "$pName\n";
        if($permission ==null){
            $pNew=new Permission();
            $pNew->name=$pName;
            $pNew->guard_name='web';
            $pNew->save();
        }
        
        
    }
}
