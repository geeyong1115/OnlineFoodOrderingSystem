<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodBeveragesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_beverages')->insert([
            'name' => 'Devilled Spring Chicken',
            'desc' => 'Roasted spring chicken served with French fries, vegetable, mashed potatoes and devilled sauce.',
            'price' => '24.50',
            'instock_qty' => '10',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Salted Caramel Cookie Skillet',
            'desc' => 'A warm salted caramel cookie with pieces of white chocolate, almond toffee and pretzels, toasted in a skillet.',
            'price' => '9.50',
            'instock_qty' => '20',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Glazed Lamb Chops',
            'desc' => 'Slow cooked lamb chops marinated with garlic and paprika with balsamic vinegar reduction.',
            'price' => '35.00',
            'instock_qty' => '15',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Hummus Mezze',
            'desc' => 'An assortment of 4 hummus plates: plain, with avocado, with paprika and with truffle oil.',
            'price' => '25.00',
            'instock_qty' => '10',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Creamy Wild Mushroom Soup',
            'desc' => 'Fresh Puree of mixed mushroom soup in cream served with crouton (served with bun and butter).',
            'price' => '6.00',
            'instock_qty' => '20',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Cream of Tomato Soup',
            'desc' => 'Fresh puree of tomato in cream served with garlic crouton (served with bun and butter).',
            'price' => '6.00',
            'instock_qty' => '20',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
        
        DB::table('food_beverages')->insert([
            'name' => 'Kookaburra Wings',
            'desc' => 'Chicken wings tossed in our secret spices served with our Blue Cheese dressing and celery. ',
            'price' => '24.50',
            'instock_qty' => '10',
            'status' => 'Available',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
    }
}