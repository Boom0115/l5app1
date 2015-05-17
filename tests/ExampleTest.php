<?php

class ExampleTest extends TestCase {

    /**
     * setup
     */
    public function setUp()
    {
        parent::setup();

        Artisan::call('migrate');
        $this->seed('ExampleSeeder');
    }

    /**
     * 基本的な機能テストの例
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());

        $user = DB::table('users')->where('id', 1)->first();
        $this->assertEquals('abc', $user->name);

        $user = DB::table('users')->where('id', 2)->first();
        $this->assertEquals('def', $user->name);
    }

}

class ExampleSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::statement('TRUNCATE users');
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'abc',
                'email' => 'abc@example.com',
                'password' => 'password',
            ],
            [
                'id' => 2,
                'name' => 'def',
                'email' => 'def@example.com',
                'password' => 'password2',
            ],
        ]);
    }
}
