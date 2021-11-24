<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'data' => $this->collection,
            'name' => $this->name,
            'netPrice' => round($this->price - ($this->price*($this->discount/100)),2),
            'rating' => $this->reviews > 0 ? round($this->reviews->sum('star')/$this->reviews->count(), 2) : 'No Reviews',
        ];
    }  
}
