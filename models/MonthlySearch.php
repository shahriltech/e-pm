<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paperwork;

/**
 * PaperworkSearch represents the model behind the search form about `app\models\Paperwork`.
 */
class MonthlySearch extends Paperwork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status_by_su', 'status_by_bendahari', 'status_by_timbalan', 'status_by_nazir'], 'integer'],
            [['nama_program', 'pw_obj', 'pw_background', 'pw_advantage', 'pw_startdate','pw_endDate', 'jangka_masa', 'pw_submit_status'], 'safe'],
            [['pw_budget'], 'number'],
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

       $bulan = date('n');

        $query = Paperwork::find()
                ->where(['MONTH(pw_dateUpdated)'=>$bulan])
                ->andWhere(['status_by_nazir'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => [
                        'id' => SORT_DESC,
                        'pw_startdate'=>SORT_DESC
                    ]
            ]
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
            'pw_budget' => $this->pw_budget,
            'user_id' => $this->user_id,
            'status_by_su' => $this->status_by_su,
            'status_by_bendahari' => $this->status_by_bendahari,
            'status_by_timbalan' => $this->status_by_timbalan,
            'status_by_nazir' => $this->status_by_nazir,
        ]);

        $query->andFilterWhere(['like', 'nama_program', $this->nama_program])
            ->andFilterWhere(['like', 'pw_obj', $this->pw_obj])
            ->andFilterWhere(['like', 'pw_background', $this->pw_background])
            ->andFilterWhere(['like', 'pw_advantage', $this->pw_advantage])
            ->andFilterWhere(['like', 'pw_startdate', $this->pw_startdate])
            ->andFilterWhere(['like', 'jangka_masa', $this->jangka_masa])
            ->andFilterWhere(['like', 'pw_submit_status', $this->pw_submit_status]);

        return $dataProvider;
    }
}
