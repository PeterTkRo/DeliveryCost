<?php

namespace App;

use App\Abstracts\Delivery\Cost;
use \Exception;

final class DeliveryCost
{
    protected Cost $deliveryCostClass;

    /**
     * @param string $deliveryCostClass
     * @throws Exception
     */
    public function __construct(
        string $deliveryCostClass
    )
    {
        try {
            $this->deliveryCostClass = new ($deliveryCostClass);
        } catch (\TypeError) {
            error_log('TYPE_ERROR - Bad delivery class - '. $deliveryCostClass);
            throw new Exception('Bad delivery class');
        }
    }

    /**
     * @param array $params
     * @return DeliveryCost
     * @throws Exception
     */
    public function setParams(array $params): DeliveryCost
    {
        try {
            $this->deliveryCostClass->setParams($params);
        } catch (Exception $e) {
            error_log('ERROR - '. $e->getMessage() . ' | IN FILE - ' . $e->getFile() . ' : ' . $e->getLine() );
            throw $e;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->deliveryCostClass->calculate();
    }
}