<?php

include('DeliveryCost.php');
include('Abstracts/Delivery/Cost.php');
include('Delivery/Cost/DHL.php');
include('Delivery/Cost/NP.php');

use App\DeliveryCost;
use App\Delivery\Cost\NP;
use App\Delivery\Cost\DHL;

try {
    $cost = (new DeliveryCost(NP::class))->setParams(['weight' => 11])->getCost();
    echo( "delivery cost - $cost grn." . PHP_EOL);
} catch (Exception $e) {
    echo 'some wrong in delivery choice';
}