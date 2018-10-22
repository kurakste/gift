<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Items;

/**
 * ItemsSearch represents the model behind the search form of `common\models\Items`.
 */
class ItemsSearch extends Items
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fcid', 'scid', 'vid', 'lifetime', 'rank', 'phisical'], 'integer'],
            [['exid', 'name', 'cpu', 'short_description', 'description'], 'safe'],
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
        $query = Items::find();

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
            'fcid' => $this->fcid,
            'scid' => $this->scid,
            'vid' => $this->vid,
            'lifetime' => $this->lifetime,
            'rank' => $this->rank,
            'phisical' => $this->phisical,
        ]);

        $query->andFilterWhere(['like', 'exid', $this->exid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'cpu', $this->cpu])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
