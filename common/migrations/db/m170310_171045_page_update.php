<?php

use yii\db\Migration;

class m170310_171045_page_update extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%page}}', 'view', 'anons');

    }

    public function down()
    {
        $this->renameColumn('{{%page}}', 'anons', 'view');
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
