<?php

/**
 * This is the model class for table "dream_ad_package".
 *
 * The followings are the available columns in table 'dream_ad_package':
 * @property integer $id
 * @property string $app_name
 * @property string $package_name
 * @property string $version_code
 * @property string $version_name
 * @property integer $file_size
 * @property string $level
 * @property string $download_time
 * @property string $download_url
 * @property string $icon_url
 * @property string $image_url
 * @property string $description
 * @property integer $show_flag
 * @property integer $show_order
 * @property string $ctime
 */
class ODreamAdPackage extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'dream_ad_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'app_name, package_name, version_code, version_name, file_size, level, download_time, download_url, icon_url, image_url, description, show_flag, show_order, ctime',
				'required'
			),
			array('file_size, show_flag, show_order', 'numerical', 'integerOnly' => true),
			array('app_name, package_name, download_url, icon_url', 'length', 'max' => 200),
			array('version_code', 'length', 'max' => 20),
			array('version_name, level', 'length', 'max' => 100),
			array('download_time', 'length', 'max' => 10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, app_name, package_name, version_code, version_name, file_size, level, download_time, download_url, icon_url, image_url, description, show_flag, show_order, ctime',
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
			'app_name' => 'App Name',
			'package_name' => 'Package Name',
			'version_code' => 'Version Code',
			'version_name' => 'Version Name',
			'file_size' => 'File Size',
			'level' => 'Level',
			'download_time' => 'Download Time',
			'download_url' => 'Download Url',
			'icon_url' => 'Icon Url',
			'image_url' => 'Image Url',
			'description' => 'Description',
			'show_flag' => 'Show Flag',
			'show_order' => 'Show Order',
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
		$criteria->compare('app_name', $this->app_name, true);
		$criteria->compare('package_name', $this->package_name, true);
		$criteria->compare('version_code', $this->version_code, true);
		$criteria->compare('version_name', $this->version_name, true);
		$criteria->compare('file_size', $this->file_size);
		$criteria->compare('level', $this->level, true);
		$criteria->compare('download_time', $this->download_time, true);
		$criteria->compare('download_url', $this->download_url, true);
		$criteria->compare('icon_url', $this->icon_url, true);
		$criteria->compare('image_url', $this->image_url, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('show_flag', $this->show_flag);
		$criteria->compare('show_order', $this->show_order);
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
	 * @return ODreamAdPackage the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
