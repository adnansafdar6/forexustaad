<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PostPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post Published Successfully';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $posts = Post::where('is_active', 0)->get();
        $todayDate = Carbon::parse(now())->format("U");
//        dump($todayDate);
        foreach ($posts as $post) {
            $datetime = Carbon::parse($post->datetime)->format("U");
            if (!is_null($datetime)) {
                if ($datetime <= $todayDate) {
                    Post::where('id',$post->id)->update(['is_active'=>1]);
//                    \Log::info($post->is_active);
                }
            }
        }

    }

}
