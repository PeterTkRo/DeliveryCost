<?php

namespace App\Delivery\Cost;

use App\Abstracts\Delivery\Cost;
use \Exception;

class DHL extends Cost
{
    /**
     * @param int|null $weight
     */
    public function __construct(
        protected int|null $weight = null
    )
    {}

    /**
     * @return int
     */
    public function calculate(): int
    {
        return $this->weight * 100;
    }

    /**
     * @throws Exception
     */
    protected function checkParams()
    {
        if (is_null($this->weight)) {
            throw new Exception('required parameters are not filled');
        }
    }
}