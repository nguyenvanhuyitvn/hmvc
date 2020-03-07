<?php
namespace App\Modules;
use File;
use Illuminate\Support\ServiceProvider;
class ModuleServiceProvider extends ServiceProvider{

    // Load config theo chuẩn Laravel
    /**
     * Register config file here 
     * alias => path
     */
    private $configFile = [
        'customerConfig' => 'Customers/Configs/customerConfig.php',
    ];
    /**
    * Register bindings in the container.
    */
    public function register(){
        // register your config file here
        foreach($this->configFile as $alias => $path){
            $this->mergeConfigFrom(__DIR__."/".$path, $alias);
        }
    }

    public function boot(){
        $ds = DIRECTORY_SEPARATOR;
        $directories =array_map('basename', File::directories(__DIR__));
        foreach($directories as $moduleName){
            // $this->loadConfig($moduleName); // Gọi hàm loadConfig tự tạo vào, trước khi gọi các route, migrations,..
            $this->_registerModule($moduleName);
        }
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
    // Tự tạo hàm loadConfig
    public function loadConfig($moduleName){
        $modulePath = __DIR__."/".$moduleName."/";
        if(File::exists($modulePath."Configs")){
            config([
                'customerConfig'=> File::getRequire($modulePath."Configs/customerConfig.php")
            ]);
        }
    }
}
?>
