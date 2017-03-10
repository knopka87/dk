<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $body
 * @property string $view
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Page extends ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true,
                'immutable' => true
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body', 'picture_src', 'keywords'], 'string'],
            [['status', 'clinic_id'], 'integer'],
            [['slug'], 'unique'],
            [['slug', 'picture_src'], 'string', 'max' => 2048],
            [['title'], 'string', 'max' => 512],
            [['view'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 200],
            [['published_at'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'title' => Yii::t('common', 'Title'),
            'body' => Yii::t('common', 'Body'),
            'view' => Yii::t('common', 'Page View'),
            'picture_src' => Yii::t('common', 'Picture Path'),
            'clinic_id' => Yii::t('common', 'Clinic'),
            'view_info_clinic' => Yii::t('common', 'View Info Clinic'),
            'keywords' => Yii::t('common', 'Keywords'),
            'description' => Yii::t('common', 'Description'),
            'status' => Yii::t('common', 'Active'),
            'published_at' => Yii::t('common', 'Published At'),
            'expiries' => Yii::t('common', 'Expiries'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
