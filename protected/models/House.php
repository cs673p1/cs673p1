<?php

/**
 * This is the model class for table "house".
 *
 * The followings are the available columns in table 'house':
 * @property integer $id
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $state
 * @property integer $zip_code
 * @property string $description
 * @property integer $number_of_floor
 * @property string $garage
 * @property string $garden
 * @property string $backdoor
 * @property integer $number_of_bathroom
 * @property integer $number_of_room
 * @property string $title
 */


class House extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return House the static model class
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
        return 'house';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'images'=>array(self::HAS_MANY, 'Image', 'house_id'),
            'seller'=>array(self::HAS_ONE, 'Sellers', 'house_id'),
            'user'=>array(self::HAS_ONE, 'User', array('user_id'=>'id'), 'through'=>'seller')
        );
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, address_1, state, zip_code, city, description', 'required'),
            array('zip_code, number_of_floor, garden, backdoor, number_of_bathroom, number_of_room', 'numerical', 'integerOnly'=>true),
            array('address_1, address_2, state', 'length', 'max'=>256),
            array('city', 'length', 'max'=>19),
            array('id, address_1, address_2, city, state, zip_code, description, number_of_floor, garage, garden, backdoor, number_of_bathroom, number_of_room, title', 'safe', 'on'=>'search'),
            array('city', 'match', 'pattern'=>'/^[a-zA-Z\s]+$/',  'message'=>'city can only contain word characters'),

        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {

        return array(
            'id' => 'ID',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'city' => 'City',
            'state' => 'State',
            'zip_code' => 'Zip Code',
            'description' => 'Description',
            'number_of_floor' => 'Number Of Floor',
            'garage' => 'Garage',
            'garden' => 'Garden',
            'backdoor' => 'Backdoor',
            'number_of_bathroom' => 'Number Of Bathroom',
            'number_of_room' => 'Number Of Room',
            'title' => 'Title',

        );
    }


    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
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
        $criteria->compare('address_1',$this->address_1,true);
        $criteria->compare('address_2',$this->address_2,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('number_of_floor',$this->number_of_floor);
        $criteria->compare('garage',$this->garage);
        $criteria->compare('garden',$this->garden);
        $criteria->compare('backdoor',$this->backdoor);
        $criteria->compare('number_of_bathroom',$this->number_of_bathroom);
        $criteria->compare('number_of_room',$this->number_of_room);
        $criteria->compare('title',$this->title,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Generate number array
     */
    public function getNumberOptions($init, $step){
        $array =  array();
        for($i = $init; $i<=$step; $i++){
            $tmpArray = array($i=>$i);
            $array = array_merge($array, $tmpArray);
        }
        return $array;
    }

}
