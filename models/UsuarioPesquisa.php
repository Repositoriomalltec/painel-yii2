<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioModel;

/**
 * UsuarioPesquisa represents the model behind the search form about `app\models\UsuarioModel`.
 */
class UsuarioPesquisa extends UsuarioModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_qt_recuperacao'], 'integer'],
            [['user_nome', 'user_sobrenome', 'user_telefone', 'user_email', 'user_cpf', 'id_cidade', 'id_uf', 'user_imagem', 'user_password', 'user_codigo_recuperacao', 'user_nivel'], 'safe'],
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
        $query = UsuarioModel::find();

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
            'id' => $this->id,
            'user_qt_recuperacao' => $this->user_qt_recuperacao,
        ]);

        $query->andFilterWhere(['like', 'user_nome', $this->user_nome])
            ->andFilterWhere(['like', 'user_sobrenome', $this->user_sobrenome])
            ->andFilterWhere(['like', 'user_telefone', $this->user_telefone])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_cpf', $this->user_cpf])
            ->andFilterWhere(['like', 'id_cidade', $this->id_cidade])
            ->andFilterWhere(['like', 'id_uf', $this->id_uf])
            ->andFilterWhere(['like', 'user_imagem', $this->user_imagem])
            ->andFilterWhere(['like', 'user_password', $this->user_password])
            ->andFilterWhere(['like', 'user_codigo_recuperacao', $this->user_codigo_recuperacao])
            ->andFilterWhere(['like', 'user_nivel', $this->user_nivel]);

        return $dataProvider;
    }
}
