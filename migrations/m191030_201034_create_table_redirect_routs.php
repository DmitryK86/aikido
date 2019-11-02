<?php

use yii\db\Migration;

/**
 * Class m191030_201034_create_table_redirect_routs
 */
class m191030_201034_create_table_redirect_routs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('redirect_routes', [
            'id' => $this->primaryKey(),
            'from_route' => $this->string()->notNull()->unique(),
            'to_route' => $this->string()->notNull()->unique(),
            'enabled' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('redirect_routes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191030_201034_create_table_redirect_routs cannot be reverted.\n";

        return false;
    }
    */
}
