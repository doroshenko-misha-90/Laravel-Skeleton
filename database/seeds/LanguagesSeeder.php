<?php

class LanguagesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable(
            'languages',
            [
                [
                    'title' => 'Русский',
                    'slug' => 'ru',
                    'is_default' => '1'
                ],
                [
                    'title' => 'English',
                    'slug' => 'en',
                    'is_default' => '0'
                ],
                [
                    'title' => 'Українська',
                    'slug' => 'uk',
                    'is_default' => '0'
                ]
            ]
        );
    }
}
