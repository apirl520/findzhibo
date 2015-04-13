<?php

/**
 * This is the model class for table "show_artist".
 *
 * The followings are the available columns in table 'show_artist':
 * @property integer $id
 * @property integer $source_id
 * @property string $name
 * @property string $title
 * @property string $image
 * @property string $cover
 * @property string $url
 * @property string $direct_url
 * @property string $view
 * @property integer $famous
 * @property integer $hot
 * @property integer $on
 * @property string $update_time
 * @property string $create_time
 */
class OShowArtist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'show_artist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('source_id, name, title, cover, url, view, famous, hot, on, update_time, create_time', 'required'),
			array('source_id, famous, hot, on', 'numerical', 'integerOnly'=>true),
			array('name, image, cover', 'length', 'max'=>120),
			array('title, url, direct_url', 'length', 'max'=>250),
			array('view', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, source_id, name, title, image, cover, url, direct_url, view, famous, hot, on, update_time, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'source_id' => 'Source',
			'name' => 'Name',
			'title' => 'Title',
			'image' => 'Image',
			'cover' => 'Cover',
			'url' => 'Url',
			'direct_url' => 'Direct Url',
			'view' => 'View',
			'famous' => 'Famous',
			'hot' => 'Hot',
			'on' => 'On',
			'update_time' => 'Update Time',
			'create_time' => 'Create Time',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('source_id',$this->source_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('direct_url',$this->direct_url,true);
		$criteria->compare('view',$this->view,true);
		$criteria->compare('famous',$this->famous);
		$criteria->compare('hot',$this->hot);
		$criteria->compare('on',$this->on);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OShowArtist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
