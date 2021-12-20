<?php

return [

    /*
     * Shared translations.
     */
    'title' => 'Laravel Installer',
    'next' => 'Next Step',
    'back' => 'Previous',
    'finish' => 'Install',
    'go_to_homepage' => 'Go to homepage',
    'forms' => [
        'errorTitle' => 'The Following errors occurred:',
    ],

    /*
     * Home page translations.
     */
    'welcome' => [
        'templateTitle' => 'Welcome',
        'title'   => 'Laravel Installer',
        'message' => 'Easy Installation and Setup Wizard.',
        'next'    => 'Check Requirements',
    ],

    /*
     * Requirements page translations.
     */
    'requirements' => [
        'templateTitle' => 'Step 1 | Server Requirements',
        'title' => 'Server Requirements',
        'next'    => 'Check Permissions',
        'errorMessage' => 'Requirements not met'
    ],

    /*
     * Permissions page translations.
     */
    'permissions' => [
        'templateTitle' => 'Step 2 | Permissions',
        'title' => 'Permissions',
        'next' => 'Configure Environment',
        'errorMessage' => 'Not enough permission for folders'
    ],

    /*
     * Environment page translations.
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Step 3 | Environment Settings',
            'title' => 'Environment Settings',
            'desc' => 'Please select how you want to configure the apps <code>.env</code> file.',
            'wizard-button' => 'Form Wizard Setup',
            'classic-button' => 'Classic Text Editor',
        ],
        'wizard' => [
            'templateTitle' => 'Step 3 | Environment Settings | Guided Wizard',
            'title' => 'Guided <code>.env</code> Wizard',
            'tabs' => [
                'environment' => 'Environment',
                'database' => 'Database',
                'application' => 'Application',
            ],
            'form' => [
                'name_required' => 'An environment name is required.',
                'app_name_label' => 'App Name',
                'app_name_placeholder' => 'App Name',
                'app_environment_label' => 'App Environment',
                'app_environment_label_local' => 'Local',
                'app_environment_label_development' => 'Development',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Production',
                'app_environment_label_other' => 'Other',
                'app_environment_placeholder_other' => 'Enter your environment...',
                'app_debug_label' => 'App Debug',
                'app_debug_label_true' => 'True',
                'app_debug_label_false' => 'False',
                'log_level_label' => 'App Log Level',
                'log_level_label_debug' => 'debug',
                'log_level_label_info' => 'info',
                'log_level_label_notice' => 'notice',
                'log_level_label_warning' => 'warning',
                'log_level_label_error' => 'error',
                'log_level_label_critical' => 'critical',
                'log_level_label_alert' => 'alert',
                'log_level_label_emergency' => 'emergency',
                'log_channel_label' => 'App Log Channel',
                'log_channel_placeholder' => 'App Log Channel',
                'app_url_label' => 'App Url',
                'app_url_placeholder' => 'App Url',
                'db_create_if_not_exists' => 'Create database if not exists',
                'db_connection_failed' => 'Could not connect to the database.',
                'db_connection_label' => 'Database Connection',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Database Host',
                'db_host_placeholder' => 'Database Host',
                'db_port_label' => 'Database Port',
                'db_port_placeholder' => 'Database Port',
                'db_name_label' => 'Database Name',
                'db_name_placeholder' => 'Database Name',
                'db_username_label' => 'Database User Name',
                'db_username_placeholder' => 'Database User Name',
                'db_password_label' => 'Database Password',
                'db_password_placeholder' => 'Database Password',

                'app_tabs' => [
                    'more_info' => 'More Info',
                    'broadcasting_title' => 'Broadcasting, Caching, Session, &amp; Queue',
                    'broadcast_driver_label' => 'Broadcast Driver',
                    'broadcast_driver_placeholder' => 'Broadcast Driver',
                    'cache_driver_label' => 'Cache Driver',
                    'cache_driver_placeholder' => 'Cache Driver',
                    'session_driver_label' => 'Session Driver',
                    'session_driver_placeholder' => 'Session Driver',
                    'session_lifetime_label' => 'Session Lifetime',
                    'session_lifetime_placeholder' => 'Session Lifetime',
                    'memcached_host_label' => 'Memcached Host',
                    'memcached_host_placeholder' => 'Memcached Host',
                    'queue_connection_label' => 'Queue Driver',
                    'queue_connection_placeholder' => 'Queue Driver',
                    'redis_label' => 'Redis Driver',
                    'redis_host_label' => 'Redis Host',
                    'redis_host_placeholder' => 'Redis Host',
                    'redis_password_label' => 'Redis Password',
                    'redis_password_placeholder' => 'Redis Password',
                    'redis_port_label' => 'Redis Port',
                    'redis_port_placeholder' => 'Redis Port',

                    'mail_label' => 'Mail',
                    'mail_driver_label' => 'Mail Driver',
                    'mail_driver_placeholder' => 'Mail Driver',
                    'mail_host_label' => 'Mail Host',
                    'mail_host_placeholder' => 'Mail Host',
                    'mail_port_label' => 'Mail Port',
                    'mail_port_placeholder' => 'Mail Port',
                    'mail_username_label' => 'Mail Username',
                    'mail_username_placeholder' => 'Mail Username',
                    'mail_password_label' => 'Mail Password',
                    'mail_password_placeholder' => 'Mail Password',
                    'mail_encryption_label' => 'Mail Encryption',
                    'mail_encryption_placeholder' => 'Mail Encryption',
                    'mail_from_address_label' => 'Mail from address',
                    'mail_from_address_placeholder' => 'Mail from address',
                    'mail_from_name_label' => 'Mail from name',
                    'mail_from_name_placeholder' => 'Mail from name',

                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_placeholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_placeholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_placeholder' => 'Pusher App Secret',
                    'pusher_app_cluster_label' => 'Pusher App Cluster',
                    'pusher_app_cluster_placeholder' => 'Pusher App Cluster',

                    'aws_label' => 'AWS credentials',
                    'aws_access_key_id_label' => 'AWS access key ID',
                    'aws_access_key_id_placeholder' => 'AWS access key ID',
                    'aws_secret_access_key_label' => 'AWS secret access key',
                    'aws_secret_access_key_placeholder' => 'AWS secret access key',
                    'aws_default_region_label' => 'AWS default region',
                    'aws_default_region_placeholder' => 'AWS default region',
                    'aws_bucket_label' => 'AWS bucket',
                    'aws_bucket_placeholder' => 'AWS bucket',

                    'channels' => [
                        'custom' => 'custom - A driver that calls a specified factory to create a channel',
                        'daily' => 'daily - A RotatingFileHandler based Monolog driver which rotates daily',
                        'errorlog' => 'errorlog - A ErrorLogHandler based Monolog driver',
                        'monolog' => 'monolog - A Monolog factory driver that may use any supported Monolog handler',
                        'null' => 'null - A driver that discards all log messages',
                        'papertrail' => 'papertrail - A SyslogUdpHandler based Monolog driver',
                        'single' => 'single - A single file or path based logger channel (StreamHandler)',
                        'slack' => 'slack - A SlackWebhookHandler based Monolog driver',
                        'stack' => 'stack - A wrapper to facilitate creating "multi-channel" channels',
                        'syslog' => 'syslog - A SyslogHandler based Monolog driver',
                    ],

                    'drivers' => [
                        'pusher' => 'Pusher',
                        'ably' => 'Ably',
                        'redis' => 'Redis',
                        'log' => 'Log',
                        'null' => 'Not set (null)',
                        'apc' => 'APC',
                        'array' => 'Array',
                        'database' => 'Database',
                        'file' => 'File',
                        'memcached' => 'Memcached',
                        'dynamodb' => 'DynamoDB',
                        'octane' => 'Octane',
                        'cookie' => 'Cookie',
                        'sync' => 'Sync',
                        'beanstalkd' => 'Beanstalkd',
                        'sqs' => 'SQS',
                        'smtp' => 'SMTP',
                        'sendmail' => 'Sendmail',
                        'mailgun' => 'Mailgun',
                        'ses' => 'SES',
                        'postmark' => 'Postmark',
                    ],

                    'mail_encryption' => [
                        'tls' => 'TLS',
                        'ssl' => 'SSL',
                        'starttls' => 'STARTTLS',
                    ],

                    'pusher_clusters' => [
                        'mt1' => 'mt1 in N. Virginia',
                        'us2' => 'us2 in Ohio',
                        'us3' => 'us3 in Oregon',
                        'eu' => 'eu in Ireland',
                        'ap1' => 'ap1 in Singapore',
                        'ap2' => 'ap2 in Mumbai',
                        'ap3' => 'ap3 in Tokyo',
                        'ap4' => 'ap4 in Sydney',
                    ],

                    'aws_regions' => [
                        'us-east-2' => 'us-east-2 - US East (Ohio)',
                        'us-east-1' => 'us-east-1 - US East (N. Virginia)',
                        'us-west-1' => 'us-west-1 - US West (N. California)',
                        'us-west-2' => 'us-west-2 - US West (Oregon)',
                        'af-south-1' => 'af-south-1 - Africa (Cape Town)',
                        'ap-east-1' => 'ap-east-1 - Asia Pacific (Hong Kong)',
                        'ap-south-1' => 'ap-south-1 - Asia Pacific (Mumbai)',
                        'ap-northeast-3' => 'ap-northeast-3 - Asia Pacific (Osaka)',
                        'ap-northeast-2' => 'ap-northeast-2 - Asia Pacific (Seoul)',
                        'ap-southeast-1' => 'ap-southeast-1 - Asia Pacific (Singapore)',
                        'ap-southeast-2' => 'ap-southeast-2 - Asia Pacific (Sydney)',
                        'ap-northeast-1' => 'ap-northeast-1 - Asia Pacific (Tokyo)',
                        'ca-central-1' => 'ca-central-1 - Canada (Central)',
                        'eu-central-1' => 'eu-central-1 - Europe (Frankfurt)',
                        'eu-west-1' => 'eu-west-1 - Europe (Ireland)',
                        'eu-west-2' => 'eu-west-2 - Europe (London)',
                        'eu-south-1' => 'eu-south-1 - Europe (Milan)',
                        'eu-west-3' => 'eu-west-3 - Europe (Paris)',
                        'eu-north-1' => 'eu-north-1 - Europe (Stockholm)',
                        'me-south-1' => 'me-south-1 - Middle East (Bahrain)',
                        'sa-east-1' => 'sa-east-1 - South America (São Paulo)',
                    ]
                ],
                'buttons' => [
                    'setup_database' => 'Setup Database',
                    'setup_application' => 'Setup Application',
                    'install' => 'Install',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Step 3 | Environment Settings | Classic Editor',
            'title' => 'Classic Environment Editor',
            'save' => 'Save .env',
            'back' => 'Use Form Wizard',
            'install' => 'Save and Install',
        ],
        'success' => 'Your .env file settings have been saved.',
        'errors' => 'Unable to save the .env file, Please create it manually.',
    ],

    'install' => 'Install',

    /*
     * Installed Log translations.
     */
    'installed' => [
        'success_log_message' => 'Laravel Installer successfully INSTALLED on ',
        'already_installed_message' => 'Application already installed',
    ],

    /*
     * Final page translations.
     */
    'final' => [
        'title' => 'Installation Finished',
        'templateTitle' => 'Installation Finished',
        'finished' => 'Application has been successfully installed.',
        'migration' => 'Migration &amp; Seed Console Output:',
        'console' => 'Application Console Output:',
        'log' => 'Installation Log Entry:',
        'env' => 'Final .env File:',
        'create_account' => 'Create account',
        'exit' => 'Click here to exit',
    ],

    /**
     * Starter Kit translations.
     */
    'starter_kit' => [
        'title' => 'Starter Kit',
        'sub_title' => 'Which Laravel starter kit you want to use?',
        'inertia' => 'Inertia',
        'use_theme' => 'Use theme',
        'scaffolding_replaced' => ':scaffold scaffolding replaced successfully.',

        'log' => [
            'success_message' => 'Starter kid selected on ',
        ],
    ],

    /**
     * Create account translations.
     */
    'create_account' => [
        'title' => 'Create account'
    ],

    /*
     * Update specific translations
     */
    'updater' => [
        /*
         * Shared translations.
         */
        'title' => 'Laravel Updater',

        /*
         * Welcome page translations for update feature.
         */
        'welcome' => [
            'title'   => 'Welcome To The Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /*
         * Welcome page translations for update feature.
         */
        'overview' => [
            'title'   => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => 'Install Updates',
        ],

        /*
         * Final page translations.
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'Laravel Installer successfully UPDATED on ',
        ],
    ],
];
