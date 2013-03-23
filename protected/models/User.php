<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @author wang yu
 * @package application.model
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends CActiveRecord
{
    /** @var password validation */
    public $password_repeat;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
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
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email, password', 'length', 'max'=>32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, email, password', 'safe', 'on'=>'search'),
            array('email, password', 'required'),
            array('password', 'compare'),
            array('password_repeat', 'safe'),
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
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
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

        $criteria->compare('name',$this->name,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('password',$this->password,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * perform one-way encryption on the password before we store it in
    the database
     */
    protected function afterValidate()
    {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }

    public function encrypt($value)
    {
        return md5($value);
    }
}