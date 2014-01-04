#
# Removes the configuration keys associated with the Encrypted Master Password plugin from your Zen Cart database.
#
DELETE FROM configuration WHERE configuration_key LIKE 'EMP_LOGIN_ADMIN_%';