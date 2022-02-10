<?php

return [
    "asterisk_config" => [
        "auth_type" => "userpass",
        "direct_media" => "yes",
        "allow" => "ulaw;alaw;h264",
        "disallow" => "all",
        "webrtc" => "yes",
        "udp_transport" => "transport-udp",
        "main_context" => "main",
    ]
];

?>