<?php

use Illuminate\Database\Seeder;
use App\App;
use App\SocialInfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        // $this->call(UsersTableSeeder::class);
        $app = App::firstOrCreate(['name'=>"test_app"]);
        $social = new SocialInfo([
            'client_id'=>'384552515240870',
            'client_secret'=>'4533fadd3dd036f1b694e0df212b15a0',
            'redirect'=>'http://localhost:8000'

        ]);
        $social->app()->associate($app);
        $social->save();
        DB::commit();
    }
}
