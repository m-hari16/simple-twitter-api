<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetDataResponse extends JsonResource
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
            "tweet_id" => encrypt($this->id),
            "content" => $this->content,
            "attachFileUrl" => $this->fileName ?? "",
            "createdAt" => $this->created_at
        ];
    }
}
