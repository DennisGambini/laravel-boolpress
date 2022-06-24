<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class CreateTags extends Seeder
{
    protected $tags = [
        'I più amati',
        'I più buoni',
        'I più economici',
        'Da servire caldo',
        'Da servire freddo',
        'Festività'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tags as $tag) {
            $newTag = new Tag();

            $newTag->name = $tag;
            $newTag->slug = Str::of($tag)->slug('-');

            $newTag->save();
        }
    }
}
