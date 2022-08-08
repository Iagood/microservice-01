<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'categoria_id'     => $this->category_id,
            'categoria'        => $this->category->title,
            'name'             => $this->name,
            'url'              => $this->url,
            'phone'            => $this->phone != null ? $this->phone : null,
            'whatsapp'         => $this->whatsapp,
            'email'            => $this->email,
            'criado_em'        => $this->created_at->format('d-m-Y')
        ];
    }
}
