<?php

namespace App\Delivery\Cost;

use App\Abstracts\Delivery\Cost;
use \Exception;

class NP extends Cost
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
        if ($this->weight <= 10) {
            return 100;
        } else {
            return 200;
        }
    }

    /**
     * @throws Exception
     */
   protected function checkParams()
   {
       if (is_null($this->weight)) {
           error_log('INFO required parameters are not filled in ' . $this::class);
           throw new Exception('required parameters are not filled');
       }
   }
}