<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
    var $validate = array(
        'nazwisko' => array('rule' => 'notBlank'),
        'etat' => array('rule' => 'notBlank'),
        'placa_pod' => array(
            'rule_g' => array(
                'rule' => array('comparison', ">=", 0),
                'message' => 'Miminalna kwota to 0',
                'allowEmpty' => true
            ),
            'rule_l' => array(
                'rule' => array('comparison', "<=", 2000),
                'message' => 'Maksymalna kwota to 2000',
                'allowEmpty' => true
            ) 
    ));
}
