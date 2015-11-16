<?php
/**
 * AuthorizationKey Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Allcreator <info@allcreator.net>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');

/**
 * AuthorizationKeyController
 *
 * @author Allcreator <info@allcreator.net>
 * @package NetCommons\AuthorizationKeys\Controller
 */
class AuthorizationKeysController extends AuthorizationKeysAppController {

/**
 * use components
 *
 * @var array
 */
	public $components = array(
		'Pages.PageLayout',
		'AuthorizationKeys.AuthorizationKey' => array(
			'operationType' => 'none',
		),
		'Security',
	);

/**
 * use helpers
 *
 */
	public $helpers = [
		'NetCommons.BackToPage',
		'NetCommons.Token',
		'AuthorizationKeys.AuthorizationKey'
	];

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('view', 'popup');

		if ($this->RequestHandler->accepts('json')) {
			$this->viewClass = '';
			$this->layout = true;
		}
	}
/**
 * view method
 * Display the AuthorizationKey auto redirect screen
 *
 * @return void
 */
	public function view() {
		if ($this->request->isPost()) {
			if ($this->AuthorizationKey->check()) {
				$this->redirect($this->AuthorizationKey->getReturnUrl());
			}
		}
		if (isset($this->params['pass'][0])) {
			$hashKey = $this->params['pass'][0];
		} else {
			$this->setAction('throwBadRequest');
			return;
		}
		$this->request->data['Frame'] = Current::read('Frame');
		$this->request->data['Block'] = Current::read('Block');
		$this->request->data['AuthorizationKey']['authorization_hash'] = $hashKey;
	}
/**
 * popup method
 * Display the AuthorizationKey popup screen
 *
 * @return void
 */
	public function popup() {
		$url = $this->request->query['url'];
		$this->set('url', $url);
	}
}