<?php

/**
 * CaseContribution.Create API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_case_contribution_Create_spec(&$spec) {
  $spec['contribution_id']['api.required'] = 1;
  $spec['case_id']['api.required'] = 1;
}

/**
 * CaseContribution.Create API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_case_contribution_Create($params) {
  if (empty($params['contribution_id'])) {
    return civicrm_api3_create_error('contribution_id is not set');
  }
  if (empty($params['case_id'])) {
    return civicrm_api3_create_error('case_id is not set');
  }
  $result = CRM_Casecontribution_BAO_CaseContribution::add($params);
  $returnValues[$result['contribution_id']] = $result;
  return civicrm_api3_create_success($returnValues, $params, 'CaseContribution', 'Create');
}

