<?php
namespace OCA\ClubSuiteStats\Service;

class MemberStatsService {
    // Return sample data for charts: labels + dataset
    public function getOverview(): array {
        return [
            'labels' => ['2019','2020','2021','2022','2023'],
            'data' => [10, 12, 15, 14, 16]
        ];
    }
}
