<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $users = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'usertype' => 1,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Doctor One',
                'email' => 'doctor@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'User One',
                'email' => 'user@user.com',
                'password' => Hash::make('user'),
                'usertype' => 0,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Doctor Two',
                'email' => 'doctor2@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Doctor Three',
                'email' => 'doctor3@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);

        // Fetch the data of 'user@user.com'
        $customer = User::where('email', 'user@user.com')->first();

        DB::table('customers')->delete();

        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => '09123456789',
                'address' => 'Rizal Ave Ext, Grace Park East, Caloocan',
                'user_id' => $customer->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        DB::table('doctors')->delete();

        // Fetch the data of 'doctor@doctor.com'
        $doctor = User::where('email', 'doctor@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 1,
                'name' => $doctor->name,
                'phone' => '09123456789',
                'specialization_id' => 1,
                'room' => '101',
                'user_id' => $doctor->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Fetch the data of 'doctor@doctor.com'
        $doctor2 = User::where('email', 'doctor2@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 2,
                'name' => $doctor2->name,
                'phone' => '09123456789',
                'specialization_id' => 2,
                'room' => '102',
                'user_id' => $doctor2->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Fetch the data of 'doctor@doctor.com'
        $doctor3 = User::where('email', 'doctor3@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 3,
                'name' => $doctor3->name,
                'phone' => '09123456789',
                'specialization_id' => 3,
                'room' => '103',
                'user_id' => $doctor3->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::table('barangays')->insert([
            [
                'id' => 1,
                'barangay_id' => 'BP-0001',

                'name' => 'Mike Cruz',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'barangay_id' => 'BP-0002',
                'name' => 'Jay Lingo',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'barangay_id' => 'BP-0003',
                'name' => 'Arwin Santos',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'barangay_id' => 'BP-0004',
                'name' => 'Michael Panganiban',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'barangay_id' => 'BP-0005',
                'name' => 'Stephen Manalastas',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'barangay_id' => 'BP-0006',
                'name' => 'Bolumino Maguid',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'barangay_id' => 'BP-0007',

                'name' => 'Vindag Liwanag',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'barangay_id' => 'BP-0008',

                'name' => 'Meya Nawita',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'barangay_id' => 'BP-0009',

                'name' => 'Janine Pawinag',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'barangay_id' => 'BP-0010',

                'name' => 'Allan Tenorio',
                'is_active' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
