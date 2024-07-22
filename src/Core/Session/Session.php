<?php
// namespace Core\Session;

// class Session implements SessionInterface{

//     public  function __construct(){
//         $this->start();
//     }
//     public  function start(){
//         if(!isset($_SESSION)){
//         //    session_start();
//         }

//       //  return $_SESSION;
//     }

//     public  function set($key, $value){
//         $_SESSION[$key] = $value;
//     }

//     public  function get($key){
//         if(isset($_SESSION[$key])){
//             return $_SESSION[$key];
//         }
//         return null;
//     }

//     public  function close(){
//         if(isset($_SESSION)){
//             unset($_SESSION);
//             session_destroy();
//             session_write_close();

//         }

//     }

//     public  function isset($key){
//         return isset($_SESSION[$key]);
//     }
//     public  function destroy(){
//         session_destroy();
//     }
        
    
    
// }


namespace Core\Session;

class Session implements SessionInterface
{
    public function __construct()
    {
        $this->start();
    }

    public function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function close()
    {
        if (session_status() !== PHP_SESSION_NONE) {
            session_unset();
            session_destroy();
            session_write_close();
        }
    }

    public function isset($key)
    {
        return isset($_SESSION[$key]);
    }

    public function destroy()
    {
        $this->close();
    }
}
