#!/usr/bin/php
<?php
/**
 * Usage:
 *  tail -f /var/log/nginx/access.log | awk '{print $12,$8}' | php pl.php ns &
 *
 * This will output content to /dev/shm/ns_{$domain}
 */
const PATH = '/dev/shm/';
const DEFAULT_NS = 'ns';

$ns = $argc > 1 ? $argv[1] : DEFAULT_NS;
$file = PATH . $ns;

$data = [];

while (!feof(STDIN)) {
    $line = fgets(STDIN);
    $ds = str_replace("\n", '', $line);
    $dss = explode(' ', $ds);
    $domain = $dss[0];
    $status_code = $dss[1];

    $domains = explode('.', $domain);
    $domains = array_slice($domains, -2);
    $main_domain = implode('.', $domains);

    if ($domain == '-') {
        continue;
    }

    if($status_code == ''){
        continue;
    }

    $fn = $file . '-' . $main_domain;
    if(!isset($data[$main_domain])) {
        if (file_exists($fn)) {
            $data[$main_domain] = json_decode(file_get_contents($fn), true);
        }else{
            $data[$main_domain] = [];
        }
    }else{
        $domain_data = $data[$main_domain];
    }

    if (!isset($data[$main_domain][$status_code])) {
        $data[$main_domain][$status_code] = 0;
    }
    $data[$main_domain][$status_code] = $data[$main_domain][$status_code] + 1;
    file_put_contents($fn, json_encode($data[$main_domain], JSON_UNESCAPED_UNICODE));
}