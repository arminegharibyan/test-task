<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property string|null $logo
 * @property string $title
 * @property string $string
 * @property string $updated_at
 * @property string $created_at
 */
class Teams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teams';
    }

    const ITEMS = [
        'A' => [
            'protection_percent' => 10,
            'attack_point' => 20,
            'life_count' => 30,
            'recover_point' => 5
        ],
        'B' => [
            'protection_percent' => 20,
            'attack_point' => 30,
            'life_count' => 40,
            'recover_point' => 10
        ],
        'C' => [
            'protection_percent' => 30,
            'attack_point' => 40,
            'life_count' => 50,
            'recover_point' => 15
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'string'], 'required'],
            [['string'], 'match', 'pattern' => '/^[ABC]+$/', 'message' => 'You need to set only "A", "B", "C".'],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'string'], 'string', 'max' => 255],
            [['logo'], 'file', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Logo',
            'title' => 'Title',
            'string' => 'String',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
