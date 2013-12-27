<?php
/**
 * User: Gabriel Acosta
 * Date: 12/27/13
 * Time: 10:56 AM
 */

class SessionController extends BaseController {

    public function __construct(User $userRepo){
        $this->userRepo = $userRepo;
    }

    public function getStatus(){

        if (Auth::check())
        {
            $message = 'user logged in';
        } else {
            $message = 'no active session';
        }

        return Response::json(
            array(
                'message' => $message
            ),
            '200'
        );
    }

    public function postStart(){
        $validator = Validator::make(Input::all(), User::$login_rules);
        if(Auth::attempt(array('username'=>Input::get('username'),'password'=>Input::get('password')))){
            return Response::json(
                array(
                    'message' => 'login successfull'
                ),
                '200'
            );
        } else {
            return Response::json(
                array(
                    'message' => 'login refused'
                ),
                '401'
            );
        }


    }

    public function getEnd(){
        Auth::logout();
    }
}