<?php

/**
 * Design pattern "Observer" (Behavioral)
 * This is demo code
 * See for details: http://maxsite.org/page/php-patterns
 */


/*
https://maxsite.org/page/php-observer
Поведенческий шаблон Наблюдатель реализует механизм, с момощью которого один класс может уведомлять другие о своём изменении. Практическая реализация кода может быть разной, но в PHP уже существуют готовые стандартные интерфейсы SplSubject, SplObjectStorage и SplObserver, на которых и принято реализовывать паттерн Observer.
Класс Наблюдатель (Observable) реализует интерфейс SplSubject. В этом классе хранятся «слушатели» — объекты стандартного класса SplObjectStorage. С помощью метода attach()добавляется новый «слушатель». Удалить его можно с помощью detach().

Также есть метод notify()которые «отправляет» уведомление об изменениях в классе «наблюдателя» всем своим «слушателям».

Каждый слушатель реализует стандартный интерфейс SplObserver и должен содержать метод update(). Собственно этот метод и используется в качестве «события».
*/


/**
 * Observable use standart interface SplSubject
 * Class that is being listened for changes in class Observer1 and class Observer2
 */
class Observable implements \SplSubject
{
    /** 
     * list of observers
     */
    private $observers;

    /**
     * create standart class SplObjectStorage
     */
    function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * standart method of SplObjectStorage
     */
    function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * standart method of SplObjectStorage
     */
    function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * send notify, method that send message/trigger/notify that this Class has been changed
     */
    function notify()
    {
        foreach ($this->observers as $obj) {
            $obj->update($this);
        }
    }
}



/**
 * Observer use standart interface SplObserver
 * Class that listen for changes in class Observable 
 */
class Observer1 implements \SplObserver
{
    /**
     * get notify from Observable
     */
    function update(SplSubject $subject)
    {
        echo 'update Observer1<br>';
    }
}



/**
 * another class for Observer
 * Another Class that listen for changes in class Observable 
 */
class Observer2 implements \SplObserver
{
    function update(SplSubject $subject)
    {
        echo 'Observer2 says: class Observable has been changed<br>';
    }
}



/**
 * Run
 */

/**
 * create Observable, Class that is being listened for changes in class Observer1 and class Observer2
 */
$observable = new Observable();

/**
 * create Observers (that listen for changes in class Observable)
 */
$o1 = new Observer1();
$o2 = new Observer2();

/**
 *  attach Observers to Observable
 */
$observable->attach($o1);
$observable->attach($o2);


/**
 * send notify
 * u can use somewhere in code, e.g after save/update/delete
 */
$observable->notify();

/*
    update Observer1
    update Observer2
 */

/**
 * exclude Observer1
 */
$observable->detach($o1);

/**
 * send notify
 */
$observable->notify();
/*
    update Observer2
 */


# end of file