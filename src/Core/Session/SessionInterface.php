<?php
namespace Core\Session;

interface SessionInterface {
    public function set($key, $value);
    public function get($key);
    public function close();
    public function isset($key);
    public function destroy();
}