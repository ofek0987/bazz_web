<?php

return [
    "schemas" => [
        "change_password" => [
            "username" => "required",
            "oldPassword" => "required",
            "newPassword" => "required",
        ],
        "store" => [
            "user.username" => "required|regex:/^[a-zA-Z0-9]*$/",
            "user.password" => "required",
        ],
        "search" => [
            "match.username" => "required",
        ],
    ],
];

?>