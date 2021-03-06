<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `common\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['current_position','user_id','section_id','employee_id_number', 'employee_last_name', 'employee_first_name', 'create_time', 'update_time'], 'safe'],
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
        $query = Employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('section');
        $query->joinWith('user');
        $query->joinWith('position');

        $query->andFilterWhere([
            'id' => $this->id,
//            'current_position' => $this->current_position,
//            'section_id' => $this->section_id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
//            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'employee_id_number', $this->employee_id_number])
            ->andFilterWhere(['like', 'employee_last_name', $this->employee_last_name])
            ->andFilterWhere(['like', 'section.section_name', $this->section_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'position.position_name', $this->current_position])
            ->andFilterWhere(['like', 'employee_first_name', $this->employee_first_name]);

        return $dataProvider;
    }
}
