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
			'block_id'=>$this->block_id,
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
			if ($this->scenario === 'insert') {
				$this->user_id_add=Yii::app()->user->id;
				$this->date_add = new CDbExpression('NOW()');
			}
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
			
			$timestamp = date("Ymd");
			if ($this->job_print == 2) {
				if(CDateTimeParser::parse($this->date_print,'yyyy-MM-dd')!==false){
					$date_print = date("Ymd", strtotime($this->date_print));
					if ($date_print>$timestamp){
						$this->addError($attribute, Yii::t('job', 'Дата выполненной работы не должна быть позднее сегодняшнего дня')); 
						return false;
					}
				} else {
					$this->addError($attribute, Yii::t('job', 'Проверьте формат введенной даты (Пример: 2014-01-31)')); 
					return false;
				}
			}
			if ($this->job_instal == 2) {
				if(CDateTimeParser::parse($this->date_instal,'yyyy-MM-dd')!==false){
					$date_instal = date("Ymd", strtotime($this->date_instal));
					if ($date_instal>$timestamp){
						$this->addError($attribute, Yii::t('job', 'Дата выполненной работы не должна быть позднее сегодняшнего дня')); 
						return false;
					}
				} else {
					$this->addError($attribute, Yii::t('job', 'Проверьте формат введенной даты (Пример: 2014-01-31)')); 
					return false;
				}
			}
			if ($this->job_aoi == 2) {
				if(CDateTimeParser::parse($this->date_aoi,'yyyy-MM-dd')!==false){
					$date_aoi = date("Ymd", strtotime($this->date_aoi));
					if ($date_aoi > $timestamp){
						$this->addError($attribute, Yii::t('job', 'Дата выполненной работы не должна быть позднее сегодняшнего дня')); 
						return false;
					}
				} else {
					$this->addError($attribute, Yii::t('job', 'Проверьте формат введенной даты (Пример: 2014-01-31)')); 
					return false;
				}
			}
			
			if (($this->job_print == 2 & $this->user_id_print == null) || ($this->job_instal == 2 & $this->user_id_instal == null) || ($this->job_aoi == 2 & $this->user_id_aoi == null)){
				$this->addError($attribute, Yii::t('job', 'При выполненной работе необходимо заполнить все поля'));
				return false;
			}
			if (($this->job_print == 2 & $this->date_print === '') || ($this->job_instal == 2 & $this->date_instal === '') || ($this->job_aoi == 2 & $this->date_aoi === '')){
				$this->addError($attribute, Yii::t('job', 'При выполненной работе необходимо заполнить все поля'));
				return false;
			}
			return true; // Если следует продолжить вставку записи
		} else {
			return false; // Если следует прекритить вставку записи
		}
	}
	
	public static function countJob($id_user, $job_mashine){
		
		//$results =Added::model()->findAll(array('condition' => '`user_id_print` in ($id_user)'));
		//$count = count ($results);
		//$n=Post::model()->count($condition,$params);
		switch ($job_mashine){
			case 1:
				echo Added::model()->count('`user_id_print`='.$id_user);
				break;
			case 2:
				echo Added::model()->count('`user_id_instal`='.$id_user);
				break;
			case 3:
				echo Added::model()->count('`user_id_aoi`='.$id_user);
				break;
			return false;
		}
		
	}
	
	public static function listJob ($id_user, $job_mashine){
		if ($job_mashine == 1){
			$results =Added::model()->findallByAttributes(array('user_id_print'=>$id_user), array('order' => 'date_print desc', 'limit' => 10));
			if($results){	
				foreach ($results as $model) {
					echo "<div class='_fclear'><div class='fleft number_memo'><a href='/index.php?r=added/view&id=$model->id'>Служебная записка № ";
					echo CHtml::encode($model->number_memo);
					echo "</a></div><div class='fleft'><b>Выполнил: </b>";
					echo Yii::app()->dateFormatter->format("dd MMMM yyyy", $model->date_print);
					echo "</div></div>";
				}
			}
			else {
				echo "Пользователь не выполнил ни одной работы.";
			}
		}
		if ($job_mashine == 2){
			$results =Added::model()->findallByAttributes(array('user_id_instal'=>$id_user), array('order' => 'date_instal desc', 'limit' => 10));
			if($results){
				foreach ($results as $model) {
					echo "<div class='_fclear'><div class='fleft number_memo'><a href='/index.php?r=added/view&id=$model->id'>Служебная записка № ";
					echo CHtml::encode($model->number_memo);
					echo "</a></div><div class='fleft'><b>Выполнил: </b>";
					echo Yii::app()->dateFormatter->format("dd MMMM yyyy", $model->date_instal);
					echo "</div></div>";
				}
			}
			else {
				echo "Пользователь не выполнил ни одной работы.";
			}
		}
		if ($job_mashine == 3){
			$results =Added::model()->findallByAttributes(array('user_id_aoi'=>$id_user), array('order' => 'date_aoi desc', 'limit' => 10));
			if($results){
				foreach ($results as $model) {
					echo "<div class='_fclear'><div class='fleft number_memo'><a href='/index.php?r=added/view&id=$model->id'>Служебная записка № ";
					echo CHtml::encode($model->number_memo);
					echo "</a></div><div class='fleft'><b>Выполнил: </b>";
					echo Yii::app()->dateFormatter->format("dd MMMM yyyy", $model->date_aoi);
					echo "</div></div>";
				}
			} 
			else {
				echo "Пользователь не выполнил ни одной работы.";
			}
		}
	} 	

	
}
