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
    public function apply($data, $filter)
    {
        $list = explode('|', $filter);
        
        foreach ($list as $filter) {
            $data = $filter($data);
        }
        
        return $data;
    }
}
