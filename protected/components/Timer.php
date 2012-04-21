<?php
class Timer extends CApplicationComponent {

  public $startTime;

  public function init()
  {
    $time = microtime();
    // Yii::trace('start timer @ '.$time,'components.Timer.init()');
    $this->startTime = $time;
  }

  public function getTimer()
  {
    $time = microtime();
    // Yii::trace('stop timer @ '.$time,'components.Timer.getTimer()');
    list($e1, $e0) = explode(" ", $time);
    list($s1, $s0) = explode(" ", $this->startTime);
    return (($e1+$e0)-($s1+$s0))*1000.0;
  }
}
