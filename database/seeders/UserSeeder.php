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
                'id' => 4,
                'name' => 'Doctor Three',
                'email' => 'doctor3@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Doctor Four',
                'email' => 'doctor4@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'Doctor Five',
                'email' => 'doctor5@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'Doctor Six',
                'email' => 'doctor6@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'Doctor Seven',
                'email' => 'doctor7@doctor.com',
                'password' => Hash::make('doctor'),
                'usertype' => 2,
                'email_verified_at' => Carbon::now(),
                'remember_token' => 'KYWAcwx73s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'Doctor Eight',
                'email' => 'doctor8@doctor.com',
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
        $doctor4 = User::where('email', 'doctor4@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 4,
                'name' => $doctor4->name,
                'phone' => '09123456789',
                'specialization_id' => 4,
                'room' => '104',
                'user_id' => $doctor4->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        $doctor5 = User::where('email', 'doctor5@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 5,
                'name' => $doctor5->name,
                'phone' => '09123456789',
                'specialization_id' => 5,
                'room' => '105',
                'user_id' => $doctor5->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        $doctor6 = User::where('email', 'doctor6@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 6,
                'name' => $doctor6->name,
                'phone' => '09123456789',
                'specialization_id' => 6,
                'room' => '106',
                'user_id' => $doctor6->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        $doctor7 = User::where('email', 'doctor7@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 7,
                'name' => $doctor7->name,
                'phone' => '09123456789',
                'specialization_id' => 7,
                'room' => '107',
                'user_id' => $doctor7->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        $doctor8 = User::where('email', 'doctor8@doctor.com')->first();

        DB::table('doctors')->insert([
            [
                'id' => 8,
                'name' => $doctor8->name,
                'phone' => '09123456789',
                'specialization_id' => 8,
                'room' => '108',
                'user_id' => $doctor8->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
        DB::table('barangays')->delete();
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
