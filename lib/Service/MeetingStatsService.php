<?php
namespace OCA\ClubSuiteStats\Service;

class MeetingStatsService {
    public function attendanceOverTime(): array {
        return [
            'labels' => ['M1','M2','M3','M4','M5'],
            'data' => [8, 10, 7, 9, 11]
        ];
    }
}
