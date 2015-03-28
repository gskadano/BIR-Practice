<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_workflow_status".
 *
 * @property integer $id
 * @property string $document_workflow_status_name
 * @property string $document_workflow_status_description
 * @property string $create_time
 * @property string $update_time
 *
 * @property DocumentWorkflow[] $documentWorkflows
 */
class DocumentWorkflowStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_workflow_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['document_workflow_status_description'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['document_workflow_status_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_workflow_status_name' => 'Document Workflow Status Name',
            'document_workflow_status_description' => 'Document Workflow Status Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentWorkflows()
    {
        return $this->hasMany(DocumentWorkflow::className(), ['document_status_id' => 'id']);
    }
}
