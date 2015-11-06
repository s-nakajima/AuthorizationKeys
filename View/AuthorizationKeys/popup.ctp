<?php
/**
 * authorization key popup
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author AllCreator <info@allcreator.net>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>
<div id="authorizationKey-Popup-<?php echo Current::read('Frame.id'); ?>" >
	<?php echo $this->NetCommonsForm->create(false, array('url' => "$url", 'ng-submit' => 'submit()')); ?>

		<div class="modal-header">
			<h3><?php echo __d('authorization_keys', 'Authorization key confirm dialog'); ?></h3>
		</div>
		<div class="modal-body">
				<?php echo $this->AuthorizationKey->authorizationKeyInput(); ?>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" type="button" ng-click="cancel()"><?php echo __d('net_commons', 'Cancel'); ?></button>
			<button class="btn btn-primary" type="submit"><?php echo __d('net_commons', 'OK'); ?></button>
		</div>

	<?php echo $this->NetCommonsForm->end(); ?>

</div>