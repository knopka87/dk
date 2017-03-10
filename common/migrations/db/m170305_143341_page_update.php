<?php

use yii\db\Migration;

class m170305_143341_page_update extends Migration
{
    public function up()
    {
        $this->addCommentOnColumn('{{%page}}', 'title', 'Заголовок');
	    $this->addCommentOnColumn('{{%page}}', 'body', 'Содержимое');
	    $this->addCommentOnColumn('{{%page}}', 'view', 'Анонс');
	    $this->addColumn('{{%page}}', 'picture_src', $this->string()->comment('Изображение для анонса')->after('view'));
	    $this->addColumn('{{%page}}', 'clinic_id', $this->integer()->comment('Принадлежность МЦ')->after('picture_src'));
	    $this->addColumn('{{%page}}', 'view_info_clinic', $this->integer(2)->comment('Отображать блок о клинике')->after('clinic_id'));
	    $this->addColumn('{{%page}}', 'keywords', $this->string()->comment('Ключевые слова (через запятую)')->after('view_info_clinic'));
	    $this->addColumn('{{%page}}', 'description', $this->string(200)->comment('Описание (максимум 200 символов)')->after('keywords'));
	    $this->addColumn('{{%page}}', 'published_at', $this->integer()->comment('Дата публикации')->after('status'));
	    $this->addColumn('{{%page}}', 'expiries', $this->integer()->comment('Снятие с публикации')->after('published_at'));

    }

    public function down()
    {

	    $this->dropCommentFromColumn('{{%page}}', 'title');
	    $this->dropCommentFromColumn('{{%page}}', 'body');
	    $this->dropCommentFromColumn('{{%page}}', 'view');
	    $this->dropColumn('{{%page}}', 'picture_src');
	    $this->dropColumn('{{%page}}', 'clinic_id');
	    $this->dropColumn('{{%page}}', 'view_info_clinic');
	    $this->dropColumn('{{%page}}', 'keywords');
	    $this->dropColumn('{{%page}}', 'description');
	    $this->dropColumn('{{%page}}', 'published_at');
	    $this->dropColumn('{{%page}}', 'expiries');

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
