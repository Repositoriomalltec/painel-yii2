<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cidade".
 *
 * @property string $cidd_codi
 * @property string $cidd_uf
 * @property string $cidd_nome
 * @property string $cidd_noac
 * @property integer $cidd_capi
 * @property string $cidd_pais
 *
 * @property Uf $ciddUf
 */
class CidadeModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cidade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cidd_uf', 'cidd_nome', 'cidd_noac'], 'required'],
            [['cidd_capi'], 'integer'],
            [['cidd_uf'], 'string', 'max' => 2],
            [['cidd_nome', 'cidd_noac'], 'string', 'max' => 40],
            [['cidd_pais'], 'string', 'max' => 3],
            [['cidd_uf'], 'exist', 'skipOnError' => true, 'targetClass' => Uf::className(), 'targetAttribute' => ['cidd_uf' => 'uf_codi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cidd_codi' => 'Cidd Codi',
            'cidd_uf' => 'Cidd Uf',
            'cidd_nome' => 'Cidd Nome',
            'cidd_noac' => 'Cidd Noac',
            'cidd_capi' => 'Cidd Capi',
            'cidd_pais' => 'Cidd Pais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiddUf()
    {
        return $this->hasOne(Uf::className(), ['uf_codi' => 'cidd_uf']);
    }
}
