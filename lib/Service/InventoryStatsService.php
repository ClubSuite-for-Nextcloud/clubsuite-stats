<?php
namespace OCA\ClubSuiteStats\Service;

class InventoryStatsService {
    public function stockByCategory(): array {
        return [
            'labels' => ['Audio','Video','Furniture','Tools'],
            'data' => [5, 3, 12, 20]
        ];
    }
}
