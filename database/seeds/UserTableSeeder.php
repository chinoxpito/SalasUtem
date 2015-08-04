<?php
use \Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run()
	{
		\DB::table('users')->insert(array(

			'name' => 'Chino',
			'email' => 'chinoxpito@hotmail.com',
			'password' => \Hash::make('secret')

		));
	}

}