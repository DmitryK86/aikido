<?php

use yii\db\Migration;

/**
 * Class m191103_092652_create_gallery_tables
 */
class m191103_092652_create_gallery_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()')),
            'enabled' => $this->boolean()->defaultValue(true),
        ]);

        $this->createTable('gallery_items', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer()->notNull(),
            'comment' => $this->string(),
            'is_main' => $this->boolean()->defaultValue(false),
        ]);

        $this->addForeignKey(
            'gallery_fk',
            'gallery_items',
            'gallery_id',
            'gallery',
            'id',
            'cascade',
            'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('gallery_items');
        $this->dropTable('gallery');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191103_092652_create_gallery_tables cannot be reverted.\n";

        return false;
    }
    */
}
