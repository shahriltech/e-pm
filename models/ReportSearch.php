<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paperwork;
use app\models\StatusPaperwork;
use yii\db\Expression;
/**
 * PaperworkSearch represents the model behind the search form about `app\models\Paperwork`.
 */
class ReportSearch extends Paperwork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status_by_su', 'status_by_bendahari', 'status_by_timbalan', 'status_by_nazir'], 'integer'],
            [['nama_program', 'pw_obj', 'pw_background', 'pw_advantage', 'pw_startdate','pw_endDate', 'jangka_masa', 'pw_submit_status','pw_dateUpdated','pw_monthlyApprove','pw_yearApprove','pw_monthlyApprove'], 'safe'],
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
     // ' not in','attribute'
        $query = Paperwork::find()
            ->where(['status_by_nazir'=> '1']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            '>=','pw_dateUpdated', $this->pw_dateUpdated,
        ]);

        $query->andFilterWhere(['like', 'nama_program', $this->nama_program])
            ->andFilterWhere(['like', 'pw_obj', $this->pw_obj])
            ->andFilterWhere(['like', 'pw_background', $this->pw_background])
            ->andFilterWhere(['like', 'pw_advantage', $this->pw_advantage])
            ->andFilterWhere(['like', 'pw_startdate', $this->pw_startdate])
            ->andFilterWhere(['like', 'pw_endDate', $this->pw_endDate])
            ->andFilterWhere(['like', 'pw_yearApprove', $this->pw_yearApprove])
            ->andFilterWhere(['like', 'pw_monthlyApprove', $this->pw_monthlyApprove]);
           // ->andFilterWhere(['>=', 'pw_dateUpdated', $this->pw_dateUpdated]);
          //  ->andFilterWhere(['>=', 'pw_dateUpdated', $this->pw_dateUpdated]);

       // $query->andFilterWhere(['>=', 'pw_dateUpdated', $this->pw_dateUpdated]);
        return $dataProvider;
    }
}
