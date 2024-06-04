<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $brands = [];
        if($this->brands != null) {
            dd($this->brands == null);

  foreach (json_decode($this->brands) as $id)
        {
            $brand = Brand::find($id->id);
            $brands[] = [
                'name' => $brand->name,
                'image' => $brand->image
            ];
        }
        }
      
        return [
            'name'  => $this->name,
            'image'     => $this->image,
            'address'   => $this->address,
            'brands'    => $brands,
            'city'    => $this->city != null ? $this->city->name : '',
            'star'  => $this->star,
        ];
    }
}
