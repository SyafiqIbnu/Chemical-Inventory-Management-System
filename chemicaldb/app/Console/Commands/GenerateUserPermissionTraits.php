<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class GenerateUserPermissionTraits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-user-permission-traits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate User Permission Traits. To be used with \App\PermissionHelper';

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
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $role=\Spatie\Permission\Models\Role::find(1);
        $qs="SELECT * FROM `permission_groups` WHERE prefix NOT LIKE 'menu%'";
       $pgroups=DB::select(DB::raw($qs));
       $allFunc="";
       $total=count($pgroups);
       $counter=0;
       foreach ($pgroups as $pgroup) {
           $counter++;
           $prefix=$pgroup->prefix;
            print "$prefix   $counter of $total\n";
            if($pgroup->is_create){
                $pName="$prefix".'_create';      
                $role->givePermissionTo($pName);
                    //dd($pName);
                $allFunc.=$this->generatePermission($pName);
            }

            if($pgroup->is_edit){
                $pName="$prefix".'_edit';
                $role->givePermissionTo($pName);
                $allFunc.=$this->generatePermission($pName);
            }          

            if($pgroup->is_view){
                $pName="$prefix".'_view';
                $role->givePermissionTo($pName);
                $allFunc.=$this->generatePermission($pName);
            }           

            if($pgroup->is_delete){
                $pName="$prefix".'_delete';
                $role->givePermissionTo($pName);
                $allFunc.=$this->generatePermission($pName);
            }
       }       

       $content="<?php

       namespace App\Traits;       
       use Auth;

       trait UserPermissionTrait
       {
           
        $allFunc
        
       }";

       $filename=app_path(). "/Traits/UserPermissionTrait.php"; 
       $fp = fopen($filename, 'w');
       fwrite($fp, $content);
       fclose($fp);
       echo "Done";
    }

    function generatePermission($name){
        $funcName=$this->getPermissionFunctionName($name);
        $template="public static function $funcName(\$return404=true){
            return self::isAccess('$name',\$return404);     
        }
        
        ";
        return $template;
    }
    
    function getPermissionFunctionName($name){
        $parts=explode("_",$name);
        $funcName="has";
        foreach ($parts as $part) {
           $funcName.=ucfirst($part);
        }
        return $funcName;
    }
}
