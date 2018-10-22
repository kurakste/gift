<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Images;

/**
 * ImagesSearch represents the model behind the search form of `common\models\Images`.
 */
class ImagesSearch extends Images
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iid', 'main'], 'integer'],
            [['alt', 'path'], 'safe'],
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
        $query = Images::find();

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
            'main' => $this->main,
        ]);

        $query->andFilterWhere(['like', 'alt', $this->alt])
            ->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
