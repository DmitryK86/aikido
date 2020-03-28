<?php

use yii\db\Migration;

/**
 * Class m180929_183631_add_table_visits
 */
class m200222_183631_add_table_visits extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('visits', [
            'id' => 'pk',
            'date' => 'DATE NOT NULL',
            'visits' => 'INTEGER DEFAULT 1',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('visits');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180929_183631_add_table_visits cannot be reverted.\n";

        return false;
    }
    */
}
