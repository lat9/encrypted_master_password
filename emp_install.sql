# 
# Encrypted Master Password install script for Zen Cart v1.5.0x.  The configuration values are inserted into Configuration->My Store
#
INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) 
VALUES ('Encrypted Master Password: Single Admin ID', 'EMP_LOGIN_ADMIN_ID', '1', 'Specify the ID of an admin user that is permitted to use the Encrypted Master Password feature. Set the value to 0 to disable the <em>Single Admin ID</em> feature.<br /><br /><b>Default: 1</b><br />', 1, '300', NOW(), NOW());

INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added) 
VALUES ('Encrypted Master Password: Admin Profile ID', 'EMP_LOGIN_ADMIN_PROFILE_ID', '1', 'Specify the admin <em>User Profile ID</em> that is permitted to use the Encrypted Master Password feature &mdash; all admins that are in this profile are permitted.  Set the value to 0 to disable the <em>Admin Profile ID</em> feature.<br /><br /><b>Default: 1 (Superusers)</b><br />', 1, '301', NOW(), NOW());