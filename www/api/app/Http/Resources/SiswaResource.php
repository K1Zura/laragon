<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $square = 4+4;
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            // 'Contoh' => 'Terserah',
            // 'Contoh' => $square,
        ];
    }
}
