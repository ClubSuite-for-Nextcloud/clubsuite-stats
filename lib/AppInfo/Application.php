<?php
declare(strict_types=1);

namespace OCA\ClubSuiteStats\AppInfo;

use OCA\ClubSuiteStats\Privacy\Register;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\IContainer;
use OCA\ClubSuiteStats\Service\MemberStatsService;
use OCA\ClubSuiteStats\Service\MeetingStatsService;
use OCA\ClubSuiteStats\Service\FinanceStatsService;
use OCA\ClubSuiteStats\Service\CacheService;
use OCA\ClubSuiteStats\Service\EventService;
use OCA\ClubSuiteStats\Listener\StatistikBasicEventListener;
use OCA\ClubSuiteStats\Listener\StatistikCallbackEventListener;
use OCA\ClubSuiteStats\Listener\StatistikRequestDataEventListener;
use OCA\ClubSuiteStats\Events\StatistikBasicEvent;
use OCA\ClubSuiteStats\Events\StatistikCallbackEvent;
use OCA\ClubSuiteStats\Events\StatistikRequestDataEvent;

if (!\class_exists('OCA\ClubSuiteStats\AppInfo\Application', false)) {
class Application extends App implements IBootstrap {
    public const APP_ID = 'clubsuite-stats';

    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_ID, $urlParams);
        $container = $this->getContainer();
        $container->registerService('CacheService', function(IContainer $c){ return new CacheService($c->query('ICache')); });
        $container->registerService('MemberStatsService', function(IContainer $c){ return new MemberStatsService($c->query('CacheService')); });
        $container->registerService('MeetingStatsService', function(IContainer $c){ return new MeetingStatsService($c->query('CacheService')); });
        $container->registerService('FinanceStatsService', function(IContainer $c){ return new FinanceStatsService($c->query('CacheService')); });
        $container->registerService('EventService', function(IContainer $c){ return new EventService(\OC::$server->getEventDispatcher()); });
    }

    public function register(IRegistrationContext $context): void {
        $context->registerEventListener(StatistikBasicEvent::class, StatistikBasicEventListener::class);
        $context->registerEventListener(StatistikCallbackEvent::class, StatistikCallbackEventListener::class);
        $context->registerEventListener(StatistikRequestDataEvent::class, StatistikRequestDataEventListener::class);
    }

    public function boot(IBootContext $context): void {
        $context->injectFn(function(\OCP\IContainer $c) {
            if (\interface_exists('\OCP\Privacy\IManager')) {
                $c->get(\OCP\Privacy\IManager::class)->registerProvider(Register::class);
            }
        });
    }
}

}
