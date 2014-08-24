<?php

class SiteController extends BaseController
{
    public function showMessages()
    {
        // Only show the messages from this day
        $messages = Message::where('created_at', '>', date('Y-m-d') . ' 00:00:00')
            ->where('created_at', '<=', date('Y-m-d') . ' 23:59:59')
            ->orderBy('created_at', 'desc')
            ->get();

        return View::make('live', compact('messages'));
    }

    public function showSchedule()
    {
        return View::make('schedule');
    }
}
