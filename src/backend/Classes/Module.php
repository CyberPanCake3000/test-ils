<?php

class Module
{
    private $strategies = [];

    public function __construct() {
        // добавляем доступные службы доставки
        $this->strategies[] = new FastDelivery('http://fast-delivery.com');
        $this->strategies[] = new SlowDelivery('http://slow-delivery.com', 150);
    }

    public function calculateDeliveryCosts($source, $destination, $weight, $selectedStrategy) {
        $results = [];

        // выбираем нужную стратегию доставки
        $strategy = $this->strategies[$selectedStrategy];

        // запрашиваем стоимость и сроки доставки
        $result = $strategy->calculateCost($source, $destination, $weight);

        // добавляем результат в общий массив
        $results[] = $result;

        return $results;
    }
}