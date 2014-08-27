<?php

class MessageSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->delete();

        $now = new DateTime;
        $oneHourLater = new DateTime('+1 hour');
        $tomorrow = new DateTime('tomorrow');

        $user = User::first();

        Message::create([
            'message' => 'This is a first message.',
            'published_at' => $now,
            'user_id' => $user->id
        ]);
        Message::create([
            'message' => 'This is a second message. It has much more text. Lots and lots of text. I need this to test message lengths.',
            'published_at' => $oneHourLater,
            'user_id' => $user->id
        ]);
        Message::create([
            'message' => 'This is a message with an embedded tweet. <blockquote class="twitter-tweet" lang="en"><p>The 3 day <a href="https://twitter.com/hashtag/LaraconEU?src=hash">#LaraconEU</a> Schedule can be downloaded here <a href="http://t.co/VIob78wp7S">http://t.co/VIob78wp7S</a></p>&mdash; Laracon EU (@laraconeu) <a href="https://twitter.com/laraconeu/statuses/503119817600413697">August 23, 2014</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>',
            'published_at' => $oneHourLater,
            'user_id' => $user->id
        ]);
        Message::create([
            'message' => 'This is a message on the second day.',
            'published_at' => $tomorrow,
            'user_id' => $user->id
        ]);
    }
}
