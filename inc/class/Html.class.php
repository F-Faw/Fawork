<?php

class Html{
    public static function link($page,$nom=null){
        if(!is_array($page)){
            $lien = '<a href="'.$page.'">'.$nom.'</a>';
        }else{
            $lien = '<a href="'.strtolower($page['module']).(( (int) $page['action']) ? '-'.(int) $page['action'] : '').((is_array($page['params'])) ? '-'.implode('-',$page['params']) : '').'.html" '.(((strtolower($page['module']) == strtolower(Core::$module)) && isset($page['marqueur'])) ? 'class="'.$page['marqueur'].'"' : '').'>'.$page['titre'].'</a>';
        }
        return $lien;
    }
}