<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shared translations
    |--------------------------------------------------------------------------
    |
    */
    'title' => 'Установка Laravel',
    'next' => 'Следующий шаг',
    'back' => 'Предыдущий шаг',
    'finish' => 'Установить',
    'ignore' => 'Игнорировать и следующий шаг',
    'go_to_homepage' => 'Вернуться на домашнюю страницу',
    'forms' => [
        'errorTitle' => 'Произошли следующие ошибки:',
    ],

    /*
    |--------------------------------------------------------------------------
    | Home page translations
    |--------------------------------------------------------------------------
    |
    */
    'welcome' => [
        'templateTitle' => 'Добро пожаловать',
        'title'   => 'Установка Laravel',
        'message' => 'Добро пожаловать в первоначальную настройку фреймворка Laravel',
        'next'    => 'Проверить необходимые модули',
        'skipAndInstall' => 'Установить немедленно'
    ],

    /*
    |--------------------------------------------------------------------------
    | Requirements page translations
    |--------------------------------------------------------------------------
    |
    */
    'requirements' => [
        'templateTitle' => 'Шаг 1 | Требования к серверу',
        'title' => 'Необходимые модули',
        'next'    => 'Проверка прав на папках',
        'errorMessage' => 'Требования не выполнены'
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions page translations
    |--------------------------------------------------------------------------
    |
    */
    'permissions' => [
        'templateTitle' => 'Шаг 2 | Проверка прав на папках',
        'title' => 'Проверка прав на папках',
        'next' => 'Настройки среды',
        'errorMessage' => 'Недостаточно прав для папок'
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment page translations
    |--------------------------------------------------------------------------
    |
    */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Шаг 3 | Настройки среды',
            'title' => 'Настройки среды',
            'desc' => 'Выберите, как вы хотите настроить файл <code>.env</code>.',
            'wizard-button' => 'Мастера форм',
            'classic-button' => 'Редактор текста',
        ],
        'wizard' => [
            'templateTitle' => 'Шаг 3 | Настройки среды | Управляемый мастер',
            'title' => 'Управляемый <code>.env</code> Мастер',
            'tabs' => [
                'environment' => 'Окружение',
                'database' => 'База данных',
                'application' => 'Приложение',
            ],
            'form' => [
                'name_required' => 'Требуется имя среды.',
                'app_name_label' => 'Имя приложения',
                'app_name_placeholder' => 'Имя приложения',
                'app_environment_label' => 'Окружение приложения',
                'app_environment_label_local' => 'Локальное',
                'app_environment_label_development' => 'Разработочное',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Продакшн',
                'app_environment_label_other' => 'Другое',
                'app_environment_placeholder_other' => 'Введите свое окружение...',
                'app_debug_label' => 'Дебаг приложения',
                'app_debug_label_true' => 'Да',
                'app_debug_label_false' => 'Нет',
                'log_level_label' => 'Уровень журнала логирования',
                'log_level_label_debug' => 'debug',
                'log_level_label_info' => 'info',
                'log_level_label_notice' => 'notice',
                'log_level_label_warning' => 'warning',
                'log_level_label_error' => 'error',
                'log_level_label_critical' => 'critical',
                'log_level_label_alert' => 'alert',
                'log_level_label_emergency' => 'emergency',
                'log_channel_label' => 'Канал журнала приложений',
                'log_channel_placeholder' => 'Канал журнала приложений',
                'app_url_label' => 'URL приложения',
                'app_url_placeholder' => 'URL приложения',
                'db_create_if_not_exists' => 'Создайте базу данных, если не существует',
                'db_connection_failed' => 'Не удалось подключиться к базе данных.',
                'db_connection_label' => 'Подключение к базе данных',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Хост базы данных',
                'db_host_placeholder' => 'Хост базы данных',
                'db_port_label' => 'Порт базы данных',
                'db_port_placeholder' => 'Порт базы данных',
                'db_name_label' => 'Название базы данных',
                'db_name_placeholder' => 'Название базы данных',
                'db_username_label' => 'Имя пользователя базы данныхe',
                'db_username_placeholder' => 'Имя пользователя базы данных',
                'db_password_label' => 'Пароль базы данных',
                'db_password_placeholder' => 'Пароль базы данных',

                'app_tabs' => [
                    'more_info' => 'Больше информации',
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
                        'custom' => 'custom - Драйвер, который вызывает указанную фабрику для создания канала',
                        'daily' => 'daily - Драйвер Monolog на основе RotatingFileHandler, который ежедневно меняет',
                        'errorlog' => 'errorlog - Драйвер Monolog на основе ErrorLogHandler',
                        'monolog' => 'monolog - Драйвер Monolog factory, который может использовать любой поддерживаемый обработчик Monolog.',
                        'null' => 'null - Драйвер, который отбрасывает все сообщения журнала',
                        'papertrail' => 'papertrail - Драйвер Monolog на основе SyslogUdpHandler',
                        'single' => 'single - Канал регистратора на основе одного файла или пути (StreamHandler)',
                        'slack' => 'slack - Драйвер Monolog на основе SlackWebhookHandler',
                        'stack' => 'stack - Обертка для облегчения создания «многоканальных» каналов.',
                        'syslog' => 'syslog - Драйвер Monolog на основе SyslogHandler',
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
                        'mt1' => 'mt1 в Северной Вирджинии',
                        'us2' => 'us2 в Огайо',
                        'us3' => 'us3 в Орегоне',
                        'eu' => 'eu в Ирландии',
                        'ap1' => 'ap1 в Сингапуре',
                        'ap2' => 'ap2 в Мумбаи',
                        'ap3' => 'ap3 в Токио',
                        'ap4' => 'ap4 в Сиднее',
                    ],

                    'aws_regions' => [
                        'us-east-2' => 'us-east-2 - Восток США (Огайо)',
                        'us-east-1' => 'us-east-1 - Восток США (Северная Вирджиния)',
                        'us-west-1' => 'us-west-1 - Запад США (Северная Калифорния)',
                        'us-west-2' => 'us-west-2 - Запад США (Орегон)',
                        'af-south-1' => 'af-south-1 - Африка (Кейптаун)',
                        'ap-east-1' => 'ap-east-1 - Азиатско-Тихоокеанский регион (Гонконг)',
                        'ap-south-1' => 'ap-south-1 - Азиатско-Тихоокеанский регион (Мумбаи)',
                        'ap-northeast-3' => 'ap-northeast-3 - Азиатско-Тихоокеанский регион (Осака)',
                        'ap-northeast-2' => 'ap-northeast-2 - Азиатско-Тихоокеанский регион (Сеул)',
                        'ap-southeast-1' => 'ap-southeast-1 - Азиатско-Тихоокеанский регион (Сингапур)',
                        'ap-southeast-2' => 'ap-southeast-2 - Азиатско-Тихоокеанский регион (Сидней)',
                        'ap-northeast-1' => 'ap-northeast-1 - Азиатско-Тихоокеанский регион (Токио)',
                        'ca-central-1' => 'ca-central-1 - Канада (Центральная)',
                        'eu-central-1' => 'eu-central-1 - Европа (Франкфурт)',
                        'eu-west-1' => 'eu-west-1 - Европа (Ирландия)',
                        'eu-west-2' => 'eu-west-2 - Европа (Лондон)',
                        'eu-south-1' => 'eu-south-1 - Европа (Милан)',
                        'eu-west-3' => 'eu-west-3 - Европа (Париж)',
                        'eu-north-1' => 'eu-north-1 - Европа (Стокгольм)',
                        'me-south-1' => 'me-south-1 - Ближний Восток (Бахрейн)',
                        'sa-east-1' => 'sa-east-1 - Южная Америка (Сан-Паулу)',
                    ]
                ],
                'buttons' => [
                    'setup_database' => 'Настройка базы данных',
                    'setup_application' => 'Настройка приложения',
                    'install' => 'Установить',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Шаг 3 | Настройки среды | Классический редактор',
            'title' => 'Классический редактор среды',
            'save' => 'Сохранить .env',
            'back' => 'Использовать мастер форм',
            'install' => 'Сохранить и установить',
        ],
        'success' => 'Настройки успешно сохранены в файле .env',
        'errors'  => 'Произошла ошибка при сохранении файла .env, пожалуйста, сохраните его вручную',
    ],

    'install' => 'Установить',

    /*
    |--------------------------------------------------------------------------
    | Installed Log translations
    |--------------------------------------------------------------------------
    |
    */
    'installed' => [
        'success_log_message' => 'Laravel Installer successfully INSTALLED on ',
        'already_installed_message' => 'Application already installed',
    ],

    /*
    |--------------------------------------------------------------------------
    | Final page translations
    |--------------------------------------------------------------------------
    |
    */
    'final' => [
        'title' => 'Готово',
        'templateTitle' => 'Приложение успешно настроено.',
        'finished' => 'Приложение успешно настроено.',
        'migration' => 'Вывод консоли миграции и семени:',
        'command' => 'Вывод командной консоли:',
        'console' => 'Вывод консоли приложения:',
        'log' => 'Запись в журнале установки:',
        'env' => 'Окончательный файл .env:',
        'error' => 'ERROR',
        'exit' => 'Нажмите для выхода',
    ],

    /*
    |--------------------------------------------------------------------------
    | Starter Kit translations
    |--------------------------------------------------------------------------
    |
    */
    'starter_kit' => [
        'title' => 'Стартовый комплект',
        'sub_title' => 'Какой стартовый комплект Laravel вы хотите использовать?',
        'inertia' => 'Inertia',
        'use_theme' => 'Установить тему',
        'blank' => 'Чистый',
        'processing' => 'Обработка...',
        'read_more' => 'Читать далее',
        'scaffolding_replaced' => 'Строительные леса :scaffold успешно заменены.',

        'log' => [
            'success_message' => 'Стартовый комплект выбран на ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Update specific translations
    |--------------------------------------------------------------------------
    |
    */
    'updater' => [
        /*
        |--------------------------------------------------------------------------
        | Shared translations
        |--------------------------------------------------------------------------
        |
        */
        'title' => 'Обновление Laravel',

        /*
        |--------------------------------------------------------------------------
        | Welcome page translations for update feature
        |--------------------------------------------------------------------------
        |
        */
        'welcome' => [
            'title'   => 'Добро пожаловать в программу обновлений',
            'message' => 'Добро пожаловать в мастер обновления.',
        ],

        /*
        |--------------------------------------------------------------------------
        | Welcome page translations for update feature
        |--------------------------------------------------------------------------
        |
        */
        'overview' => [
            'title'   => 'Обзор',
            'message' => 'Имеется 1 обновление. | Есть обновления :number.',
            'install_updates' => 'Установить обновления',
        ],

        /*
        |--------------------------------------------------------------------------
        | Final page translations
        |--------------------------------------------------------------------------
        |
        */
        'final' => [
            'title' => 'Законченный',
            'finished' => 'База данных приложения успешно обновлена.',
            'exit' => 'Нажмите для выхода',
        ],

        'log' => [
            'success_message' => 'Установщик Laravel успешно ОБНОВЛЕН ',
        ],
    ],
];
