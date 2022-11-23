<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users')
                ->addColumn('name', 'string', ['default' => null,'limit' => 255,'null' => false,])
                ->addColumn('email', 'string', ['default' => null,'limit' => 255,'null' => false,])
                ->addColumn('password', 'string', ['default' => null,'limit' => 255,'null' => false,])
                ->addTimeStamps()

                ->addIndex('email', ['unique'=>true])

            ->create();

        $table = $this->table('times')
                ->addColumn('category', 'string', ['default' => null,'limit' => 255,'null' => false,])
                ->addColumn('start_time', 'datetime', ['default' => null,'null' => false,])
                ->addColumn('finish_time', 'datetime', ['default' => null,'null' => false,])
                ->addColumn('user_id', 'integer', ['default' => null,'null' => false,])
                ->addForeignKey(
                    'user_id',
                    'users',
                    'id',
                    //外部キーオプション["RESTRICT","CASCADE","SET NULL","NO ACTIONの違い
                    //https://qiita.com/suin/items/21fe6c5a78c1505b19cb
                    //この場合,CASCADE? 参照元(users)の変更に依存する。DELETEの時に削除される
                    ['delete' => 'CASCADE']
                )
                ->addTimeStamps()

            ->create();
    }

    public function down()
    {
        //rollbackするとエラー
        //[Error] Call to a member function save() on null in /var/www/config/Migrations/20220913020022_Initial.php on line 43
        $this->table('users')->drop()->save();

        $this->table('times')->drop()->save();
    }
}
