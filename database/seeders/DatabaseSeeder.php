<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\User;
use App\Models\Device;
use App\Models\Status;
use App\Models\Usage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userNames = ['Пётр', 'Анна', 'Стилгар', 'Кайнс', 'Пол', 'Джессика', 'Владимир'];
        $userEmails = ['peter@mail.ru', 'ana@mail.ru', 'tabr@mail.ru', 'layet@mail.ru', 'muaddib@mail.ru', 'bene@mail.ru', 'harkonnen@mail.ru'];
        $is_admin = [1, 0, 0, 0, 0, 0, 0];
        $password = Hash::make('users');
        for ($i = 0; $i < count($userNames); $i++){
            User::create([
                'name' => $userNames[$i],
                'email' => $userEmails[$i],
                'is_admin' => $is_admin[$i],
                'password' => $password
            ]);
        }
        
        $categoryNames = ['Транспортные средства', 'Землеройная техника', 'Грузоподъёмные машины',
        'Дорожно-строительная техника', 'Вспомогательные машины'];
        for ($i = 0; $i < count($categoryNames); $i++){
            Category::create([
                'name' => $categoryNames[$i]
            ]);
        }

        $statusNames = ['На рассмотрении', 'В эксплуатации', 'Возвращено', 'Отказано'];
        for ($i = 0; $i < count($statusNames); $i++){
            Status::create([
                'name' => $statusNames[$i]
            ]);
        }

        $deviceNames = ['Бетономешалка STEHER 200 л', 'Коленчатый подъемник Haulotte HA15 IP',
        'Самосвал Shacman F2000 6х4 SX3258DR384', 'ЭКСКАВАТОР ГУСЕНИЧНЫЙ LGCE (SDLG) E6250F',
        'Укладчик обочин Стакер', 'Бульдозер Zoomlion ZD160-3'];
        $categories_id = [5, 3, 1, 2, 4, 4];
        $descriptions = ['Объем смесителя 200 л, Объем готового раствора 120 л, Принцип действия гравитационный, Мощность 1 кВт',
        'Рабочая высота 15 м, Горизонтальный вылет 8,5 м, Грузоподъемность 230 кг, Размеры платформы 1,2 x 0,8 м',
        'Колесная формула 6х4, Мощность двигателя 336 л.с, Кабина F2000, Модель автомобиля SX3258DR384',
        'Эксплуатационная масса 24400 кг, Объем ковша 1,4 м³, Максимальная глубина копания 6980 мм, Производитель DEUTZ',
        'Толщина отсыпаемого слоя до 300 мм
        Ширина приемного бункера 3000 мм
        Ширина отвала планировщика 500, 1000, 1500, 2000 мм
        Подъем/ опускание отвала относительно дорожного полотна ± 300 мм',
        'Количество опорных катков (с каждой стороны): 6.
        Количество башмаков в гусенице (с каждой стороны): 37.
        Количество поддерживающих катков (с каждой стороны): 2.
        Ширина башмака, мм: 510.
        Ширина колеи, мм: 1880.'];
        $numbers = [5, 2, 3, 3, 1, 2];
        $images = ['mixer.jpg', 'lift.jpg', 'truck.jpg', 'excavator.jpeg', 'staker.jpeg', 'bulldozer.jpg'];
        for ($i = 0; $i <  count($deviceNames); $i++){
            Device::create([
                'name' => $deviceNames[$i],
                'categories_id' => $categories_id[$i],
                'description' => $descriptions[$i],
                'number' => $numbers[$i],
                'image' => $images[$i]
            ]);
        }
        
        $users_id = [2, 3, 4, 5, 6, 7];
        $devices_id = [6, 3, 2, 1, 5, 4];
        $number = [2, 2, 1, 4, 1, 2];
        $days = [5, 2, 3, 3, 1, 2];
        for ($i = 0; $i < count($users_id); $i++){
            Usage::create([
                'statuses_id' => 1,
                'users_id' => $users_id[$i],
                'devices_id' => $devices_id[$i],
                'number' => $number[$i],
                'days' => $days[$i]
            ]);
        }
    }
}
