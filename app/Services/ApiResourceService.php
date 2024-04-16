<?php

namespace App\services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class ApiResourceService
{
    public function __construct()
    {
    }

    private function getDbResources()
    {
        $db_resources = DB::select("show status like 'Innodb_system_rows%';");
        return $db_resources;
    }

    private function cronResources()
    {
        $cron = shell_exec('grep CRON /var/log/syslog | tail -n 1');
        return $cron;
    }

    private function timeResources()
    {
        $uptime = shell_exec('uptime -p');
        return $uptime;
    }

    private function memoryResources()
    {
        $memory = shell_exec('vmstat -s');
        return $memory;
    }

    public function getApiResources()
    {
        $db_resources = $this->getDbResources();
        $cron_resources = $this->cronResources();
        $time_resources = $this->timeResources();
        $memory_resources = $this->memoryResources();
        return response()->json([
            'db_resources'      => $db_resources,
            'cron_resources'    => $cron_resources,
            'uptime'    => $time_resources,
            'memory_resources'  => $memory_resources
        ]);
    }
}