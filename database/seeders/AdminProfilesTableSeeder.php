<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_profiles')->delete();
        
        \DB::table('admin_profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'about_user' => 'System super admin',
                'created_by' => NULL,
                'created_at' => '2024-10-07 21:45:33',
                'updated_at' => '2024-10-07 21:45:33',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'about_user' => 'dc f',
                'created_by' => 1,
                'created_at' => '2024-11-16 04:10:32',
                'updated_at' => '2024-11-17 19:16:39',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 10,
                'about_user' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum',
                'created_by' => 1,
                'created_at' => '2024-11-17 18:02:44',
                'updated_at' => '2024-11-17 18:24:25',
            ),
        ));
        
        
    }
}