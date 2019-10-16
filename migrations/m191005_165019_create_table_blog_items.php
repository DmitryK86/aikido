<?php

use yii\db\Migration;

/**
 * Class m191005_165019_create_table_blog_items
 */
class m191005_165019_create_table_blog_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog_items', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->dateTime(),
            'enabled' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('blog_items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191005_165019_create_table_blog_items cannot be reverted.\n";

        return false;
    }
    */
}
