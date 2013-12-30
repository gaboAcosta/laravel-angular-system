<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Cartalyst\Sentry\Users\Eloquent\User {

    protected $spoofing = false;
    protected $spoofed;

    public function spoofUser($id){
        $this->spoofing = true;
        $this->spoofed = $id;
    }

    public function getSpoofedUserId(){
        return $this->spoofed;
    }

    public function spoofing(){
        return $this->spoofing;
    }

    public function clearSpoof(){
        $this->spoofing = false;
        $this->spoofed = null;
    }

}