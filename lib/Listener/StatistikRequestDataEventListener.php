<?php
namespace OCA\ClubSuiteStats\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteStats\Events\StatistikRequestDataEvent;

class StatistikRequestDataEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof StatistikRequestDataEvent)) {
            return;
        }
        $data = ['app' => 'Statistik', 'stats' => []];
        $event->respond($data);
    }
}
