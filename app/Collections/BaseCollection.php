<?php
namespace App\Collections;

use Illuminate\Support\Collection;

class BaseCollection extends Collection
{


    /**
     * @ 递归树形结构
     * @return static
     */
    public function toTrees($pid='')
    {
        $result = [];
        $this->each( function( $item, $key ) use($pid, $result){
            if( $item->pid == $pid ){
                $item['son']    =   $this->toTrees($item->uuid);
                $result[]       =   $item;
            }
        } );

        return $result;
    }
}