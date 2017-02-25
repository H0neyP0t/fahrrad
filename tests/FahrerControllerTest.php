<?php
/**
 * Hauptverantwortlich: Alice Domandl
 */

use App\Fahrer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Http\Controllers\FahrerController;

/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 05.02.2017
 * Time: 18:09
 */
class FahrerControllerTest extends TestCase
{

    public function testCreateFahrerSuccessful()
    {
        $this->json('POST', '/fahrer', ['name' => 'Sally'])
            ->seeInDatabase('fahrer', ['name' => 'Sally']);
    }

    public function testCreateFahrerFailed()
    {
        $this->call('POST', '/fahrer', ['name' => 'Sally']);
        $this->json('POST', '/fahrer', ['name' => 'Sally'])
            ->seeJsonEquals([
                "msg" => "Name schon vorhanden", "err" => 1,
            ]);
    }

    public function testGetAllFahrer()
    {
        $this->call('POST', '/fahrer', ['name' => 'Sally']);
        $names = Fahrer::all("name");
        $result = [];

        foreach ($names as $name) {
            array_push($result, $name->name);
        }

        $this->json('GET', '/allnames')
            ->seeJsonEquals([
                "msg" => "ok", "names" => $result
            ]);
    }

    public function testUpdateFahrer()
    {
        $this->json('POST', '/fahrer', ['id' => '5', 'name' => 'Sally']);
        $this->json('PUT', '/fahrer/5', ['id' => '5', 'email' => 'sally@gmail.com']);
//        $result = Fahrer::whereName('Sally')->first(['created_at']) . Fahrer::whereName('Sally')->first(['email']) .
//            Fahrer::whereName('Sally')->first(['gewicht']) . Fahrer::whereName('Sally')->first(['groesse']) .
//            Fahrer::whereName('Sally')->first(['modus_id']) . Fahrer::whereName('Sally')->first(['name']) . Fahrer::whereName('Sally')->first(['updated_at']);
        $this->seeInDatabase('fahrer', ['email' => 'sally@gmail.com']);
    }

    public function testDeleteFahrer()
    {
        $this->json('POST', '/fahrer', ['id' => '5', 'name' => 'Sally']);
        $this->json('DELETE', '/fahrer/5')
            ->seeJsonEquals([
                "msg" => "ok", 'id' => []
            ]);
    }
}
