<?php

namespace backend\modules\Modulusreg\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Default model for the `Modulusreg` module
 */
class Modulusreg extends ActiveRecord {
 
    public static function tableName() {
        return 'YOUR-TABLE-NAME';
    }

    public function rules() {
        return [
            [['id'], 'integer'],
            [['source'], 'string', 'max' => 255],
            [['randomDate'], 'date', 'format' => 'yyyy-MM-dd'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'source' => Yii::t('app', 'Forrás'),
            'randomDate' => Yii::t('app', 'Véletlenszerű dátum'),
        ];
    }
}
