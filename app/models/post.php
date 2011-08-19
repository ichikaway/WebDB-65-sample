<?php
class Post extends AppModel {
	public $name = 'Post';

	public $actsAs = array('Cakeplus.AddValidationRule');

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
			'compare2fields' => array(
				'rule' => array('compare2fields', 'email_confirm'),
				'message' => 'EmailとEmail Confirmの値が違います',
			),
		),
	);
}