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


        $user = Sentry::createUser(array(
            'first_name'      => 'Gabo',
            'last_name'  => 'Acosta',
            'username'  => 'gabo',
            'password'  => 'asd',
            'email'     => 'gabo.acosta624@gmail.com',
            'activated' => true,
        ));

        $user2 = Sentry::createUser(array(
            'username'  => 'test',
            'password'  => 'test',
            'email'     => 'test@gmail.com',
            'activated' => true,
        ));

        try
        {
            // Create the group
            $admin_group = Sentry::createGroup(array(
                'name'        => 'Admin',
                'permissions' => array(
                    'superuser' => 1
                ),
            ));

            $user->addGroup($admin_group);

            $user_group = Sentry::createGroup(array(
                'name'        => 'User',
                'permissions' => array(
                    'home' => 1,
                    'navbar' => 1,
                    'test' => 0
                ),
            ));

            $user2->addGroup($user_group);
        }
        catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
            echo 'Name field is required';
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            echo 'Group already exists';
        }
    }

}