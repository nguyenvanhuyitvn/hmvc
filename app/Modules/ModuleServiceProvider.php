<?php
namespace App\Modules;
use File;
use Illuminate\Support\ServiceProvider;
class ModuleServiceProvider extends ServiceProvider{
    public function boot(){
        $directories =array_map('basename', File::directories(__DIR__));
        foreach($directories as $moduleName){
            $this->_registerModule($moduleName);
            $this->loadConfig($moduleName);
        }
        dd(config());
    }
    public function _registerModule($moduleName){
        $modulePath = __DIR__."/".$moduleName."/";
        // boot routes
        if(File::exists($modulePath."routes/web.php")){
            $this->loadRoutesFrom($modulePath."routes/web.php");
        }
        // boot migrations
        if(File::exists($modulePath."database/migrations")){
            $this->loadMigrationsFrom($modulePath."database/migrations");
        }
        // boot languages
        if(File::exists($modulePath."resources/lang")){
            $this->loadTranslationsFrom($modulePath."resources/lang", $moduleName);
        }
        // boot views
        if(File::exists($modulePath."resources/views")){
            $this->loadViewsFrom($modulePath."resources/views", $moduleName);
        }

    }
    public function loadConfig($moduleName){
        $modulePath = __DIR__."/".$moduleName."/";
        if(File::exists($modulePath."config")){
            config([
                'route'=> File::getRequire($modulePath."config/route.php")
            ]);
        }
    }
}
?>
