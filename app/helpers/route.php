<?php 
function buildPrefix(string $moduleNameConfig, string $type='backend'){
    return config($moduleNameConfig.'.prefix.'.$type);
}

?>