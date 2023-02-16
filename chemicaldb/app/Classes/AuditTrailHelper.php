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

class AuditTrailHelper extends Facade {

    protected static function getFacadeAccessor() {
        return 'AuditTrailHelper';
    }

    public static function logAuditCreate($table, $id, $data) {
        $trail = new Trail();
        $trail->model_type = $table;
        $trail->model_id = $id;
        $trail->type = "create";

        $details = "";
        
        foreach ($data as $key => $value) {
            $col = $key;
            if ($key == "_token") {
                continue;
            }
            if (isset($data[$col])) {
                $details .= "$col=>" . $data[$col] . "\n";
            }
        }

        $trail->details = $details;
        $user = Auth::user();
        if ($user) {
            $trail->created_by = $user->id;
        }
        $trail->save();
        return true;
    }
    
    public static function logAuditDelete($table, $id, $data) {
        $trail = new Trail();
        $trail->model_type = $table;
        $trail->model_id = $id;
        $trail->type = "delete";

        $details = "";
        
        foreach ($data as $key => $value) {
            
            $col = $key;
            if ($key == "_token") {
                continue;
            }
            if (isset($data[$col])) {
                $details .= "$col=>" . $data[$col] . "\n";
            }
        }

        $trail->details = $details;
        $user = Auth::user();
        if ($user) {
            $trail->created_by = $user->id;
        }
        $trail->save();
        return true;
    }

    public static function log($table, $id, $data, $type) {
        $trail = new Trail();
        $trail->model_type = $table;
        $trail->model_id = $id;
        $trail->type = $type;
        $user = Auth::user();
        $details = "";
        if ($user) {
            $trail->created_by = $user->id;
        }
        $trail->save();
        return true;
    }

    public static function logAuditUpdate($table, $id, $data, $user_id = null, $remark = null) {
        $trail = new Trail();
        $trail->model_type = $table;
        $trail->model_id = $id;
        $trail->type = "update";

        $databaseName = \DB::connection()->getDatabaseName();
        $pk_column=DB::table('INFORMATION_SCHEMA.COLUMNS')
        ->where('table_schema', $databaseName)
        ->where('table_name',$table)
        ->where('COLUMN_KEY','PRI')
        ->first();

        $pk_columnname=$pk_column->COLUMN_NAME;

        $t = DB::select('select * from ' . $table . ' where '.$pk_columnname.' = ?', [$id]);

        if(count($t)==0){
            return   self::logAuditCreate($table, $id, $data);  
        }
       
        $obj = json_decode(json_encode($t[0]), true);
        $columns = Schema::getColumnListing($table);
        $details = "";
        foreach ($columns as $col) {
            if (isset($data[$col])) {
                if ($data[$col] != $obj[$col]) {
                    $details .= "$col=>" . $obj [$col] . "=>" . $data[$col] . "\n";
                }
            }
        }
        if($remark != null && $remark != '' && $details != ''){
            $trail->details = $remark."\n".$details;
        } else {
            $trail->details = $details;
        }
        
        if($user_id == null){
            $user = 1;
            $trail->created_by = 1;
        } else {
            $user = Auth::user();
            if ($user) {
                $trail->created_by = $user->id;
            }
        }
        $trail->save();
        return true;
    }

}

?>