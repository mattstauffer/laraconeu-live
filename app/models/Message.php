<?php

class Message extends Eloquent
{
    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
