<?php

class MessagesController extends BaseController
{
    public function index()
    {
        $messages = Message::orderBy('published_at', 'desc')->get();

        return View::make('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        return View::make('admin.messages.create');
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), [
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
        }

        $message = new Message;
        $message->published_at = new DateTime;
        $message->message = Input::get('message');
        $message->user_id = Auth::user()->id;

        $message = $this->savePicture($message);

        $message->save();

        $renderedMessage = View::make('_message', compact('message'))->render();

        Pusherer::trigger('live_blog', 'blog_message', ['message' => $renderedMessage]);

        return Redirect::route('admin');
    }

    public function edit($id)
    {
        $message = Message::find($id);

        return View::make('admin.messages.edit', compact('message'));
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), [
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
        }

        $message = Message::find($id);
        $message->published_at = DateTime::createFromFormat('Y-m-d H:i', Input::get('published_at'));
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

        return View::make('admin.messages.delete', compact('message'));
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
