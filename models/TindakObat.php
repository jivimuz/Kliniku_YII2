<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindak_obat".
 *
 * @property int $id_tindakan_pengobatan
 * @property int $id_pengobatan
 * @property int $id_tindakan
 */
class TindakObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindak_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengobatan', 'id_tindakan'], 'required'],
            [['id_pengobatan', 'id_tindakan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tindak_obat' => 'Id Tindakan Pengobatan',
            'id_pengobatan' => '',
            'id_tindakan' => 'Id Tindakan',
        ];
    }

    public function getPengobatan()
    {
        return $this->hasOne(Pengobatan::class, ['id_pengobatan' => 'id_pengobatan']);
    }

    public function getTindakan()
    {
        return $this->hasMany(Tindakan::class, ['id_tindakan' => 'id_tindakan']);
    }
}
