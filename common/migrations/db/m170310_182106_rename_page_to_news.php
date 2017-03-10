<?php

use yii\db\Migration;

class m170310_182106_rename_page_to_news extends Migration
{
    public function up()
    {
        $this->renameTable('{{%page}}', '{{%news}}');
    }

    public function down()
    {
        $this->renameTable('{{%news}}', '{{%page}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
