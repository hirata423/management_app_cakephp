<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', ['default' => null,'limit' => 255,'null' => false,]);
        $table->addColumn('email', 'string', ['default' => null,'limit' => 255,'null' => false,]);
        $table->addColumn('password', 'string', ['default' => null,'limit' => 255,'null' => false,]);
        $table->addTimeStamps();

        $table->addIndex('email', ['unique'=>true]);

        $table->create();

        $table = $this->table('times');
        $table->addColumn('category', 'string', ['default' => null,'limit' => 255,'null' => false,]);
        $table->addColumn('start_time', 'datetime', ['default' => null,'null' => false,]);
        $table->addColumn('finish_time', 'datetime', ['default' => null,'null' => false,]);
        $table->addColumn('user_id', 'integer', ['default' => null,'limit' => 255,'null' => false,]);
        $table->addTimeStamps();

        $table->addForeignKey(
            'user_id',
            'users',
            'id',
            ['delete' => 'RESTRICT']
        );
        $table->create();
    }

    public function down()
    {
        $this->table('users')->drop->save();

        $this->table('times')->drop->save();
    }
}
