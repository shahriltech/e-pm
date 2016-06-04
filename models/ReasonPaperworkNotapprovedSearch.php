<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReasonPaperworkNotapproved;

/**
 * ReasonPaperworkNotapprovedSearch represents the model behind the search form about `app\models\ReasonPaperworkNotapproved`.
 */
class ReasonPaperworkNotapprovedSearch extends ReasonPaperworkNotapproved
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paperwork_id'], 'integer'],
            [['sebab'], 'safe'],
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
        $query = ReasonPaperworkNotapproved::find();

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
            'paperwork_id' => $this->paperwork_id,
        ]);

        $query->andFilterWhere(['like', 'sebab', $this->sebab]);

        return $dataProvider;
    }
}
