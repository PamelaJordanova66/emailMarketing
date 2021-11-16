<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Group;
use App\Jobs\SendEmailJob;

class SendScheduleEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduled-emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to custemers that belong to a group that has a scheduled mail sending';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Group::where('schedule_sending', date('Y-m-d'))->get() as  $group){
            $template = $group->template()->first();
            foreach($group->customers()->get() as $customer){
                SendEmailJob::dispatch($customer, $template);
            }
        }
    }
}
