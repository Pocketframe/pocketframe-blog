<?php

return [
  /**
   * Enable or disable the tenant feature
   *
   * If enabled, the tenant feature will automatically scope the queries
   * to the currently authenticated tenant.
   */
  'enabled' => false,

  /**
   * The Tenant Column
   *
   * The name of the column that stores the tenant ID.
   */
  'tenant_column' => 'tenant_id',
];
