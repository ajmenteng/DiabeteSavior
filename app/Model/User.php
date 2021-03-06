<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
public $displayField = 'email';
/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
  'email' => array(
    'email' => array(
      'rule' => array('isUnique', array('email'), false),
        'message' => 'The email address has been used for registration previously. <br> If you forgot your password, <a href="./forgot_password" >click here</a> to recover it.'
      ),
    'notempty' => array(
      'rule' => array('notempty'),
      ),
    ),
  'password' => array(
    'notempty' => array(
      'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  'confirm_password' => array(
    'identical' => array(
      'rule' => array('identicalFieldValues', 'password'),
        'message' => 'Password confirmation does not match password.'
      )
    ),
  /*
  'username' => array(
    'alphanumeric' => array(
      'rule' => array('alphanumeric'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),*/
  'created' => array(
    'datetime' => array(
      'rule' => array('datetime'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  'modified' => array(
    'datetime' => array(
      'rule' => array('datetime'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
/**
 * hasOne associations
 *
 * @var array
 */
  public $hasOne = array(
    'Profile' => array(
      'className' => 'Profile',
      'foreignKey' => 'user_id',
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'dependent' => true
    )
  );
  /*
  public $hasOne = 'Profile';
  */
  public $hasMany = array(
    'Patients' => array(
      'className' => 'Patient',
      //'conditions' => array('Recipe.approved' => '1'),
      'conditions' => '',
      'order' => 'patient_lastname DESC, patient_firstname DESC',
      'dependent' => true
    )
  );
  


public function afterFind($results = array(), $primary) {
  foreach($results as $key => $value) {
      //if(isset($results[$key]['User']['password'])) {

      //}
    unset($results[$key]['User']['password']);
    unset($results[$key]['User']['reset_token']);
  }
  return $results;
}


public function beforeFind($query)  {
  parent::beforeFind($query);
  //var_dump($query['conditions']);
  if(!empty($query['conditions']['password'])) {
    $query['conditions']['password'] = sha1($query['conditions']['password']);
  }
  return $query;
}


public function beforeValidate($options = array()) {
  parent::beforeValidate();
  if($this->data['User']['password'] == '') {
    unset($this->data['User']['password']);

  }
  

  return true;
}


public function beforeSave($options = array()) {
  parent::beforeSave();
  // $this->data['User']['password'] = sha1($this->data['User']['password']);
  // empty() to check if the variable is empty i.e: null, 0, "", '', false, array()
  if(!empty($this->data['User']['password'])) {
    $this->data['User']['password'] = sha1($this->data['User']['password']);
  }
  return true;
}

}
