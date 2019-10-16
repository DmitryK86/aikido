<?php

use yii\db\Migration;

/**
 * Class m190721_092952_create_table_articles
 */
class m190721_092952_create_table_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dbName = $this->getDbName();
        $this->execute("ALTER DATABASE {$dbName} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        $this->createTable('articles', [
            'id' => 'pk',
            'slug' => 'VARCHAR(255) NOT NULL UNIQUE',
            'title' => 'VARCHAR(255) NOT NULL',
            'subtitle' => 'TEXT',
            'text' => 'TEXT',
            'created_at' => 'DATETIME DEFAULT NOW()',
            'enabled' => 'BOOLEAN DEFAULT FALSE',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('articles');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190721_092952_create_table_articles cannot be reverted.\n";

        return false;
    }
    */

    private function getDbName(){
        if (preg_match('/dbname=([^;]*)/', Yii::$app->db->dsn, $match)) {
            return $match[1];
        } else {
            return null;
        }
    }
}
