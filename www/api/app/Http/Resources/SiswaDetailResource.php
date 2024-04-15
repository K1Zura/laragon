<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'image' => $this->image,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'kelas_id' => $this->kelas_id,
            'tahun_ajaran_id' => $this->tahun_ajaran_id,
            'kelas' => $this->whenLoaded('kelas'),
            'tahunAjaran' => $this->whenLoaded('tahunAjaran'),
        ];
    }
}
