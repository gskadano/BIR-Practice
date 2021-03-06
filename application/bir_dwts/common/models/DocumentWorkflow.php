<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "document_workflow".
 *
 * @property integer $id
 * @property integer $document_id
 * @property integer $employee_id
 * @property integer $station_desk_id
 * @property string $document_wokflow_comments
 * @property integer $document_status_id
 * @property string $time_accepted
 * @property string $time_released
 * @property string $total_time_spent
 * @property string $create_time
 * @property string $update_time
 * @property integer $employee_id1
 *
 * @property Document $document
 * @property Employee $employee
 * @property StationDesk $stationDesk
 * @property Employee $employeeId1
 * @property DocumentStatus $documentStatus
 */
class DocumentWorkflow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_workflow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'employee_id', 'station_desk_id', 'document_workflow_status_id',], 'required'],
            [['document_id', 'employee_id', 'station_desk_id', 'document_workflow_status_id', 'employee_id1'], 'integer'],
            [['document_wokflow_comments'], 'string'],
            [['employee_id1','time_accepted', 'time_released', 'total_time_spent', 'create_time', 'update_time'], 'safe']
        ];
    }

    

    public function behaviors()
    {
                if(isset($_POST['button1']))
        {
            return [
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
            ActiveRecord::EVENT_BEFORE_UPDATE => ['time_released','update_time'],
            ],
            'value' => new Expression('NOW()'),
        ],
        ];
        } else{
        return [
            'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
            ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time','time_accepted'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
            ],
            'value' => new Expression('NOW()'),
        ],
        ];
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_id' => 'Tracking Number',
            'employee_id' => 'Receiver',
            'station_desk_id' => 'Station Desk',
            'document_wokflow_comments' => 'Document Wokflow Comments',
            'document_workflow_status_id' => 'Document Status',
            'time_accepted' => 'Time Accepted',
            'time_released' => 'Time Released',
            'total_time_spent' => 'Total Time Spent',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'employee_id1' => 'Release To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Document::className(), ['id' => 'document_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStationDesk()
    {
        return $this->hasOne(StationDesk::className(), ['id' => 'station_desk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeId1()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentWorkflowStatus()
    {
        return $this->hasOne(DocumentWorkflowStatus::className(), ['id' => 'document_workflow_status_id']);
    }
}
