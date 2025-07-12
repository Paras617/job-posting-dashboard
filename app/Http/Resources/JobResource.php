<?php
   namespace App\Http\Resources;

   use Illuminate\Http\Resources\Json\JsonResource;

   class JobResource extends JsonResource
   {
       public function toArray($request)
       {
           return [
               'id' => $this->id,
               'title' => $this->title,
               'type' => $this->type,
               'status' => $this->status,
               'applications' => $this->applications,
               'duration' => $this->duration,
               'description' => $this->description,
               'created_at' => $this->created_at,
               'updated_at' => $this->updated_at,
           ];
       }
   }