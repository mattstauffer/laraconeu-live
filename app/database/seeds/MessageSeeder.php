<?php

class MessageSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->delete();

        $oneHourLater = new DateTime('+1 hour');
        $futureDate = new DateTime('tomorrow');

        Message::create(['message' => 'This is a first message.']);
        Message::create([
            'message' => 'This is a second message. It has much more text. Lots and lots of text. I need this to test message lengths.',
            'created_at' => $oneHourLater,
            'updated_at' => $oneHourLater,
        ]);
        Message::create([
            'message' => 'This is a message on the second day.',
            'created_at' => $futureDate,
            'updated_at' => $futureDate,
        ]);
    }
}
