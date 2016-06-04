<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paperwork;

/**
 * PaperworkSearch represents the model behind the search form about `app\models\Paperwork`.
 */
class ListSearch extends Paperwork
{
    /**
     * @inheritdoc
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'user_id', 'status_by_su', 'status_by_bendahari', 'status_by_timbalan', 'status_by_nazir'], 'integer'],
            [['nama_program','globalSearch', 'pw_obj', 'pw_background', 'pw_advantage', 'pw_startdate','pw_endDate', 'jangka_masa', 'pw_submit_status','pw_dateUpdated','pw_monthlyApprove','pw_yearApprove','pw_monthlyApprove','pw_norujukan'], 'safe'],
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
        $query = Paperwork::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        $query->orFilterWhere(['like', 'nama_program', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_norujukan', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_obj', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_background', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_advantage', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_startdate', $this->globalSearch])
            ->orFilterWhere(['like', 'jangka_masa', $this->globalSearch])
            ->orFilterWhere(['like', 'pw_submit_status', $this->globalSearch]);

        return $dataProvider;
    }
}
