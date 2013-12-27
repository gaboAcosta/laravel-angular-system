<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder{

    public function run()
    {
        $user = new User();
        $user->name = "Gabo";
        $user->lastname = "Acosta";
        $user->username = "asd";
        $user->password = Hash::make('asd');
        $user->save();
    }

}