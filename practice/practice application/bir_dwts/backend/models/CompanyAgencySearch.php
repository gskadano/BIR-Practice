<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompanyAgency;

/**
 * CompanyAgencySearch represents the model behind the search form about `backend\models\CompanyAgency`.
 */
class CompanyAgencySearch extends CompanyAgency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['create_time', 'update_time', 'company_agency_code', 'company_agency_full_name', 'company_agency_notes'], 'safe'],
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
        $query = CompanyAgency::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'company_agency_code', $this->company_agency_code])
            ->andFilterWhere(['like', 'company_agency_full_name', $this->company_agency_full_name])
            ->andFilterWhere(['like', 'company_agency_notes', $this->company_agency_notes]);

        return $dataProvider;
    }
}
