<?php

class MessageSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->delete();

        Message::create(['message' => 'This is a first message.']);
        Message::create(['message' => 'This is a second message. It has much more text. Lots and lots of text. I need this to test message lengths.']);
    }
}
