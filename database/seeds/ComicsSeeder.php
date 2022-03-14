<?php

use Illuminate\Database\Seeder;
use App\Comic;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config("comics");


        foreach($comics as $comic){

            $thisComic = new Comic();
            /*
            foreach ($comic as $key=>$value){

                $thisComic->$key = $comic[$key];
            }
            */
            $thisComic->title = $comic['title'];
            $thisComic->description = $comic['description'];
            $thisComic->thumb = $comic['thumb'];
            $thisComic->price = preg_replace('/[^0-9\.]/', '', $comic['price']);
            $thisComic->series = $comic['series'];
            $thisComic->sale_date = $comic['sale_date'];
            $thisComic->type = $comic['type'];

            $thisComic->save();
        }
    }
}
