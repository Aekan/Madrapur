<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\Issuerequest\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "modulusissuerequest".
 *
 * @property integer $id
 * @property string $content
 * @property string $image
 * @property string $priority
 * @property string $status
 * @property integer $assignedUser
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $aliasModel
 */
abstract class Issuerequest extends \backend\modules\MadActiveRecord\models\MadActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modulusIssuerequest';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'createdBy',
                'updatedByAttribute' => 'updatedBy',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'image', 'priority', 'status'], 'string'],
            [['assignedUser'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'content' => Yii::t('backend', 'Content'),
            'image' => Yii::t('backend', 'Image'),
            'priority' => Yii::t('backend', 'Priority'),
            'status' => Yii::t('backend', 'Status'),
            'assignedUser' => Yii::t('backend', 'Assigned User'),
            'createdAt' => Yii::t('backend', 'Created At'),
            'updatedAt' => Yii::t('backend', 'Updated At'),
            'createdBy' => Yii::t('backend', 'Created By'),
            'updatedBy' => Yii::t('backend', 'Updated By'),
        ];
    }




}
