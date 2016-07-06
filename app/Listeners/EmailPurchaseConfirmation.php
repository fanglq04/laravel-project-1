<?php

namespace App\Listeners;

use Log;
use App\Events\PodcastWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class EmailPurchaseConfirmation
 * @package App\Listeners
 * 需要将事件监听器放到队列
 * 实现 ShouldQueue 接口
 */
class EmailPurchaseConfirmation implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PodcastWasPurchased  $event
     * @return void
     */
    public function handle(PodcastWasPurchased $event)
    {
        //
        Log::info('this is log for listeners');

    }
}
