<?php

/*Подумайте и реализуйте паттерн для системы оплаты так,
 чтобы можно было в любой момент добавить новую систему оплаты.*/

 Interface Pay
{
    public function getAmount();
}
 Abstract class PayMethod
{
    abstract public function newPay():Pay;
    public function total()
    {
        $pay = $this ->newPay();
        return $pay->getAmount();
    }
}
 Class PayOp implements Pay
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount=$amount;
    }
    public function getAmount():int
    {
        return $this->amount;
    }
}
 Class BankTransfer implements Pay
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount=$amount;
    }
    public function getAmount(): int
    {
        return $this->amount;
    }
}
 Class PayOpMethod extends PayMethod
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function newPay():Pay
    {
        return new PayOp($this->amount);
    }
}
 Class BankTransferMethod extends PayMethod
{
    private int $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    public function newPay():Pay
    {
        return new BankTransfer($this->amount);
    }
}

 $pay = new PayOpMethod(890);
 echo '<br>';
 echo $pay->total();
 echo '<br>';
 $pay= new BankTransferMethod(765);
 echo '<br>';
 echo$pay->total();
 echo '<br>';

