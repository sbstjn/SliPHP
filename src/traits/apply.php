<?php

Namespace SliPHP;

Trait apply
{
    /**
     * Apply a function or list of function to a data obect
     *
     * @param $data Content to be filter
     * @param $filter Single PHP function or list of functions for example "strtolower|ucfirst"
     * @return mixed
     */
    public function apply($data, $modifier)
    {
        $list = explode('|', $modifier);
        
        foreach ($list as $function) {
            $data = $function($data);
        }
        
        return $data;
    }
}
