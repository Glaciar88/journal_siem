<?php

/**
 * This is the model class for table "added".
 *
 * The followings are the available columns in table 'added':
 * @property integer $id
 * @property integer $user_id_add
 * @property string $date_add
 * @property string $note
 * @property string $date_memo
 * @property integer $number_memo
 * @property string $date_print
 * @property integer $user_id_print
 * @property integer $job_print
 * @property string $date_instal
 * @property integer $user_id_instal
 * @property integer $job_instal
 * @property string $date_aoi
 * @property integer $user_id_aoi
 * @property integer $job_aoi
 * @property integer $block_id
 */
class Added extends CActiveRecord
{
	
	/**
	 * Добавление свойства url
	 */
	public function getUrl()
    {
        return Yii::app()->createUrl('added/view', array(
            'id'=>$this->id,
            'number_memo'=>$this->number_memo,
        ));
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'added';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note, date_memo, number_memo, block_id, job_print, job_instal, job_aoi', 'required'),
			array('date_instal, date_aoi, date_print', 'safe'),
			array('user_id_add, number_memo, user_id_print, job_print, user_id_instal, job_instal, user_id_aoi, job_aoi, block_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id_add, date_add, note, date_memo, number_memo, date_print, user_id_print, job_print, date_instal, user_id_instal, job_instal, date_aoi, user_id_aoi, job_aoi, block_id', 'safe', 'on'=>'search'),
			array('user_id_add, user_id_print, user_id_instal, user_id_aoi', 'in', 'range'=>array(1,2,3,4,5,6)),
			array('job_print, job_instal, job_aoi', 'in', 'range'=>array(0,1,2)), 
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
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id_add'),
			'user_print' => array(self::BELONGS_TO, 'User', 'user_id_print'),
			'user_instal' => array(self::BELONGS_TO, 'User', 'user_id_instal'),
			'user_aoi' => array(self::BELONGS_TO, 'User', 'user_id_aoi'),
			'block' => array(self::BELONGS_TO, 'Blocks', 'block_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id_add' => 'Добавил',
			'date_add' => 'Дата',
			'note' => 'Запись',
			'date_memo' => 'Дата служебной записки',
			'number_memo' => '№ служебной записки',
			'date_print' => 'Дата выполнения',
			'user_id_print' => 'Выполнил принтер',
			'job_print' => 'Статус принтер',
			'date_instal' => 'Дата выполнения',
			'user_id_instal' => 'Выполнил установщик',
			'job_instal' => 'Статус установщик',
			'date_aoi' => 'Дата выполнения',
			'user_id_aoi' => 'Выполнил АОИ',
			'job_aoi' => 'Статус АОИ',
			'block_id' => 'Блок',
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
		$criteria->compare('user_id_add',$this->user_id_add);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('date_memo',$this->date_memo,true);
		$criteria->compare('number_memo',$this->number_memo);
		$criteria->compare('date_print',$this->date_print,true);
		$criteria->compare('user_id_print',$this->user_id_print);
		$criteria->compare('job_print',$this->job_print);
		$criteria->compare('date_instal',$this->date_instal,true);
		$criteria->compare('user_id_instal',$this->user_id_instal);
		$criteria->compare('job_instal',$this->job_instal);
		$criteria->compare('date_aoi',$this->date_aoi,true);
		$criteria->compare('user_id_aoi',$this->user_id_aoi);
		$criteria->compare('job_aoi',$this->job_aoi);
		$criteria->compare('block_id',$this->block_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Added the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave()) {
			// Отсылать id пользователя и дату с временем создания документа
			$this->user_id_add=Yii::app()->user->id;
			$this->date_add = new CDbExpression('NOW()');
			if ($this->job_print == 0 || $this->job_print == 1){
				$this->date_print = null;
				$this->user_id_print = null;
			}
			if ($this->job_instal == 0 || $this->job_instal == 1){
				$this->date_instal = null;
				$this->user_id_instal = null;
			}
			if ($this->job_aoi == 0 || $this->job_aoi == 1){
				$this->date_aoi = null;
				$this->user_id_aoi = null;
			}
			return true; // Если следует продолжить вставку записи
		} else {
			return false; // Если следует прекритить вставку записи
		}
	}
}