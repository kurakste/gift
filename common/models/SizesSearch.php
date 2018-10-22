<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sizes;

/**
 * SizesSearch represents the model behind the search form of `common\models\Sizes`.
 */
class SizesSearch extends Sizes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iid'], 'integer'],
            [['description'], 'safe'],
            [['weigth', 'width', 'height', 'length'], 'number'],
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
        $query = Sizes::find();

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
            'weigth' => $this->weigth,
            'width' => $this->width,
            'height' => $this->height,
            'length' => $this->length,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
