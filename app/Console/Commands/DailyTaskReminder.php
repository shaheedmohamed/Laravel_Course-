<?php
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class DailyTaskReminder extends Command
{
    protected $signature = 'tasks:daily-reminder';
    protected $description = 'Send daily task reminder to all users';

    public function handle()
    {
        $today = now()->toDateString();

        User::chunk(50, function ($users) use ($today) {
            foreach ($users as $user) {
                $tasks = $user->tasks()->whereDate('created_at', $today)->where('is_finished', false)->get();

                if ($tasks->count()) {
                    Mail::to($user->email)->send(new \App\Mail\DailyTaskEmail($user, $tasks));
                }
            }
        });

        $this->info('Daily reminders sent!');
    }
}
