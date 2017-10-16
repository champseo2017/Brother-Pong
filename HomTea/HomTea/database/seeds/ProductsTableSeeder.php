<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $insert = [
            [
                'category_id' => 1,
                'name' => "Harry Potter and the Philosopher's Stone",
                'description' => "Harry Potter and the Philosopher's Stone is the first novel in the Harry Potter series and J. K. Rowling's debut novel, first published in 1997 by Bloomsbury.",
                'image' => '1492765392.jpg',
                'price' => 6.91,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 2,
                'name' => "Harry Potter and the Chamber of Secrets",
                'description' => "Harry Potter and the Chamber of Secrets is the second novel in the Harry Potter series, written by J. K. Rowling.",
                'image' => '1492765391.jpg',
                'price' => 6.97,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 3,
                'name' => "Harry Potter and the Prisoner of Azkaban",
                'description' => "Harry Potter and the Prisoner of Azkaban is the third novel in the Harry Potter series, written by J. K. Rowling. The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry.",
                'image' => '1492765386.jpg',
                'price' => 6.81,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 1,
                'name' => "Harry Potter and the Goblet of Fire",
                'description' => "Harry Potter and the Goblet of Fire is the fourth novel in the Harry Potter series, written by British author J. K. Rowling.",
                'image' => '1492765385.jpg',
                'price' => 8.19,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 2,
                'name' => "Harry Potter and the Order of the Phoenix",
                'description' => "Harry Potter and the Order of the Phoenix is the fifth novel in the Harry Potter series, written by J. K. Rowling.",
                'image' => '1492765383.jpg',
                'price' => 7.99,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 3,
                'name' => "Harry Potter and the Half-Blood Prince",
                'description' => "Harry Potter and the Half-Blood Prince is the sixth and penultimate novel in the Harry Potter series, written by British author J. K. Rowling.",
                'image' => '1492765382.jpg',
                'price' => 7.96,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'category_id' => 1,
                'name' => "Harry Potter and the Deathly Hallows",
                'description' => "Harry Potter and the Deathly Hallows is the seventh and final novel of the Harry Potter series, written by British author J. K. Rowling.",
                'image' => '1492765380.jpg',
                'price' => 9.13,
                'recommended' => 'No',
                'new' => 'No',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];
        DB::table('products')->insert($insert);
    }
}
