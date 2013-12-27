<?php
/**
 * User: Gabriel Acosta
 * Date: 12/27/13
 * Time: 11:20 AM
 */

class UsersTest extends TestCase{

    protected $userRepoMock;
    protected $foundUserMock;


    public function teardown(){
        Mockery::close();
    }

    public function setup(){
        parent::setup();
        $this->userRepoMock = Mockery::mock(new User);


        $this->foundUserMock = Mockery::mock(new User);
        $this->foundUserMock->username = 'asd';
    }

    /**
     * A function that retrieves the logged in status message
     */

    public function getStatus(){
        $this->client->request('GET','/session/status');
        $status_message = $this->getJsonResponse();
        return $status_message;
    }


    /**
     * A test that when no given user there is no active session
     */
    public function testFresh(){
        Session::flush();
        $status_message = $this->getStatus();
        $this->assertResponseOk();
        $this->assertTrue($status_message['message'] == 'no active session');
    }


    /**
     * A function that posts a user data
     */
    public function postuser($user = array()){
        if(empty($user)){
            $user = array('username'=>'asd','password'=>'asd');
            $this->app->instance('User',$this->userRepoMock);
            $this->userRepoMock
                ->shouldReceive('whereUsername')
                ->once()
                ->with('asd')
                ->andReturn($this->foundUserMock);

        }

        $this->client->request('POST','/session/start',$user);
        return $user;
    }


    /**
     * Create a logged in user
     */

    public function testLogin(){
        Session::flush();
        $user = $this->postuser();

        $this->assertTrue(Auth::user()->username == $user['username']);
    }

    /**
     * A test when there is a user logged in the status is logged in
     */

    public function testLoggedStatus(){
        Session::flush();
        $user = $this->postuser();
        $status_message = $this->getStatus();
        $this->assertResponseOk();
        $this->assertTrue($status_message['message'] == 'user logged in');
    }

    /**
     * Thre should be a 401 (Unauthorized) when the user being logged in is incorrect
     */

    public function testWrongUser(){
        Session::flush();
        $user = $this->postuser(array('username'=>'XxX','password'=>'XxX'));
        $status_message = $this->getJsonResponse();
        $this->assertResponseStatus('401');
        $this->assertTrue($status_message['message'] == 'login refused');
    }

    public function testLogout(){
        Session::flush();
        $user = $this->postuser();

        $this->client->request('GET','/session/end');

        $this->assertFalse(Auth::check());
    }
}