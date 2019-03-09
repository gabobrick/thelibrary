<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Book;

use Faker\Factory as Faker;

class BookSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Book::class, 200)->create();
        $faker = Faker::create();
        
        foreach(range(1, 200) as $x)
        {
        	$book = Book::create([
        		'name' => $faker->name,
        		'author' => $faker->name,
        		'publishedDate' => $faker->date,
        	]);

        	foreach(range(1, mt_rand(2, 4)) as $y)
        	{
        		$book->categories()->attach(Category::all()->random()->id);
        	}
        }
    }
}
