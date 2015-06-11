<?php

/**
 * This is the model class for table "dream_push_task".
 *
 * The followings are the available columns in table 'dream_push_task':
 * @property integer $id
 * @property integer $push_type
 * @property string $push_title
 * @property string $push_description
 * @property integer $push_ad_id
 * @property integer $push_status
 * @property integer $push_limit
 * @property string $ctime
 */
class ODreamPushTask extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'dream_push_task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('push_type, push_title, push_description, push_ad_id, push_status, push_limit, ctime', 'required'),
			array('push_type, push_ad_id, push_status, push_limit', 'numerical', 'integerOnly' => true),
			array('push_title', 'length', 'max' => 120),
			array('push_description', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, push_type, push_title, push_description, push_ad_id, push_status, push_limit, ctime',
				'safe',
				'on' => 'search'
			),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'push_type' => 'Push Type',
			'push_title' => 'Push Title',
			'push_description' => 'Push Description',
			'push_ad_id' => 'Push Ad',
			'push_status' => 'Push Status',
			'push_limit' => 'Push Limit',
			'ctime' => 'Ctime',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('push_type', $this->push_type);
		$criteria->compare('push_title', $this->push_title, true);
		$criteria->compare('push_description', $this->push_description, true);
		$criteria->compare('push_ad_id', $this->push_ad_id);
		$criteria->compare('push_status', $this->push_status);
		$criteria->compare('push_limit', $this->push_limit);
		$criteria->compare('ctime', $this->ctime, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection() {
		return Yii::app()->dream;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ODreamPushTask the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
