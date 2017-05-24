<?php
use Migrations\AbstractMigration;

class CreateComments extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('comments');
        $table->addColumn('username', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('mail', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('content', 'text', [
            'null' => false,
        ]);
        $table->addColumn('post_id', 'integer', [
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
