<?php
/**
 * Class for session
 * Created by PhpStorm.
 * User: ran
 * Date: 4/12/2016
 * Time: 4:41 PM
 */

namespace Project\MovieCalender\libs;


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