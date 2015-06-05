<?php

/**
 * This is the model class for table "dream_device_uuid".
 *
 * The followings are the available columns in table 'dream_device_uuid':
 * @property integer $id
 * @property integer $app_id
 * @property integer $device_id
 * @property string $uuid
 * @property string $ctime
 */
class ODreamDeviceUuid extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'dream_device_uuid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('app_id, device_id, uuid, ctime', 'required'),
			array('app_id, device_id', 'numerical', 'integerOnly' => true),
			array('uuid', 'length', 'max' => 40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, app_id, device_id, uuid, ctime', 'safe', 'on' => 'search'),
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
			'app_id' => 'App',
			'device_id' => 'Device',
			'uuid' => 'Uuid',
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
		$criteria->compare('app_id', $this->app_id);
		$criteria->compare('device_id', $this->device_id);
		$criteria->compare('uuid', $this->uuid, true);
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
	 * @return ODreamDeviceUuid the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
