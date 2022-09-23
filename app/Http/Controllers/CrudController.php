<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function create(){
    	return view("crud.create");
    }

    public function store(Request $request){
		require base_path()."/crud-template/config.php";

		if(empty($_POST['modelname']) || empty($_POST['tbname'])){
			print_r($_POST);
			die();
		}

		$this->createController($_POST);
		$this->createModel($_POST);
		$this->createViews($_POST);
		$this->addEntryInRoutes();
    }

    private function addEntryInRoutes(){
        $model_name = ucfirst($_POST['modelname']);
    	$content = "Route::resource('". $model_name."', '". $model_name."Controller');";
        $myfile = fopen(ROUTES_FILE, "a") or die("Unable to open file!");

        $txt = PHP_EOL . $content;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    private function createController($data){
    	$modelName = $data['modelname'] ;
    	$ControllerName = $modelName  ."Controller";
		$viewFolderName = lcfirst($modelName);
    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = CONTROLLER_PATH ;
        //echo $newDir;die();
    	$modelFile = file_get_contents($templateFolder."/controller.php");
        // print_r($modelFile); die;
        // echo $newDir;die();
    	$str1 = str_replace('{modelName}', $modelName, $modelFile);
    	$str1 = str_replace('{viewFolderName}', $viewFolderName, $str1);
    	$str1 = str_replace('{ControllerName}', $ControllerName, $str1);

       //if(!is_dir($newDir)){
			//mkdir($newDir);
		//}

		$ext = ".php";
		$str1  = "<?php \n". $str1;
        //echo $newDir;die();
		return $this->createFile($newDir , $ControllerName , $ext , $str1);

		echo "Controller Successfully Created at ".$newDir ."/". $ControllerName ."<BR>";

    }

    private function createModel($data){
    	$modelName = $data['modelname'];
		$table_name = $data['tbname'];
    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = MODEL_PATH;

    	$modelFile = file_get_contents($templateFolder."/model.php");
    	$str1 = str_replace('{modelName}', $modelName, $modelFile);
    	$str1 = str_replace('{tableName}', $table_name, $str1);


        $columns = \DB::select('show columns from ' . $table_name);

        $temp  = array();
		$temp2 = array();
		$conditions  = "";
		foreach ($columns as $value) {
			 $temp[] = $value->Field;
			 if($value->Null == "NO"){
			 	$temp2[] .=  "'".$value->Field . "' => 'required'" ;
			 }
			 $conditions .='if(!empty(Input::get("'.$value->Field.'"))){
    			$query->where("'.$value->Field.'","=",Input::get("'.$value->Field.'"));
    			} ' ."\n";

		//    echo "'" . $value->Field . "' => '" . $value->Type . "|" . ( $value->Null == "NO" ? 'required' : '' ) ."', <br/>" ; die;
		}

        // return $temp2;
		$fieldsName = "'".implode("','", $temp) ."'";
		$rules = implode(",", $temp2);
		$str1 = str_replace('{fieldsNameOnly}', $fieldsName, $str1);
		$str1 = str_replace('{rules}', $rules, $str1);
		$str1 = str_replace('{conditions}', $conditions, $str1);
		if(!is_dir($newDir)){
			mkdir($newDir);
		}

		$ext = ".php";
		$str1  = "<?php \n". $str1;
		$this->createFile($newDir , $modelName , $ext , $str1);

		echo "Model Successfully Created at ".$newDir ."/". $modelName ."<BR>";
    }

    private function createViews($data){
        // return $data;
    	$table_name = $data['tbname'];
    	$modelName = $data['modelname'] ;

        $viewFolderName = lcfirst($modelName);
        $controller_name = ucfirst($modelName);

    	$root = base_path();
    	$templateFolder = $root ."/crud-template";
    	$newDir = VIEW_PATH ;
    	$newViewDir = $newDir ."/". $viewFolderName;

    	$searchFile = file_get_contents($templateFolder."/templateViews/_search.blade.php");
    	$createFile = file_get_contents($templateFolder."/templateViews/create.blade.php");
    	$editFile = file_get_contents($templateFolder."/templateViews/edit.blade.php");
    	$indexFile = file_get_contents($templateFolder."/templateViews/index.blade.php");
    	$showFile = file_get_contents($templateFolder."/templateViews/show.blade.php");
        $ajaxFile = file_get_contents($templateFolder."/templateViews/ajax.blade.php");

    	$searchFile = str_replace('{modelName}', $controller_name, $searchFile);
    	$createFile = str_replace('{modelName}', $controller_name, $createFile);
    	$editFile = str_replace('{modelName}', $controller_name, $editFile);
    	$indexFile = str_replace('{modelName}', $controller_name, $indexFile);
    	$showFile = str_replace('{modelName}', $controller_name, $showFile);
       // $ajaxFile = str_replace('{modelName}', $controller_name, $ajaxFile);


    	$form = '';
    	$index = "";
    	$show  = "";
    	$columns = \DB::select('show columns from ' . $table_name);
    	foreach ($columns as $value) {
            $form .= '<div class="form-group">' ."\n";
			$form .= '{!! Form::label("'.$value->Field.'", "'.ucfirst($value->Field).':", ["class" => "control-label"]) !!}'."\n".'{!! Form::text("'.$value->Field.'", null, ["class" => "form-control"]) !!}';
    		$form .= '</div>' ."\n";

    		$index .= '<p>
       						<a href="{{ route(\''.$controller_name.'.edit\', $model->id) }}" class="btn btn-primary">{{$model->'.$value->Field.'}}</a>
    				 </p>';

    		$show .= '<p> {{$model->'.$value->Field.'}} </p>';
		}
		$index .="<hr>";

		$createForm = $form;
		$createForm .= "<div class='form-group'>{!! Form::submit('Create New ".$modelName."', ['class' => 'btn btn-primary']) !!}</div>";
		$createForm = str_replace('{searchForm}', $createForm, $createFile);

		$updateForm = $form;
		$updateForm .= "<div class='form-group'>{!! Form::submit('Update ".$modelName."', ['class' => 'btn btn-primary']) !!}</div>";
		$updateForm = str_replace('{searchForm}', $updateForm, $editFile);

		$searchForm = $form;
		$searchForm .= "<div class='form-group'>{!! Form::submit('Search', ['class' => 'btn btn-primary','name'=>'submit']) !!}</div>";
		$searchForm = str_replace('{searchForm}', $searchForm, $searchFile);

		$ajaxFile = str_replace('{index}', $index, $ajaxFile);
		$index = str_replace('{index}', $index, $indexFile);

		$show = str_replace('{show}', $show, $showFile);

       if(!is_dir($newDir)){
			mkdir($newDir);
		}

		if(!is_dir($newViewDir)){
			mkdir($newViewDir);
		}

		$files = array();
		$files["_search"] = $searchForm;
		$files["create"] = $createForm;
		$files["edit"] = $updateForm;
		$files["index"] = $index;
		$files["show"] = $show;
        $files["ajax"] = $ajaxFile;

		foreach($files as $filename => $content){
			$ext = ".blade.php";

			$this->createFile($newViewDir , $filename , $ext , $content);

			echo "Controller Successfully Created at ".$templateFolder ."/views/". $filename.$ext ."<BR>";
		}
    }

    private function createFile($dir , $fileName ,  $ext , $content){
    	$myfile = fopen($dir."/".$fileName. $ext, "w") or die("Unable to open file!");
		$txt = $content;
		fwrite($myfile, $txt);
		fclose($myfile);
    }
}
