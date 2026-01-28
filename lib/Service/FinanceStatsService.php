<?php
namespace OCA\ClubSuiteStats\Service;

class FinanceStatsService {
    public function getMonthlyReport(): array {
        return [
            'labels' => ['Jan','Feb','Mar','Apr','May','Jun'],
            'income' => [1200, 900, 1500, 1100, 1300, 1250],
            'expense' => [800, 700, 950, 600, 700, 900]
        ];
    }
}
