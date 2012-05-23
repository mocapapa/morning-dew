<?php

/**
 * This is the model class for table "tbl_article".
 *
 * The followings are the available columns in table 'tbl_article':
 * @property integer $id
 * @property integer $sort
 * @property boolean $clickable
 * @property string $title
 * @property string $content
 * @property string $contentDisplay
 * @property integer $updateTime
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sort, clickable, title, content', 'required'),
			// array('sort, updateTime', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>512),
			array('contentDisplay', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sort, title, content, contentDisplay, updateTime', 'safe', 'on'=>'search'),
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
			'sort' => '順番',
			'clickable' => 'クリック可能か？',
			'title' => 'タイトル',
			'content' => '内容詳細',
			'contentDisplay' => '内容詳細(表示用)',
			'updateTime' => '修正日時',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('contentDisplay',$this->contentDisplay,true);
		$criteria->compare('updateTime',$this->updateTime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'updateAttribute' => 'updateTime',
				'createAttribute' => 'updateTime',
				'setUpdateOnCreate' => true,
			)
		);
	}

	public function afterFind()
	{
		$this->updateTime = date('Y-m-d H:i:s', $this->updateTime);
		$this->contentDisplay = str_replace('%BASEURL', Yii::app()->request->baseUrl, $this->contentDisplay);
	}


	/**
	 * Prepares attributes before performing validation.
	 */
	protected function beforeValidate()
	{
        	$parser=new MarkdownParser;
		$this->contentDisplay=$parser->safeTransform($this->content);
		return true;
        }

}