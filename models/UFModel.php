<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uf".
 *
 * @property string $uf_codi
 * @property string $uf_nome
 * @property string $uf_pais
 * @property string $uf_regi
 * @property double $uf_vsca
 * @property double $uf_vsin
 *
 * @property Cidade[] $cidades
 */
class UFModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uf_codi'], 'required'],
            [['uf_regi'], 'integer'],
            [['uf_vsca', 'uf_vsin'], 'number'],
            [['uf_codi'], 'string', 'max' => 2],
            [['uf_nome'], 'string', 'max' => 40],
            [['uf_pais'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uf_codi' => 'Uf Codi',
            'uf_nome' => 'Uf Nome',
            'uf_pais' => 'Uf Pais',
            'uf_regi' => 'Uf Regi',
            'uf_vsca' => 'Uf Vsca',
            'uf_vsin' => 'Uf Vsin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidades()
    {
        return $this->hasMany(Cidade::className(), ['cidd_uf' => 'uf_codi']);
    }
}
