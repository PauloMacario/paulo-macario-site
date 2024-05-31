<?php

namespace Rules\ControlFinance;

use App\Models\ControlFinance\Partition;

class SavePartition
{
    private $modelPartition;

    public function __construct()
    {
        $this->modelPartition = new Partition();
    }

    public function execute($partition)
    {
       $this->modelPartition->create($partition);
    }
}