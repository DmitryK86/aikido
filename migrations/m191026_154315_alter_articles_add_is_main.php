<?php

use yii\db\Migration;

/**
 * Class m191026_154315_alter_articles_add_is_main
 */
class m191026_154315_alter_articles_add_is_main extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('articles', 'is_main', 'BOOLEAN DEFAULT FALSE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('articles', 'is_main');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191026_154315_alter_articles_add_is_main cannot be reverted.\n";

        return false;
    }
    */
}
