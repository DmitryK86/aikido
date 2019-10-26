<?php

use yii\db\Migration;

/**
 * Class m191026_151446_alter_articles_add_published_at
 */
class m191026_151446_alter_articles_add_published_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('articles', 'published_at', 'DATETIME');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('articles', 'published_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191026_151446_alter_articles_add_published_at cannot be reverted.\n";

        return false;
    }
    */
}
