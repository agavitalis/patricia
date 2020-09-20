<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;

class SystemTest extends TestCase
{
    
     /**
     * /api/users [GET]
     */
    public function testRestrictedRoute()
    {
        $this->get('/api/users')->assertResponseStatus(401);
    }

    /**
     * / [GET]
     */
    public function testUnrestrictedRoute()
    {
        $this->get('/')->assertResponseStatus(200);
    }
    
    /**
     * /api/register [POST]
     */

    public function testRegistration(){

        $response = $this->call('POST', 'api/register',
        [
            "first_name"=> "Ogbonna",
            "last_name"=>"Vitalis",
            "email"=>"agavitalisogbonna123@gmail.com",
            "password"=>"Vitalis123@",
            "password_confirmation"=>"Vitalis123@"
          
        ]);
        $this->assertEquals(201, $response->status());
       
    }

    /**
     * /api/login [POST]
     */
    public function testLogin(){

        $response = $this->call('POST', 'api/login', ['email' => "agavitalisogbonna123@gmail.com", 'password'=>'Vitalis123@']);
        $this->headers['Accept'] = 'application/json';
        $this->headers['Authorization'] = 'Bearer '.$response['token'];
        //print_r( $response['token']);
        $this->assertEquals(200, $response->status());
    }
   
    /**
     * /users [GET]
     */
    public function testShouldReturnAllUsers(){
       
        $response = $this->call('POST', 'api/login', ['email' => "agavitalisogbonna123@gmail.com", 'password'=>'Vitalis123@']);
        $headers = [];
        $headers['Accept'] = 'application/json';
        $headers['Authorization'] = 'Bearer '.$response['token'];

        $this->get("/api/users", $headers);
        $this->seeStatusCode(200);
      
    }

    /**
     * /users [GET]
     */
    public function testShouldReturnAUser(){
       
        $response = $this->call('POST', 'api/login', ['email' => "agavitalisogbonna123@gmail.com", 'password'=>'Vitalis123@']);
        $headers = [];
        $headers['Accept'] = 'application/json';
        $headers['Authorization'] = 'Bearer '.$response['token'];

        $this->get("/api/users/1", $headers);
        $this->seeStatusCode(200);
      
    }

    /**
     * /users [GET]
     */
    public function testShouldReturnLoggedInUser(){
       
        $response = $this->call('POST', 'api/login', ['email' => "agavitalisogbonna123@gmail.com", 'password'=>'Vitalis123@']);
        $headers = [];
        $headers['Accept'] = 'application/json';
        $headers['Authorization'] = 'Bearer '.$response['token'];

        $this->get("/api/profile", $headers);
        $this->seeStatusCode(200);
      
    }


}
