<?php

require_once 'iidacustomization.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function iidacustomization_civicrm_config(&$config) {
  _iidacustomization_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function iidacustomization_civicrm_xmlMenu(&$files) {
  _iidacustomization_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function iidacustomization_civicrm_install() {
  _iidacustomization_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function iidacustomization_civicrm_uninstall() {
  _iidacustomization_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function iidacustomization_civicrm_enable() {
  _iidacustomization_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function iidacustomization_civicrm_disable() {
  _iidacustomization_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function iidacustomization_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _iidacustomization_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function iidacustomization_civicrm_managed(&$entities) {
  _iidacustomization_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function iidacustomization_civicrm_caseTypes(&$caseTypes) {
  _iidacustomization_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function iidacustomization_civicrm_angularModules(&$angularModules) {
_iidacustomization_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function iidacustomization_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _iidacustomization_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function iidacustomization_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function iidacustomization_civicrm_navigationMenu(&$menu) {
  _iidacustomization_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'biz.jmaconsulting.iidacustomization')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _iidacustomization_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 */
function iidacustomization_civicrm_preCloseAccountingPeriod(&$params) {
  if (!empty($params['contact_id'])) {
    $query = "UPDATE civicrm_financial_accounts_balance fab
        INNER JOIN civicrm_financial_account fa ON fab.financial_account_id = fa.id
      SET fab.current_period_opening_balance = 0
      WHERE fa.contact_id = %1";
    $queryParams = array(1 => array($params['contact_id'], 'Integer'));
    CRM_Core_DAO::executeQuery($query, $queryParams);
  }
}