<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getLatestInsertableId($latestPrimaryId=null, $prefix='') : string {
        if (isset($latestPrimaryId)) {
            $latestId = ltrim(ltrim($latestPrimaryId, $prefix), '0');
            $insertId = ((int) $latestId) + 1;
            $insertId = $insertId <= 9 ? $prefix.'0'.$insertId : $prefix.$insertId;
        } else {
            $insertId = $prefix.'01';
        }

        return $insertId;
    }
}
