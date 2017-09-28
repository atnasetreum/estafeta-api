<?php

use App\User;
use App\Label;
use App\State;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*Label::truncate();
        factory(Label::class, 5)->create();*/
        User::create(['name'=>'Tecnosinergia', 'email'=>'tecnosinergia@tecnosinergia.com', 'password'=>'$2y$10$QJT5Ah6e13lmorvaFcA2F.UXGDnhP4Ms3EOHf53IwzpGfRdoj8/EO']);
        State::create(['description'=> 'Aguascalientes', 'longitude'=>'21.8852562', 'latitude'=>'-102.29156769999997']);
        State::create(['description'=> 'Baja California', 'longitude'=>'30.8406338', 'latitude'=>'-115.28375849999998']);
        State::create(['description'=> 'Baja California Sur', 'longitude'=>'26.0444446', 'latitude'=>'-111.66607249999998']);
        State::create(['description'=> 'Campeche', 'longitude'=>'18.931225', 'latitude'=>'-90.26180679999999']);
        State::create(['description'=> 'Chiapas', 'longitude'=>'16.7569318', 'latitude'=>'-93.1292353']);
        State::create(['description'=> 'Chihuahua', 'longitude'=>'28.4854458', 'latitude'=>'-105.78206740000002']);
        State::create(['description'=> 'Coahuila', 'longitude'=>'27.058676', 'latitude'=>'-101.7068294']);
        State::create(['description'=> 'Colima', 'longitude'=>'19.2452342', 'latitude'=>'-103.72408680000001']);
        State::create(['description'=> 'Distrito Federal', 'longitude'=>'19.4326077', 'latitude'=>'-99.13320799999997']);
        State::create(['description'=> 'Durango', 'longitude'=>'24.5592665', 'latitude'=>'-104.6587821']);
        State::create(['description'=> 'Estado de México', 'longitude'=>'19.4968732', 'latitude'=>'-99.72326729999997']);
        State::create(['description'=> 'Guanajuato', 'longitude'=>'21.0190145', 'latitude'=>'-101.25735859999998']);
        State::create(['description'=> 'Guerrero', 'longitude'=>'17.4391926', 'latitude'=>'-99.54509739999997']);
        State::create(['description'=> 'Hidalgo', 'longitude'=>'20.0910963', 'latitude'=>'-98.76238739999997']);
        State::create(['description'=> 'Jalisco', 'longitude'=>'20.6595382', 'latitude'=>'-103.34943759999999']);
        State::create(['description'=> 'Michoacán', 'longitude'=>'19.5665192', 'latitude'=>'-101.7068294']);
        State::create(['description'=> 'Morelos', 'longitude'=>'18.6813049', 'latitude'=>'-99.10134979999998']);
        State::create(['description'=> 'Nayarit', 'longitude'=>'21.7513844', 'latitude'=>'-104.84546190000003']);
        State::create(['description'=> 'Nuevo León', 'longitude'=>'25.592172', 'latitude'=>'-99.99619469999999']);
        State::create(['description'=> 'Oaxaca', 'longitude'=>'17.0542297', 'latitude'=>'-96.71323039999999']);
        State::create(['description'=> 'Puebla', 'longitude'=>'19.0412967', 'latitude'=>'-98.20619959999999']);
        State::create(['description'=> 'Querétaro', 'longitude'=>'20.5888184', 'latitude'=>'-100.38988760000001']);
        State::create(['description'=> 'Quintana Roo', 'longitude'=>'19.1817393', 'latitude'=>'-88.4791376']);
        State::create(['description'=> 'San Luis Potosí', 'longitude'=>'22.1564699', 'latitude'=>'-100.98554089999999']);
        State::create(['description'=> 'Sinaloa', 'longitude'=>'25.1721091', 'latitude'=>'-107.4795173']);
        State::create(['description'=> 'Sonora', 'longitude'=>'29.2972247', 'latitude'=>'-110.33088140000001']);
        State::create(['description'=> 'Tabasco', 'longitude'=>'17.8409173', 'latitude'=>'-92.6189273']);
        State::create(['description'=> 'Tamaulipas', 'longitude'=>'24.26694', 'latitude'=>'-98.8362755']);
        State::create(['description'=> 'Tlaxcala', 'longitude'=>'19.318154', 'latitude'=>'-98.2374954']);
        State::create(['description'=> 'Veracruz', 'longitude'=>'19.173773', 'latitude'=>'-96.13422409999998']);
        State::create(['description'=> 'Yucatán', 'longitude'=>'20.7098786', 'latitude'=>'-89.09433769999998']);
        State::create(['description'=> 'Zacatecas', 'longitude'=>'22.7708555', 'latitude'=>'-102.5832426']);
    }
}
