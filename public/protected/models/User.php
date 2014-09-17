<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $surname
 * @property string $name
 * @property string $password
 */
 
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public $password_old;
	public $password_new;
	public $password_rep; 
	public $password_com = 0;
	 
	public function tableName()
	{
		return 'user';
	}
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, name, password', 'required'),
			array('password_old, password_new, password_rep', 'required', 'on'=>'update'),
			array('username', 'length', 'max'=>50),
			array('surname, name', 'length', 'max'=>30),
			array('password, password_old, password_new, password_rep', 'filter', 'filter'=>'hashPassword'), 
			array('password_new', 'compare', 'compareAttribute'=>'password_rep', 'on'=>'update'),
			array('password, password_old, password_new, password_rep', 'length', 'max'=>100),
			array('surname', 'safe', 'on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, surname, name', 'safe', 'on'=>'search'),
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
			'username' => 'Логин',
			'surname' => 'Surname',
			'name' => 'Имя',
			'password' => 'Пароль',
			'password_old' => 'Старый пароль',
			'password_new' => 'Новый пароль',
			'password_rep' => 'Повтор пароля',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
 
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
	
	/**
	* Метод, вызываемый перед сохранением данных модели
	* @return boolean признак прохождения проверки
	*/
	protected function beforeSave()
	{
		// Кодировать пароль при создании пользователя
		if ($this->scenario === 'insert') {
			$this->password = $this->hashPassword($this->password);
		}
		if ($this->scenario === 'update') {
			$this->password = $this->hashPassword($this->password_new);
		}
			
		return true;
	}
	public function beforeValidate()
	{
		if ($this->scenario === 'update') {
			$this->password_old = $this->hashPassword($this->password_old);
			if ($this->password_old == $this->password) {
				return true;
			}else {
			$this->addError($attribute, Yii::t('password_old', 'Неверный пароль'));
			var_dump($this->password, $this->password_old);
			return false;}
		}
		return true;
	}

}