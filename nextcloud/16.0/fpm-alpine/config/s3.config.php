<?php
if (getenv('S3_ACCESS_KEY')
    && getenv('S3_SECRET_KEY')
    && getenv('S3_BUCKETNAME')) {
    $CONFIG = [
        "objectstore" => [
            "class" => '\\OC\\Files\\ObjectStore\\S3',
            "arguments" => (function () {
                $arguments = [
                    "bucket" => getenv('S3_BUCKETNAME'),
                    "key" => getenv('S3_ACCESS_KEY'),
                    "secret" => getenv('S3_SECRET_KEY'),
                ];

                if (is_string(getenv('S3_AUTOCREATE'))) {
                    $arguments["autocreate"] = !!getenv('S3_AUTOCREATE');
                }

                if (getenv('S3_HOST')) {
                    $arguments["hostname"] = getenv('S3_HOST');
                }

                if (getenv('S3_PORT')) {
                    $arguments["port"] = getenv('S3_PORT');
                }

                if (is_string(getenv('S3_USE_SSL'))) {
                    $arguments["use_ssl"] = !!getenv('S3_USE_SSL');
                }

                if (getenv('S3_REGION')) {
                    $arguments["region"] = getenv('S3_REGION');
                }

                if (is_string(getenv('S3_USE_PATH_STYLE'))) {
                    $arguments["use_path_style"] = !!getenv('S3_USE_PATH_STYLE');
                }

                return $arguments;
            })(),
        ]
    ];

}

