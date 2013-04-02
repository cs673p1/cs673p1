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
            array('zip_code', 'numerical', 'integerOnly'=>true),
            array('address_1, address_2, state', 'length', 'max'=>256),
            array('city', 'length', 'max'=>19),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, address_1, address_2, city, state, zip_code, description, number_of_floor, garage, garden, backdoor, number_of_bathroom, number_of_room', 'safe', 'on'=>'search'),

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

        $criteria->compare('id', $this->id);
        $criteria->compare('address_1',$this->address_1,true);
        $criteria->compare('address_2',$this->address_2,true);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state',$this->state,true);
        $criteria->compare('zip_code',$this->zip_code);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

}
