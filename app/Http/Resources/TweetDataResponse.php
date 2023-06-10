<?php

namespace App\Http\Resources;

use App\Http\Traits\MediaServiceTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetDataResponse extends JsonResource
{
    use MediaServiceTrait;

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
            "attachFileUrl" => isset($this->fileName) ? $this->urlGenerator('attachedFile', $this->fileName) : "",
            "createdAt" => $this->created_at
        ];
    }
}
