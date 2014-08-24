<?php

class SiteController extends BaseController
{
    public function showMessages()
    {
        $messages = Message::all();

        return View::make('live', compact('messages'));
    }
}
