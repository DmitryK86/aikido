<?php

use yii\db\Migration;

/**
 * Class m191005_085711_create_table_images
 */
class m191005_085711_create_table_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'model_id' => $this->integer()->notNull(),
            'model_schema' => $this->string()->notNull(),
            'filename' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('images');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191005_085711_create_table_images cannot be reverted.\n";

        return false;
    }
    */
}
