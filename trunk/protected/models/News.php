<?php

/**
 * This is the model class for table "tbl_news".
 *
 * The followings are the available columns in table 'tbl_news':
 * @property integer $id
 * @property string $date
 * @property string $summary
 * @property string $content
 * @property string $contentDisplay
 * @property string $category
 * @property string $object
 * @property string $status
 * @property integer $updateTime
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return News the static model class
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
		return 'tbl_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, summary, content, category, object, status', 'required'),
			// array('updateTime', 'numerical', 'integerOnly'=>true),
			array('summary', 'length', 'max'=>512),
			array('category, object, status', 'length', 'max'=>256),
			array('contentDisplay', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, summary, content, contentDisplay, category, object, status, updateTime', 'safe', 'on'=>'search'),
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
			'date' => '開催日',
			'summary' => '概要',
			'content' => '内容詳細',
			'contentDisplay' => '内容詳細(表示用)',
			'category' => 'カテゴリ',
			'object' => '対象',
			'status' => '状態',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('contentDisplay',$this->contentDisplay,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('object',$this->object,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('updateTime',$this->updateTime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getStatusOptions()
	{
		return array(
			'募集中'=>'募集中',
			'受付終了'=>'受付終了',
			'終りました'=>'終りました',
		);
        }

	/*
	public function getReverseStatusOptions()
	{
		$status = $this->statusOptions;
		return array_flip($status);
        }
	*/

	public function getCategoryOptions()
	{
	  // 記事のタイトルを集めてカテゴリ配列を作る
		$models = Article::model()->findAll();
		$titles = array();
		foreach ($models as $model)
		{
			$titles[$model->title]=$model->title;
		}
		$titles=array_unique($titles);
		$titles['その他']='その他';
		return $titles;
	}

	public function getObjectOptions()
	{
		return array(
			'人'=>'人',
			'ペット'=>'ペット',
			'その他(両方)'=>'その他(両方)',
		);
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