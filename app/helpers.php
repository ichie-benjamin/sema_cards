<?php

if(!function_exists('lan')){
    function lan($en, $ar){
        if(app()->getLocale() == 'en'){
            return $en;
        }else{
            return $ar;
        }
    }
}
if(!function_exists('current_lan')){
    function current_lan(){
        return app()->getLocale();
    }
}
