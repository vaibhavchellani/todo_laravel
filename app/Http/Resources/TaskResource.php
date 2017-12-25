<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TaskResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
/*        return parent::toArray($request);*/
        return [
            'data'=>[
                'name'=>$this->name,
                'author'=>$this->author
            ],
            'meta'=>'hehe'

        ];
    }
}