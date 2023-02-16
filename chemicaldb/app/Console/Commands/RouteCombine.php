<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use \App\Permission;

class RouteCombine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route-combine';

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
       $routePath=base_path() . "/routes"; 
       $routeExtPath=$routePath . "/ext.routes"; 
       $files=scandir($routeExtPath);
       //dd($files);

       $template=$routePath."/web_combine.template.php";
       $content=$this->readFileContent($template);
       
       foreach($files as $sfile){
            if($sfile=="." || $sfile==".."){
                continue;
            }

            if($sfile=="dev.php"){
                continue;
            }
            //echo "$sfile\n";
            $content2=$this->readFileContent($routeExtPath."/".$sfile);
            $content2=str_replace("<?php","",$content2);
            $content.=$content2;
       }

       $myfile = fopen($routePath."/web.php", "w") or die("Unable to open file!");
       fwrite($myfile, $content);
       fclose($myfile);
    }


    function readFileContent($filename){
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }
}
