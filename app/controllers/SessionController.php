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

        try
        {
            // Set login credentials
            $credentials = array(
                'username'    => Input::get('username'),
                'password' => Input::get('password'),
            );

            $msg = null;

            // Try to authenticate the user
            $user = Sentry::authenticate($credentials, false);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $msg = 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $msg = 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $msg = 'Wrong password, try again.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $msg = 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $msg = 'User is not activated.';
        }

        // The following is only required if throttle is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $msg = 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $msg = 'User is banned.';
        }



        if(!$msg){
            return Response::json(
                array(
                    'message' => 'login successful'
                ),
                '200'
            );
        } else {
            return Response::json(
                array(
                    'message' => $msg
                ),
                '401'
            );
        }


    }

    public function getEnd(){
        Sentry::logout();
        return Response::json(
            array(
                'message' => 'logout successful'
            ),
            '200'
        );
    }
}