<?php

use yii\db\Migration;

/**
 * Class m191102_100311_alter_redirect_routs
 */
class m191102_100311_alter_redirect_routs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('to_route', 'redirect_routes');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createIndex('to_route', 'redirect_routes', 'to_route', true);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191102_100311_alter_redirect_routs cannot be reverted.\n";

        return false;
    }
    */
}
