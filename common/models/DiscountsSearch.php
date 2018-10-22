<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Discounts;

/**
 * DiscountsSearch represents the model behind the search form of `common\models\Discounts`.
 */
class DiscountsSearch extends Discounts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iid'], 'integer'],
            [['discount'], 'number'],
            [['description', 'created_at', 'start_at', 'stop_at'], 'safe'],
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
        $query = Discounts::find();

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
            'discount' => $this->discount,
            'created_at' => $this->created_at,
            'start_at' => $this->start_at,
            'stop_at' => $this->stop_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
