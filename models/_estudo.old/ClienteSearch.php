<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtb_cliente'], 'integer'],
            [['nome_completo', 'razao_social', 'CPF', 'CNPJ'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cliente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idtb_cliente' => $this->idtb_cliente,
        ]);

        $query->andFilterWhere(['like', 'nome_completo', $this->nome_completo])
            ->andFilterWhere(['like', 'razao_social', $this->razao_social])
            ->andFilterWhere(['like', 'CPF', $this->CPF])
            ->andFilterWhere(['like', 'CNPJ', $this->CNPJ]);

        return $dataProvider;
    }
}