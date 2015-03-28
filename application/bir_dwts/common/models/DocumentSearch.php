<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Document;

/**
 * DocumentSearch represents the model behind the search form about `common\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'document_category', 'document_priority_id', 'document_type_id', 'employee_id', 'customer_id', 'company_agency_id', 'section_id'], 'integer'],
            [['document_tracking_number', 'document_name', 'document_description', 'document_target_date', 'document_comment', 'document_image_front_page', 'create_time', 'update_time'], 'safe'],
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
        $query = Document::find();

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
            'document_target_date' => $this->document_target_date,
            'document_category' => $this->document_category,
            'document_priority_id' => $this->document_priority_id,
            'document_type_id' => $this->document_type_id,
            'employee_id' => $this->employee_id,
            'customer_id' => $this->customer_id,
            'company_agency_id' => $this->company_agency_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'section_id' => $this->section_id,
        ]);

        $query->andFilterWhere(['like', 'document_tracking_number', $this->document_tracking_number])
            ->andFilterWhere(['like', 'document_name', $this->document_name])
            ->andFilterWhere(['like', 'document_description', $this->document_description])
            ->andFilterWhere(['like', 'document_comment', $this->document_comment])
            ->andFilterWhere(['like', 'document_image_front_page', $this->document_image_front_page]);

        return $dataProvider;
    }
}
