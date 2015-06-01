<?php
/**
 * Created by PhpStorm.
 * User: takahashi
 * Date: 2015/06/01
 * Time: 11:15
 */

namespace App\http\controller;


class GameControllerTest extends \TestCase {
    /**
     * 基本的な機能テストの例
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('game/create', 1);
        $content = $response->getContent();
        echo($content);
        /*
        $this->assertEquals(200, $response->getStatusCode());

        $user = DB::table('users')->where('id', 1)->first();
        $this->assertEquals('abc', $user->name);

        $user = DB::table('users')->where('id', 2)->first();
        $this->assertEquals('def', $user->name);
        */
    }


}
