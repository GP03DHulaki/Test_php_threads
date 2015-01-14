<?php
class filelock
{
private $handle;

public static function read ( $handle ) {
$filelock = new static();
$filelock->handle = $handle;
return flock($handle,LOCK_SH|LOCK_NB) ? $filelock : false;
}

public static function write ( $handle ) {
$filelock = new static();
$filelock->handle = $handle;
return flock($handle,LOCK_EX|LOCK_NB) ? $filelock : false;
}

public function __destruct ( ) {
flock($this->handle,LOCK_UN);
}
}
?>