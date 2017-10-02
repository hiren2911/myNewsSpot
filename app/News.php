<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class News extends Model implements Feedable
{
    //
    public $fillable = ['title', 'image', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link(route('news.show', $this->id))
            ->author($this->user->name);
    }

    public static function getFeedItems()
    {
        return News::all();
    }
}
