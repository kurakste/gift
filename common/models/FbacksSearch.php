<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fbacks;

/**
 * FbacksSearch represents the model behind the search form of `common\models\Fbacks`.
 */
class FbacksSearch extends Fbacks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iid', 'oid', 'rating'], 'integer'],
            [['name', 'image', 'date', 'fbacks'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Fbacks::find();

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
            'iid' => $this->iid,
            'oid' => $this->oid,
            'date' => $this->date,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'fbacks', $this->fbacks]);

        return $dataProvider;
    }
}
