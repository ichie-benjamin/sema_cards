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
if(!function_exists('c_dir')){
    function c_dir(){
        if(current_lan() == 'ar'){
            return 'rtl';
        }else{
            return '';
        }
    }
}
