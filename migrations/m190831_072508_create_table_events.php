<?php

use yii\db\Migration;

/**
 * Class m190831_072508_create_table_events
 */
class m190831_072508_create_table_events extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('events', [
            'id' => 'pk',
            'slug' => 'VARCHAR(255) NOT NULL UNIQUE',
            'title' => 'VARCHAR(255) NOT NULL',
            'description' => 'TEXT',
            'date' => 'DATETIME NOT NULL',
            'enabled' => 'BOOLEAN DEFAULT FALSE',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('events');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190831_072508_create_table_events cannot be reverted.\n";

        return false;
    }
    */
}
