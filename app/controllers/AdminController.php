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

        $message = $this->savePicture($message);

        $message->save();

        $renderedMessage = View::make('_message', compact('message'))->render();

        Pusherer::trigger('live_blog', 'blog_message', ['message' => $renderedMessage]);

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

        if (Input::has('delete_picture')) {
            $message = $this->deletePicture($message);
        } else {
            $message = $this->savePicture($message);
        }

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
        $message = Message::find($id);

        $this->deletePicture($message);

        $message->delete();

        return Redirect::route('admin');
    }

    protected function savePicture(Message $message)
    {
        // Handle file upload.
        if (Input::hasFile('picture')) {
            // Get uploaded picture
            $picture = Input::file('picture');

            // Generate random filename
            $filename = strtolower(Str::random(24) . '.' . $picture->getClientOriginalExtension());

            // Move picture to file folder
            $picture->move(public_path('files'), $filename);

            $message->picture = $filename;
        }

        return $message;
    }

    protected function deletePicture(Message $message)
    {
        // If an image is associated, delete it.
        if ($message->picture) {
            $file = public_path('files/' . $message->picture);

            if (file_exists($file)) {
                unlink($file);
            }

            $message->picture = null;
        }

        return $message;
    }
}
