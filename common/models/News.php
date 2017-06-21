<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "news".
 *
 * @property integer $clinic_id
 * @property integer $published_at
 */
class News extends Page
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

	/**
     * @inheritdoc
     */
    public function rules()
    {

        $parentRules = parent::rules();
        $rules = [

            [['clinic_id'], 'integer'],
            [['published_at'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
        ];

	    return array_merge($parentRules, $rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	    $parentLabels = parent::attributeLabels();
        $labels = [
            'clinic_id' => Yii::t('common', 'Clinic'),
            'view_info_clinic' => Yii::t('backend', 'View Info Clinic'),
            'published_at' => Yii::t('common', 'Published At'),
            'expiries' => Yii::t('common', 'Expiries'),
        ];

	    return array_merge($parentLabels, $labels);
    }
}
