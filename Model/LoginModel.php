<?php

class login {
    private $loginId;
    private $username;
    private $wachtwoord;

    function getLoginId() {
        return $this->loginId;
    }

    function getUsername() {
        return $this->username;
    }

    function getWachtwoord() {
        return $this->wachtwoord;
    }

    function setLoginId($loginId) {
        $this->loginId = $loginId;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setWachtwoord($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    function __construct($loginId, $username, $wachtwoord) {
        $this->loginId = $loginId;
        $this->username = $username;
        $this->wachtwoord = $wachtwoord;
    }
}
