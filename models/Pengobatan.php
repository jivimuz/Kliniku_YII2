<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "pengobatan".
 *
 * @property int $id_pengobatan
 * @property int $id_obat
 * @property int $id_pasien
 */
class Pengobatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengobatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_obat','jml_obat', 'id_pemeriksaan'], 'required'],
            [['id_obat','jml_obat', 'id_pengobatan', 'id_pemeriksaan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengobatan' => 'Id Pengobatan',
            'id_obat' => 'Id Obat',
            'jml_obat' => 'Jumlah Obat',
            'id_pengobatan' => 'Id Pengobatan',
            'id_pemeriksaan' => 'Id Pemeriksaan',
        ];
    }
    public function getObat()
    {
        return $this->hasOne(Obat::className(), ['id_obat' => 'id_obat']);
    }
    public function getPemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class, ['id_pemeriksaan' => 'id_pemeriksaan']);
    }
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id_tindakan' => 'id_tindakan']);
    }
}
