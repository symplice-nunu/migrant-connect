<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        if ($users->count() < 2) {
            $this->command->info('Need at least 2 users to create messages. Creating sample users...');
            User::factory(5)->create();
            $users = User::all();
        }

        $this->command->info('Creating sample messages...');

        // Create conversations between users
        foreach ($users as $sender) {
            $receivers = $users->where('id', '!=', $sender->id)->random(rand(1, 3));
            
            foreach ($receivers as $receiver) {
                // Create 1-5 messages per conversation
                $messageCount = rand(1, 5);
                
                for ($i = 0; $i < $messageCount; $i++) {
                    Message::create([
                        'sender_id' => $sender->id,
                        'receiver_id' => $receiver->id,
                        'content' => $this->getSampleMessage(),
                        'read_at' => $i < $messageCount - 1 ? now() : null, // Last message is unread
                        'created_at' => now()->subDays(rand(0, 7))->subHours(rand(0, 23)),
                    ]);
                }
            }
        }

        $this->command->info('Sample messages created successfully!');
    }

    private function getSampleMessage(): string
    {
        $messages = [
            "Hey! How are you doing?",
            "Thanks for the information!",
            "That sounds great!",
            "Can we meet up sometime?",
            "I'm looking forward to the event.",
            "Do you have any recommendations?",
            "That's really helpful, thank you.",
            "I'll get back to you soon.",
            "Have a great day!",
            "Let me know if you need anything.",
            "I'm new to the area, any tips?",
            "Would you like to grab coffee sometime?",
            "Thanks for your help!",
            "I'll see you at the next meeting.",
            "That's exactly what I was looking for.",
        ];

        return $messages[array_rand($messages)];
    }
} 