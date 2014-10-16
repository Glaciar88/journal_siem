<?php

/**
 * This is the model class for table "terminals".
 *
 * The followings are the available columns in table 'terminals':
 * @property integer $id
 * @property string $name
 */
class Terminals extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'terminals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'name' => 'Название',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Terminals the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public static function menuSide()
	{
		$results = Terminals::model()->findAll(array('order' => 'name'));
		if($results){
			echo "<ul id='sideMenu' class='sample-menu'>";
			foreach ($results as $model) {
				$block_name = $model->name;
				$results_block = Blocks::model()->findallByAttributes(array('terminals_id'=>$model->id), array('order' => 'name')); //получаем массив с элементами относящиеся к терминалу с id_terminal
				$r = Yii::app()->getRequest()->getQuery('r');
				if ($r == 'added/view'){
				$post_id = Yii::app()->getRequest()->getQuery('id');} //Получаем id записи (при просмотре)
				$block_id = Yii::app()->request->getQuery('block_id'); //Получаем block_id (при фильтрации записей)
				$post=Added::model()->findByAttributes(array('id'=>$post_id)); //строка записи id=post_id
				if($results_block){
					$ul_style = "<ul>";
					foreach ($results_block as $model) { //цикл для проверки на совпадение
						if ($block_id == $model->id || $post->block_id == $model->id){
							$ul_style = "<ul style='display: block;'>";	
							$a_name = "expanded";
						}
					}
				}
				echo "<li><a href='#' class='rmenu' name='" . $a_name . "'><span></span>$block_name</a>";
				$a_name = "";
					if($results_block){
						echo $ul_style; 
						foreach ($results_block as $model) {	//цикл добавления пунктов меню
							echo "<li>";
							if ($block_id == $model->id || $post->block_id == $model->id){
								echo CHtml::link($model->name, array('/added', 'view'=>'index', 'block_id'=>$model->id), array('style'=>'color: #73CE27; font-weight: bold'));
							} else {
								echo CHtml::link($model->name, array('/added', 'view'=>'index', 'block_id'=>$model->id));
							}
							echo "</li>";
						}
						echo "</ul>";
					}
					$a_style = "";
				echo "</li>";
			}
			echo "</ul>";
		}
	}
}
