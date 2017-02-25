<?php
/**
 * Hauptverantwortlich: Alice Domandl
 */

use App\Strecke;
use App\Statistik;

/**
 * Created by PhpStorm.
 * User: Alice
 * Date: 01.02.2017
 * Time: 17:30
 */
class MainControllerTest extends TestCase
{

    public function testURL()
    {
        $response = $this->call('GET', 'central');
        $this->assertTrue($response->isOk());
    }

    public function testSetAbschnitt()
    {
        $result = $this->json('GET', '/fahrrad/1/fahrer/2', ['fahrrad_id' => '1', 'fahrer_id' => '2']);
        $this->assertNotEmpty($result->decodeResponseJson());
    }

    public function testStrecke()
    {
        $result = $this->json('GET', '/strecke/2');
        $this->seeJsonEquals($result->decodeResponseJson());
    }

    public function testStrecken()
    {
        $this->json('GET', '/strecke')
        ->seeJsonEquals([
            Strecke::whereId(1)->first(), Strecke::whereId(2)->first(), Strecke::whereId(3)->first(), Strecke::whereId(4)->first(), Strecke::whereId(5)->first()
        ]);
    }

    public function testFahrerStrecke()
    {
        $this->json('GET', '/fahrrad/1/fahrer/2', ['fahrrad_id' => '1', 'fahrer_id' => '2']);
        $this->json('PUT', 'fahrrad/1', ['modus_id' => '1', 'fahrer_id]' => '2']);
        $result = $this->json('GET', 'fahrerstrecke');
        $this->seeJsonEquals($result->decodeResponseJson());
        $this->assertResponseOk();
        $this->assertResponseStatus(200);
    }

    public function testLeistung()
    {
        $this->json('GET', '/fahrrad/1/fahrer/2', ['fahrrad_id' => '1', 'fahrer_id' => '2']);
        $this->json('PUT', 'fahrrad/1', ['modus_id' => '1', 'fahrer_id]' => '2']);
        $result = $this->json('GET', 'leistung');
        $this->seeJsonEquals($result->decodeResponseJson());
        $this->assertResponseOk();
        $this->assertResponseStatus(200);
    }

    public function testStatistik()
    {
        $result = $this->json('GET', 'statistik');
        $this->seeJsonEquals($result->decodeResponseJson());
        $this->assertResponseOk();
        $this->assertResponseStatus(200);
    }

//    public function testStatistikUpdate()
//    {
//        $this->json('GET', '/fahrrad/1/fahrer/2', ['fahrrad_id' => '1', 'fahrer_id' => '2']);
//        Statistik::create(['id' => '1', 'fahrer_id' => '1', 'modus_id' => '1', 'vorgang' => '2']);
//        $this->json('GET', '/fahrrad/2/fahrer/3', ['fahrrad_id' => '2', 'fahrer_id' => '3']);
//        $this->json('GET', '/fahrrad/3/fahrer/1', ['fahrrad_id' => '3', 'fahrer_id' => '1']);
//        $this->json('GET', 'statistikupdate');
//        $this->seeInDatabase('statistik', ['fahrer_id' => '1']);
//    }

    public function testBatterie()
    {
        $result = $this->json('GET', 'batterie');
        $this->seeJsonEquals($result->decodeResponseJson());
        $this->assertResponseOk();
        $this->assertResponseStatus(200);
    }
}
