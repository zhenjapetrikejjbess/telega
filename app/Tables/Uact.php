<?php

namespace App\Tables;

/**
 * Class Uact
 * @package App\Tables
 */
class Uact
{
    public function create()
    {
        return <<<'UAct'
CREATE TABLE UAct
(
    UserID UInt64,
    PageViews UInt8,
    Duration UInt8,
    Sign Int8,
    Version UInt8
)
ENGINE = VersionedCollapsingMergeTree(Sign, Version)
ORDER BY UserID
UAct;
    }
}
