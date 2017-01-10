<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 3/10/2016
 * Time: 1:11 AM
 *
 * encapsulation Session in Class
 */
class Session
{
    public $data = array();

    public function __construct( $key = 'default')
    {

        if(!session_id()) {

            session_start();
        }

        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = array();

        }

        $this->data =& $_SESSION[$key];
    }



    public function start()
    {
        return session_start();
    }

    public function destroy()
    {
        return session_destroy();
    }

    public function emptySession(){
         $this->data=[];
    }
}