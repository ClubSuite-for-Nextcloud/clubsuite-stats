<?php
namespace OCA\ClubSuiteStats\Service;

use OCP\EventDispatcher\IEventDispatcher;
use OCA\ClubSuiteStats\Events\StatistikBasicEvent;
use OCA\ClubSuiteStats\Events\StatistikCallbackEvent;
use OCA\ClubSuiteStats\Events\StatistikRequestDataEvent;

class EventService {
    private IEventDispatcher $dispatcher;

    public function __construct(IEventDispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    public function dispatchBasicEvent(array $payload): void {
        $event = new StatistikBasicEvent(uniqid('stat_', true), time(), $payload);
        $this->dispatcher->dispatch($event);
    }

    public function dispatchCallbackEvent(array $payload, callable $callback): void {
        $event = new StatistikCallbackEvent(uniqid('stat_cb_', true), time(), $payload, $callback);
        $this->dispatcher->dispatch($event);
    }

    public function dispatchRequestDataEvent(callable $callback): void {
        $event = new StatistikRequestDataEvent(uniqid('stat_req_', true), time(), [], $callback);
        $this->dispatcher->dispatch($event);
    }
}
