<?php
use Migrations\AbstractSeed;

class ACategoriesSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'Catégorie #1',
                'slug' => 'category-1',
                'post_count' => 5
            ],
            [
                'name' => 'Catégorie #2',
                'slug' => 'category-2',
                'post_count' => 2
            ],
            [
                'name' => 'Catégorie #3',
                'slug' => 'category-3',
                'post_count' => 1
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
