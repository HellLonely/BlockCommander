<?php

namespace File;

if (!interface_exists('File\File')) {
    interface File {
        const BASIC_FILES = array (
            'banned-ips.json',
            'banned-players.json',
            'ops.json',
            'eula.txt',
            'server.properties',
            'usercache.json',
            'usernamecache.json',
            'whitelist.json'
        );

        const DATA_FOLDER = 'minecraft-data';
    }
}
