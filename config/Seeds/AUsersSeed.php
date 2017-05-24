<?php
use Migrations\AbstractSeed;

class AUsersSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'username' => 'Admin',
                'password' => (new \Cake\Auth\DefaultPasswordHasher())->hash('admin')
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
