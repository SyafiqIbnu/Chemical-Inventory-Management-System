<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use Config;
use Form;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class GeneratorController extends Controller {

    public function index(Request $request, $table = "") {
        
        $qs = "SELECT table_name as table_name FROM information_schema.tables WHERE table_schema='" . Config::get('database.connections.mysql.database') . "';";
        $tables = DB::select(DB::raw($qs), []);
        $list = array();
		//dd($tables);
        foreach ($tables as $table1) {
            $list[$table1->table_name] = $table1->table_name;
        }
        if($request->revoke == 1 && $request->table_list != ""){
            $this->revoke($request->table_list);
            Session::flash('success', 'Successfully Revoke');
            return redirect(back()->getTargetUrl().$request->urlReturn);
        }

        if ($request->table_list != "") {
            $qs = "SELECT COLUMN_NAME,CHARACTER_MAXIMUM_LENGTH,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . Config::get('database.connections.mysql.database') . "' AND TABLE_NAME = '$request->table_list' ORDER BY ORDINAL_POSITION;";
            $columns = DB::select(DB::raw($qs), []);
            foreach ($columns as $col) {
                $name = $col->COLUMN_NAME;
                $col->uitype = $this->getUiTypes($name);
            }
        } else {
            $columns = array();
        }

        return view('generator.generator_create', compact('request', 'table', 'columns','list'));
    }

    public function revoke($table){
        $name = $this->makeSingular($table);
        $filenameRoute = config('generator.route_path') . "$name" . ".php";
        $filenameLang = config('generator.lang_path') . "$name" . ".php";
        $folderPathView = config('generator.view_path') . "$name";
        $modelName = "$table";
        $parts = explode("_", $modelName);
        $modelName = "";
        foreach ($parts as $part) {
            $modelName .= ucfirst($part);
        }
        $modelName = $this->makeSingular($modelName);
        $filenameModel = config('generator.model_path') . "$modelName" . ".php";
        $name = $this->makeSingular($table);
        $controllerName = $name . "Controller";
        $controllerName = ucfirst($controllerName);
        $controllerName = $this->removeUnderScoreUcfirst($controllerName);
        $filenameController = config('generator.controller_path') . "$controllerName" . ".php";
        File::delete($filenameRoute);
        File::delete($filenameLang);
        File::deleteDirectory($folderPathView);
        File::delete($filenameModel);
        File::delete($filenameController);
    }

    public function generate(Request $request, $table) {
        $qs = "DESCRIBE $table";
        $columns = DB::select(DB::raw($qs), []);
        $this->generateRoute($table);
        $this->generateLang($table, $columns);
        $this->generateModel($table);
        $this->generateView($request, $table, $columns);
		$this->generatePermission($request, $table);
		$this->generatePermissionGroup($request, $table);
    }

	public function generateAssignPermissionToSystemAdmin(Request $request ,$table){
		$user =\App\User::find(1);
		$role = Role::find(1);
	}

	public function generatePermissionGroup(Request $request ,$table){
		$name = $this->makeSingular($table);
		$t=$name;
		$modelName = ucfirst($name);
		
		
		$tt=\App\PermissionGroup::where('name',$modelName)->first();
		//dd($tt );
		if($tt ==null){
			$p=new \App\PermissionGroup();
			$p->name=$modelName;
			$p->prefix=$t;
			$p->active=1;
			$p->save();
		}
	}

	public function generatePermission(Request $request ,$table){
		$role = Role::find(1);
		$name = $this->makeSingular($table);
		$t=$name."_create";
		$tt=Permission::where('name',$t)->first();
		if($tt ==null){
			$permission=new Permission();
			$permission->name=$t;
			$permission->save();
			$permission->assignRole($role->name);
			
			$t=$name."_edit";
			$permission=new Permission();
			$permission->name=$t;
			$permission->save();
			$permission->assignRole($role->name);
			
			$t=$name."_view";
			$permission=new Permission();
			$permission->name=$t;
			$permission->save();
			$permission->assignRole($role->name);
			
			$t=$name."_delete";
			$permission=new Permission();
			$permission->name=$t;
			$permission->save();
			$permission->assignRole($role->name);
			
		}
		
	}

    public function generateRoute($table) {
        $name = $this->makeSingular($table);

        $filename = config('generator.route_path') . "$name" . ".php";
        $myfile = fopen($filename, "w") or die("Unable to open file!");

        $route = "$name";
        $controllerName = "$name" . "Controller";
        $parts = explode("_", $controllerName);
        $controllerName = "";
        foreach ($parts as $part) {
            $controllerName .= ucfirst($part);
        }

        $txt = view('generator.route', compact('route', 'controllerName','name'));
        fwrite($myfile, '<?php');
        fwrite($myfile, "\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);

        return $txt;
    }

    public function generateView(Request $request, $table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $this->generateViewIndex($table, $columns);
        $this->generateViewShow($table, $columns);
        $this->generateViewHeader($table, $columns);
        $this->generateViewCreate($table, $columns);
        $this->generateViewEdit($table, $columns);
        //$this->generateViewSuccess($table, $columns);
        $this->generateViewFormAndController($request, $table, $columns);
        $this->generateMenuActive($request,$table);

        //$this->generateDeleteConfirm($request, $table, $columns);
    }

	public function generateMenuActive(Request $request, $table){
		$name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";
        $filename = $folderPath . "/menu_active.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.menu_active', compact('table', 'name'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
	}

    public function generateDeleteConfirm(Request $request, $table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";
        $filename = $folderPath . "/delete_modal.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.delete_modal', compact('table', 'columns', 'name'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewIndex($table, $columns) {
        $columns = $this->getColumns($table);
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";

        $filename = $folderPath . "/index.blade" . ".php";
        $modelName = $name;
        $modelName = ucfirst($modelName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $filteredColumns = $this->removeIdColumns($columns);

        $txt = view('generator.index', compact('table', 'filteredColumns', 'columns', 'name', 'modelName'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewFormAndController(Request $request, $table, $columns) {
        $columns = $this->getColumns($table);
        $data = $request->all();
		$dropDownData=[];
        foreach ($columns as $col) {
            $name = $col->COLUMN_NAME . "_UITypes";
            $uiType = $data[$name];
            //dd($request);
            print "<br>$col->COLUMN_NAME => " . $uiType;
            if ($uiType == "TextField") {
                print view('generator.components.TextField', compact('col', 'table'));
            } else if ($uiType == "IntegerField") {
                
            } else if ($uiType == "DoubleField") {
                
            } else if ($uiType == "TextArea") {
                
            } else if ($uiType == "ComboBoxTable") {
                $name = $col->COLUMN_NAME . "_dropdown";
                $dropDown = $data[$name];
                $name = $col->COLUMN_NAME . "_display_field";
                $display_field = $data[$name];
                $name = $col->COLUMN_NAME . "_value_field";
                $value_field = $data[$name];
				$name = $col->COLUMN_NAME . "_selection_type";
                $selection_type = $data[$name];
                print "<br>dropDown => " . $dropDown;
                print "<br>display_field => " . $display_field;
                print "<br>value_field => " . $value_field;
				$dropDownData[$col->COLUMN_NAME]=[
					'colName'=>$col->COLUMN_NAME,
					'dropDown'=>$dropDown,
					'display_field'=> $display_field,
					'value_field' => $value_field,
					'selection_type' => $selection_type
				];
            } else if ($uiType == "HiddenField") {
                
            } else if ($uiType == "CheckBox") {
                
            } else if ($uiType == "PrimaryKey") {
                
            } else if ($uiType == "None") {
                
            }
        }

        $this->createFormEdit($request, $table, $columns);
        $this->createFormShow($request, $table, $columns);
        $this->createFormCreate($request, $table, $columns);
        $this->createController($request, $table, $columns,$dropDownData);
    }

    public function createFormEdit(Request $request, $table, $columns) {
        $columns = $this->getColumns($table);
        $data = $request->all();

        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name/";
        $filename = $folderPath . "edit_form.blade" . ".php";
        print $filename;

        $modelName = $name;
        $controllerName = $name . "Controller";
        $controllerName = ucfirst($controllerName);
        $modelName = ucfirst($modelName);

        $controllerName = $this->removeUnderScoreUcfirst($controllerName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filteredColumns = $this->removeIdColumns($columns);

        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.edit_form', compact('table', 'filteredColumns', 'columns', 'name', 'modelName'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function createFormCreate(Request $request, $table, $columns) {
        $columns = $this->getColumns($table);
		$data = $request->all();
		//dd($data);
        
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name/";
        $filename = $folderPath . "create_form.blade" . ".php";
        print $filename;

        $modelName = $name;
        $controllerName = $name . "Controller";
        $controllerName = ucfirst($controllerName);
        $modelName = ucfirst($modelName);

        $controllerName = $this->removeUnderScoreUcfirst($controllerName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filteredColumns = $this->removeIdColumns($columns);

        $myfile = fopen($filename, "w") or die("Unable to open file!");
		$txt="";
		foreach($columns as $col){
			$colName=$col->COLUMN_NAME;
			$uiTypeName=$colName."_UITypes";
			$uiType=$data[$uiTypeName];
			//echo "<br>$col->COLUMN_NAME | $uiType";
			$viewName="generator.ui_".$uiType;
			
			$txt .= view($viewName, compact('table', 'filteredColumns', 'columns', 'name', 'modelName','data','col'));
			$txt = str_replace("@#", "@", $txt);
			$txt = str_replace("/{", "{", $txt);
			$txt = str_replace("/}", "}", $txt);
			$txt = str_replace("{#", "{", $txt);
		}

		/*$txt = view('generator.create_form', compact('table', 'filteredColumns', 'columns', 'name', 'modelName','data'));
		$txt = str_replace("@#", "@", $txt);
		$txt = str_replace("/{", "{", $txt);
		$txt = str_replace("/}", "}", $txt);
		$txt = str_replace("{#", "{", $txt);*/
		

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function createFormShow(Request $request, $table, $columns) {
        $columns = $this->getColumns($table);
        $data = $request->all();

        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name/";
        $filename = $folderPath . "show_form.blade" . ".php";
        print $filename;

        $modelName = $name;
        $controllerName = $name . "Controller";
        $controllerName = ucfirst($controllerName);
        $modelName = ucfirst($modelName);

        $controllerName = $this->removeUnderScoreUcfirst($controllerName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filteredColumns = $this->removeIdColumns($columns);

        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.show_form', compact('table', 'filteredColumns', 'columns', 'name', 'modelName'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);
		$txt = str_replace("{#", "{", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function createController(Request $request, $table, $columns,$dropDownData) {
        $columns = $this->getColumns($table);
        $folderPath = config('generator.controller_path');
        $name = $this->makeSingular($table);
        $controllerName = $name . "Controller";
        $controllerName = ucfirst($controllerName);
        $controllerName = $this->removeUnderScoreUcfirst($controllerName);
        $modelName = $name;
        $modelName = ucfirst($modelName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filename = $folderPath . "$controllerName" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $fields = "";
        $headers = "";
        //dd($columns);
        foreach ($columns as $col) {
            $fields .= "'" . $col->COLUMN_NAME . "',";
            $headers .= "__('" . $name . "." . $col->COLUMN_NAME . "'),";
        }
        $fields = "[$fields]";

		$dropDrownListData="";
		$dropDrownListDataCompact="";
		foreach ($dropDownData as $ddData) {
			$colName=$ddData['colName'];
			$dropDown=$ddData['dropDown'];
			$display_field=$ddData['display_field'];
			$value_field=$ddData['value_field'];
			$dropDownModelName=$this->getModelName($dropDown);

			$tt='$'.$colName."_list=\App\\".$dropDownModelName.'::all()->pluck('."'$display_field','$value_field');"."\n";
			$dropDrownListData.=$tt;
			$dropDrownListDataCompact.=",'".$colName."_list'";
        }

        $filteredColumns = $this->removeIdColumns($columns);
        //dd($filteredColumns);
        $txt = view('generator.controller', compact('table', 'filteredColumns', 'columns', 'modelName', 'name', 'controllerName', 'fields', 'headers','dropDrownListData','dropDrownListDataCompact'));

        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);
		$txt = str_replace("{#", "{", $txt);

        fwrite($myfile, '<?php');
        fwrite($myfile, "\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function getTables() {
        $qs = "SELECT table_name as table_name FROM information_schema.tables WHERE table_schema='" . Config::get('database.connections.mysql.database') . "';";
        $tables = DB::select(DB::raw($qs), []);
        return $tables;
    }

    public function removeIdColumns($columns) {
        $exemptionList = array("id", "created_at", "updated_at", "created_by",'updated_by');
        $nColumns = array();
        foreach ($columns as $col) {
            if ( in_array($col->COLUMN_NAME,$exemptionList)) {
                
            } else {
                $nColumns[] = $col;
            }
        }
        return $nColumns;
    }

    public function getColumns($table) {
        $qs = "SELECT COLUMN_NAME,CHARACTER_MAXIMUM_LENGTH,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . Config::get('database.connections.mysql.database') . "' AND TABLE_NAME = '$table' ORDER BY ORDINAL_POSITION;";
        $columns = DB::select(DB::raw($qs), []);
        $nColumns = array();
        foreach ($columns as $col) {
            if ($col->COLUMN_NAME == "created_at" || $col->COLUMN_NAME == "created_by" ||
                    $col->COLUMN_NAME == "updated_at" || $col->COLUMN_NAME == "updated_by") {
                
            } else {
                $nColumns[] = $col;
            }
        }
        return $nColumns;
    }

    public function getTableDropDownList(Request $request, $name, $onChange) {
        $qs = "SELECT table_name as table_name FROM information_schema.tables WHERE table_schema='" . Config::get('database.connections.mysql.database') . "';";
        $tables = DB::select(DB::raw($qs), []);
        $list = array();
        foreach ($tables as $table) {
            $list[$table->table_name] = $table->table_name;
        }
        $f = $request->table;
        return Form::select($name, $list, $f, ['class' => 'form-control', 'id' => $name, 'oo' => $f, 'onChange' => $onChange]);
    }

    public function getTableList(Request $request, $name) {
        $qs = "SELECT table_name FROM information_schema.tables WHERE table_schema='" . Config::get('database.connections.mysql.database') . "';";
        $tables = DB::select(DB::raw($qs), []);
        $list = array();
        foreach ($tables as $table) {
            $list[$table->table_name] = $table->table_name;
        }
        $f = $request->table;
        return Form::select($name, $list, $f, ['class' => 'form-control', 'id' => $name, 'oo' => $f]);
    }

    public function getTableColumns(Request $request, $table, $name) {
        $qs = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . Config::get('database.connections.mysql.database') . "' AND TABLE_NAME = '$table' ORDER BY ORDINAL_POSITION;";
        $columns = DB::select(DB::raw($qs), []);
        $list = array();
        foreach ($columns as $col) {
            $list[$col->COLUMN_NAME] = $col->COLUMN_NAME;
        }
        return Form::select($name, $list, null, ['class' => 'form-control', 'id' => $name]);
    }

    public function getDropdownTableOptions(Request $request, $table, $colname) {
        $firstTable = $table;
        $result = "";
        //$result.="<div=\"$colname"."_dropdown_table_option_div\">";
        $result .= " Display Field : " . $this->getTableColumns($request, $firstTable, "$colname" . "_display_field");
        $result .= " Value Field : " . $this->getTableColumns($request, $firstTable, "$colname" . "_value_field");

        $result .= " Selection Type : " . Form::select("$colname".'_selection_type',['1'=>'Single','2'=>'Multiple'], null, ['class' => 'form-control']);
        //$result.="</div>";
        return $result;
    }

    public function getDropdownOptions(Request $request, $name) {
        //$result=$this->getUiTypes($name);
        $result = "";
        $result .= "<div id=\"$name" . "_dropdown_div\"> Table : " . $this->getTableDropDownList($request, $name . "_dropdown", "getDropdownTableOptions('$name');");

        $firstTable = "";
        $tables = $this->getTables();
		foreach ($tables as $table) {
            $firstTable = $table->table_name;
            break;
        }

        $result .= "<div id=\"$name" . "_dropdown_table_option_div\">";
        $result .= "Display Field : " . $this->getTableColumns($request, $firstTable, "$name" . "_display_field");
        $result .= " Value Field dd: " . $this->getTableColumns($request, $firstTable, "$name" . "_value_field");
		$result .= " Selection Type : " . Form::select("$name".'_selection_type',['1'=>'Single','2'=>'Multiple'], null, ['class' => 'form-control']);
        $result .= "</div>";
        $result .= "</div>";
        return $result;
    }

    public function getUiTypes($name) {
        $list = array();
        $list['TextField'] = "TextField";
        $list['IntegerField'] = "IntegerField";
        $list['DoubleField'] = "DoubleField";
		$list['DateField'] = "DateField";
        $list['DateTimeField'] = "DateTimeField";
        $list['TimeField'] = "TimeField";
        $list['Round2DoubleField'] = "Round2DoubleField";
		$list['TextArea'] = "TextArea";
        $list['ComboBoxTable'] = "ComboBox From Table";
        $list['ComboBoxYesNo'] = "ComboBoxYesNo";
        $list['ComboBoxActive'] = "ComboBoxActive";
        $list['ComboBoxBoolean'] = "ComboBoxBoolean";
        $list['Switch'] = "Switch";
        $list['Hiddenfield'] = "Hiddenfield";
        $list['Checkbox'] = "Checkbox";
        $list['PrimaryKey'] = "Primary Key";
        $list['None'] = "None";
        return Form::select($name . "_UITypes", $list, null, ['class' => 'form-control', 'id' => $name . "_UITypes", 'onChange' => "uiTypeChanged('$name')"]);
    }

    //TextField
    //IntegerFeild
    //DoubleField
    //TextArea
    //ComboBoxYesNo
    //CombboBoxActive/Not Active
    //ComboBoxBoolean
    //ComboBox
    //RadioButton
    //Hiddenfield
    //Checkbox
    //String
    //Integer
    //Double
    //None
    //Primary Key

    public function generateController($table, $columns) {
        //AJAX Helper -> untuk combobox, ajax based request
    }

    public function generateViewHeader($table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";

        $filename = $folderPath . "/header.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.header', compact('table', 'columns', 'name'));


        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewCreate($table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";
        $modelName = $name;
        $modelName = ucfirst($modelName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filename = $folderPath . "/create.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.create', compact('table', 'columns', 'name', 'modelName'));


        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewEdit($table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";
        $modelName = $name;
        $modelName = ucfirst($modelName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filename = $folderPath . "/edit.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.edit', compact('table', 'columns', 'name', 'modelName'));


        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewShow($table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";
        $modelName = $name;
        $modelName = ucfirst($modelName);
        $modelName = $this->removeUnderScoreUcfirst($modelName);
        $filename = $folderPath . "/show.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.show', compact('table', 'columns', 'name', 'modelName'));


        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateViewSuccess($table, $columns) {
        $name = $this->makeSingular($table);
        $folderPath = config('generator.view_path') . "$name";

        $filename = $folderPath . "/success.blade" . ".php";
        print $filename;
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $txt = view('generator.success', compact('table', 'columns', 'name'));


        $txt = str_replace("@#", "@", $txt);
        $txt = str_replace("/{", "{", $txt);
        $txt = str_replace("/}", "}", $txt);

        //fwrite($myfile,'<?php');
        //fwrite($myfile,"\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);
        return $txt;
    }

    public function generateLang($table, $columns) {
        $name = $this->makeSingular($table);
        $filename = config('generator.lang_path') . "$name" . ".php";
        print "Lang Generator : $filename <br>";
        $myfile = fopen($filename, "w") or die("Unable to open file!");

        //dd($columns);
        $list = "";
        //$list = "'title'=>'$table',";
        foreach ($columns as $col) {
			$exceptionArray=['id','created_at','created_by','updated_at','updated_by','active'];
			if(in_array($col->Field,$exceptionArray)){
				continue;
			}
            $list .= "'" . $col->Field . "'=>'" . $col->Field . "',\n";
            $list .= "'" . $col->Field . "_placeholder'=>'" . $col->Field . "',\n";
            //$controllerName.=ucfirst($part);
        }

        $txt = view('generator.lang', compact('list'));
        fwrite($myfile, '<?php');
        fwrite($myfile, "\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);

        return $txt;
    }


	public function getModelName($table){
		$route = "$table";
        $modelName = "$table";
        $parts = explode("_", $modelName);
        $modelName = "";
        foreach ($parts as $part) {
            $modelName .= ucfirst($part);
        }
		$modelName = $this->makeSingular($modelName);
		return $modelName;
	}

    public function generateModel($table) {

        $route = "$table";
        $modelName = "$table";
        $parts = explode("_", $modelName);
        $modelName = "";
        foreach ($parts as $part) {
            $modelName .= ucfirst($part);
        }

        //Buang es / s kat belakang
        //print substr($modelName,-2);
        //exit();
        $modelName = $this->makeSingular($modelName);

        $filename = config('generator.model_path') . "$modelName" . ".php";
        print $filename . "<br>";
        $myfile = fopen($filename, "w") or die("Unable to open file!");

        $txt = view('generator.model', compact('table', 'modelName'));
        fwrite($myfile, '<?php');
        fwrite($myfile, "\r\n");
        fwrite($myfile, $txt);
        fclose($myfile);

        return $txt;
    }

    public function removeUnderScoreUcfirst($name) {
        $parts = explode("_", $name);
        $name = "";
        foreach ($parts as $part) {
            $name .= ucfirst($part);
        }
        return $name;
    }

    public function makeSingular($name) {


        $c= new \App\Classes\Inflector();
        return $c->singularize($name);
        // //Buang es / s kat belakang
        // //print substr($modelName,-2);
        // //exit();       
        // if (substr($name, -3) == "ies") {
        //     $name = substr($name, 0, -3);
        //     return $name;
        // }

        // if (substr($name, -3) == "ses") {
        //     $name = substr($name, 0, -2);
        //     return $name;
        // }

        // if (substr($name, -2) == "es") {
        //     $name = substr($name, 0, -2);
        //     //dd($name);
        //     return $name;
        // }

        // if (substr($name, -1) == "s") {
        //     $name = substr($name, 0, -1);
        //     return $name;
        // }
        
        // return $name;
    }

}
