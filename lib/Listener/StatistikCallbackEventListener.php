<?php
namespace OCA\ClubSuiteStats\Listener;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;

use OCA\ClubSuiteStats\Events\StatistikCallbackEvent;

class StatistikCallbackEventListener implements IEventListener {
    public function handle(Event $event): void {
        if (!($event instanceof StatistikCallbackEvent)) {
            return;
        }
        $payload = $event->getPayload();
        $event->triggerCallback(['handledBy' => 'Statistik', 'count' => count($payload)]);
    }
}
