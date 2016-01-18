<?php

/**
 * This is the model class for table "dream_novel".
 *
 * The followings are the available columns in table 'dream_novel':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $info
 * @property string $author
 * @property string $cover
 * @property string $download
 * @property integer $fileSize
 * @property integer $status
 * @property integer $price
 * @property integer $hot
 * @property string $update_time
 * @property string $ctime
 */
class ODreamNovel extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'dream_novel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'category_id, name, info, author, cover, download, fileSize, status, price, hot, update_time, ctime',
				'required'
			),
			array('category_id, fileSize, status, price, hot', 'numerical', 'integerOnly' => true),
			array('name, author', 'length', 'max' => 50),
			array('cover, download', 'length', 'max' => 120),
			array('info', 'length', 'max' => 256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, category_id, name, info, author, cover, download, fileSize, status, price, hot, update_time, ctime',
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
			'category_id' => 'Category',
			'name' => 'Name',
			'info' => 'info',
			'author' => 'Author',
			'cover' => 'Cover',
			'download' => 'Download',
			'fileSize' => 'File Size',
			'status' => 'Status',
			'price' => 'Price',
			'hot' => 'Hot',
			'update_time' => 'Update Time',
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
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('info', $this->info, true);
		$criteria->compare('author', $this->author, true);
		$criteria->compare('cover', $this->cover, true);
		$criteria->compare('download', $this->download, true);
		$criteria->compare('fileSize', $this->fileSize);
		$criteria->compare('status', $this->status);
		$criteria->compare('price', $this->price);
		$criteria->compare('hot', $this->hot);
		$criteria->compare('update_time', $this->update_time, true);
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
	 * @return ODreamNovel the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
