<?php
/**
 * Hauptverantwortlich: Alice Domandl
 */

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 02.02.2017
 * @author Alice
 * Time: 14:56
 */
class AdminLoginLogoutControllerTest extends TestCase
{


    public function testURL()
    {
        $response = $this->call('GET', 'admin/login');
        $this->assertEquals(200, $response->status());
    }

    public function testGetLogin()
    {
        $this->visitRoute('admin/login');
    }

    public function testBlankLogin()
    {
        $this->json('POST', 'admin/login', ['password' => ' ']);
        $this->visitRoute('admin/login');
        $this->press('btnLogin');
        $this->seePageIs('admin/login');
        $this->see("Falsches Passwort!");
    }

    public function testLoginSuccessful()
    {
        $this->json('POST', 'admin/login', ['password' => 'test'])
            ->assertRedirectedToRoute('admin');
    }

    public function testLoginFailed()
    {
        $this->json('POST', 'admin/login', ['password' => 'falsch'])
            ->assertRedirectedToRoute('admin/login');

        $this->visitRoute("login");
        $this->type("falsch", "password");
        $this->press("Login");
        $this->seePageIs("admin/login");
        $this->see("Falsches Passwort");

    }

    public function testLogout()
    {
        $this->json('GET', 'admin/logout')
            ->assertRedirectedToRoute('admin/login');
    }
}
