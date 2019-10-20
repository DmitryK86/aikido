<?php

use yii\db\Migration;

/**
 * Class m191020_164420_alter_events_add_place
 */
class m191020_164420_alter_events_add_place extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('events', 'place', $this->string()->notNull());
        $this->addColumn('events', 'period', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('events', 'place');
       $this->dropColumn('events', 'period');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191020_164420_alter_events_add_place cannot be reverted.\n";

        return false;
    }
    */
}
