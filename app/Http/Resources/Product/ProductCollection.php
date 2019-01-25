<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//        return parent::toArray($request);

        return [
            'name' =>$this->name,
            'rating' => $this->reviews->count() ? rand($this->reviews->sum('star')/$this->reviews->count(),2) : 'no rating yet',
            'link' => [
                'href' => route('products.show', $this->id)
            ],
        ];
    }
}
