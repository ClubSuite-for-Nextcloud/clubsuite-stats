<?php
namespace OCA\ClubSuiteStats\Controller;

use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;
use OCA\ClubSuiteStats\Service\MemberStatsService;
use OCA\ClubSuiteStats\Service\FinanceStatsService;
use OCA\ClubSuiteStats\Service\MeetingStatsService;
use OCA\ClubSuiteStats\Service\InventoryStatsService;

class StatsController extends OCSController {
    private MemberStatsService $members;
    private FinanceStatsService $finance;
    private MeetingStatsService $meetings;
    private InventoryStatsService $inventory;

    public function __construct(string $appName, IRequest $request, MemberStatsService $members, FinanceStatsService $finance, MeetingStatsService $meetings, InventoryStatsService $inventory) {
        parent::__construct($appName, $request);
        $this->members = $members;
        $this->finance = $finance;
        $this->meetings = $meetings;
        $this->inventory = $inventory;
    }

    public function members(): JSONResponse {
        // try cache first
        $cache = new \OCA\ClubSuiteStats\Service\CacheService($this->request->getAttribute('app')->getAppContainer()->query('ICache') ?? null);
        $key = 'statistik_members_overview';
        $cached = $cache->get($key);
        if ($cached) {
            return new JSONResponse($cached);
        }
        $data = $this->members->getOverview();
        $cache->set($key, $data, 600);
        return new JSONResponse($data);
    }

    public function finances(): JSONResponse {
        $cache = new \OCA\ClubSuiteStats\Service\CacheService($this->request->getAttribute('app')->getAppContainer()->query('ICache') ?? null);
        $key = 'statistik_finances_monthly';
        $cached = $cache->get($key);
        if ($cached) return new JSONResponse($cached);
        $data = $this->finance->getMonthlyReport();
        $cache->set($key, $data, 600);
        return new JSONResponse($data);
    }

    public function meetings(): JSONResponse {
        $limit = (int)$this->request->getParam('limit', 50);
        $offset = (int)$this->request->getParam('offset', 0);
        $data = $this->meetings->attendanceOverTime($limit, $offset);
        return new JSONResponse($data);
    }

    public function inventory(): JSONResponse {
        $limit = (int)$this->request->getParam('limit', 50);
        $offset = (int)$this->request->getParam('offset', 0);
        $data = $this->inventory->stockByCategory($limit, $offset);
        return new JSONResponse($data);
    }
}
