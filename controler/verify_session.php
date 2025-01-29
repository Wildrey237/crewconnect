<?php
function verify_session()
{
    //si la session nexiste pas, start une session
    if (session_status() == PHP_SESSION_NONE)
        session_start();

}
