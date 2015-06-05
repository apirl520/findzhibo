<?php

/**
 * This is the model class for table "dream_push_app_relative".
 *
 * The followings are the available columns in table 'dream_push_app_relative':
 * @property integer $push_id
 * @property integer $app_id
 * @property integer $push_type
 * @property string $ctime
 */
class ODreamPushAppRelative extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'dream_push_app_relative';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('push_id, app_id, push_type, ctime', 'required'),
			array('push_id, app_id, push_type', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('push_id, app_id, push_type, ctime', 'safe', 'on' => 'search'),
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
			'push_id' => 'Push',
			'app_id' => 'App',
			'push_type' => 'Push Type',
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

		$criteria->compare('push_id', $this->push_id);
		$criteria->compare('app_id', $this->app_id);
		$criteria->compare('push_type', $this->push_type);
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
	 * @return ODreamPushAppRelative the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
