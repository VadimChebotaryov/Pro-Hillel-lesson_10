<?php

/*Построить систему такси.

  Клиентский код должен вызывать тип доставки, который в свою очередь будет отдавать
   машину соотвествующего типа,
   у которой будет 2 метода (вывод модели машины и вывод цены).
  Всего будет 3 типа такси:
  -Эконом
  -Стандарт
  -Люкс*/

interface TaxiType
{
    public function cost();
    public function model();
}
abstract class Taxi
{
    abstract public function createTaxi(): TaxiType;
    public function getTaxiModelAndPrice(): array
    {
        $cost = $this->createTaxi()->cost();
        $model = $this->createTaxi()->model();
        return compact('cost', 'model');
    }
}
class EconomyTaxi implements TaxiType
{
    public function cost(): string
    {
        return '100';
    }
    public function model(): string
    {
        return 'Economy';
    }
}
class Economy extends Taxi
{
    public function createTaxi(): TaxiType
    {
        return new EconomyTaxi();
    }
}
class StandartTaxi implements TaxiType
{
    public function cost(): string
    {
        return '200';
    }
    public function model(): string
    {
        return 'Standart';
    }
}
class Standart extends Taxi
{
    public function createTaxi(): TaxiType
    {
        return new StandartTaxi();
    }
}
class LuxTaxi implements TaxiType
{
    public function cost(): string
    {
        return '300';
    }
    public function model(): string
    {
        return 'Lux';
    }
}
class Lux extends Taxi
{
    public function createTaxi(): TaxiType
    {
        return new LuxTaxi();
    }
}
echo '<pre>';
$economic = new Economy();
var_dump($economic->getTaxiModelAndPrice());

$standart = new Standart();
var_dump($standart->getTaxiModelAndPrice());

$lux = new Lux();
var_dump($lux->getTaxiModelAndPrice());
echo '<pre>';

