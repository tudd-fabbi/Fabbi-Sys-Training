<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Phan Vinh Khanh',
                'email' => 'Khanh161297@gmail.com',
                'password' => Hash::make('16121997'),
                'phone' => '0382877861',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 2,
                'name' => 'Phan Vinh Tung',
                'email' => 'Tung1993@gmail.com',
                'password' => bcrypt(123456),
                'phone' => '0382877862',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 3,
                'name' => 'Phan Thi Phuong',
                'email' => 'Phuong1992@gmail.com',
                'password' => bcrypt(1992),
                'phone' => '0382877863',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 4,
                'name' => 'Phan Vinh Anh',
                'email' => 'Anh1987@gmail.com',
                'password' => bcrypt(1987),
                'phone' => '0382877864',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 5,
                'name' => 'Phan Thi Thanh Nga',
                'email' => 'Nga1989@gmail.com',
                'password' => bcrypt(1989),
                'phone' => '0382877865',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 6,
                'name' => 'Phan Thi Ngoc Binh',
                'email' => 'Binh1986@gmail.com',
                'password' => bcrypt(1986),
                'phone' => '0382877866',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 7,
                'name' => 'Phan Thi Quynh Trang',
                'email' => 'Trang1994@gmail.com',
                'password' => bcrypt(1994),
                'phone' => '0382877867',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
            [
                'id' => 8,
                'name' => 'Phan Thi Quynh Nhu',
                'email' => 'Nhu1998@gmail.com',
                'password' => bcrypt(1998),
                'phone' => '0382877868',
                'address' => 'Ha Tinh',
                'birthday'=>'1997-12-16'
            ],
        ]);
    }
}
