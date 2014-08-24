<?php

class AdminController extends BaseController
{
    public function index()
    {
        // Only show the messages from this day
        $messages = Message::orderBy('published_at', 'desc')->get();

        return View::make('admin.index', compact('messages'));
    }

    public function create()
    {
        return View::make('admin.create');
    }

    public function store()
    {
        $message = new Message;
        $message->published_at = new DateTime;
        $message->message = Input::get('message');
        $message->save();

        return Redirect::route('admin');
    }

    public function edit($id)
    {
        $message = Message::find($id);

        return View::make('admin.edit', compact('message'));
    }

    public function update($id)
    {
        $message = Message::find($id);
        $message->published_at = Input::get('published_at');
        $message->message = Input::get('message');
        $message->save();

        return Redirect::route('admin');
    }

    public function delete($id)
    {
        $message = Message::find($id);

        return View::make('admin.delete', compact('message'));
    }

    public function destroy($id)
    {
        Message::destroy($id);

        return Redirect::route('admin');
    }
}
