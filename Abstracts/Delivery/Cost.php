<?php

namespace App\Abstracts\Delivery;

use Exception;

abstract class Cost
{
    /**
     * @return int
     */
    abstract public function calculate(): int;

    /**
     * @throws Exception
     */
    abstract protected function checkParams();

    /**
     * @param array $params
     * @throws Exception
     */
    public function setParams(array $params)
    {
        foreach ($params as $name => $value) {
            if (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }

        $this->checkParams();
    }
}