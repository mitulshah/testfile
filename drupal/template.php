<?php 
/**
 * Registers overrides for various functions.
 *
 * In this case, overrides three user functions
 */
 
// USER LOGIN  
function springfild_theme() {
  return array(
    'user_login' => array(
      'template' => 'user-login',
    ),
    'user_register' => array(
      'template' => 'user-register',
      'variables' => array('form' => NULL), ## you may remove this line in this case
    ),
    'user_pass' => array(
      'template' => 'user-pass',
      'variables' => array('form' => NULL), ## you may remove this line in this case
    ),
  );
}

function springfild_preprocess_user_login(&$variables) {
	$variables['form'] = drupal_build_form('user_login', user_login(array(),$form_state)); ## I have to build the user login myself.
}	


?>