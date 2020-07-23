<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $this->call(UsersTableSeeder::class);
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ! add roles.

        $role1 = Role::create(['name' => 'reporter']);
        $role2 = Role::create(['name' => 'firstLineSupport']);
        $role3 = Role::create(['name' => 'technicalLead']);
        $role4 = Role::create(['name' => 'admin']);

        //! create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Bug Reporter',
            'email' => 'bugreporter@mail.com',
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'First Line Support',
            'email' => 'firstlinesupport@mail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Technical Lead',
            'email' => 'technicallead@mail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($role3);

        $user = Factory(App\User::class)->create([
            'name' => 'System Admin',
            'email' => 'sysadmin@mail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($role3);

        // ! adding the applications in the system. 
        $application = Factory(App\Application::class)->create([
            'name'=>'Enterprise Resource Planning.',
            'commencingDate'=>$faker->dateTime($max = 'now', $timezone = null),
            'currentVersion'=>'1',
            'nextUpdate'=> $faker->dateTime($min = 'now', $timezone = null),
        ]);

        $application = Factory(App\Application::class)->create([
            'name'=>'Document Management System.',
            'commencingDate'=>$faker->dateTime($max = 'now', $timezone = null),
            'currentVersion'=>'1',
            'nextUpdate'=> $faker->dateTime($min = 'now', $timezone = null),
        ]);

        $application = Factory(App\Application::class)->create([
            'name'=>'Leave Management System.',
            'commencingDate'=>$faker->dateTime($max = 'now', $timezone = null),
            'currentVersion'=>'1',
            'nextUpdate'=> $faker->dateTime($min = 'now', $timezone = null),
        ]);
    }
}
