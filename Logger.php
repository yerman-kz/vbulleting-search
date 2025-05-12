<?php
namespace vBulletin\Search;

class Logger
{
    private $logFile;

    public function __construct(string $logFile = '/var/www/search_log.txt')
    {
        $this->logFile = $logFile;
    }

    public function log(string $query): void
    {
        $cleanQuery = preg_replace('/[^\w\s]/u', '', $query);
        file_put_contents($this->logFile, $cleanQuery.PHP_EOL, FILE_APPEND);
    }
}