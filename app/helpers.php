<?php

function copyright($start) {
    $year = date("Y");

    if($year === $start) {
        return $year;
    } else {
        return $start . ' – ' . $year;
    }
}

function free_space() {
    $bytes = disk_free_space(base_path());
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    //echo $bytes . '<br />';
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
}

function total_space() {
    $bytes = disk_total_space(base_path());
    $prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($prefix) - 1);
    //echo $bytes . '<br />';
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $prefix[$class];
}

function use_space() {
    $bytes = disk_total_space(base_path()) - disk_free_space(base_path());
    $prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($prefix) - 1);
    //echo $bytes . '<br />';
    return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $prefix[$class];
}

function space($bytes) {
    $prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($prefix) - 1);

    return sprintf('%1.2f' , $bytes / pow($base,$class));
}

function convert($size)
{
    $unit=array('B', 'KB','MB','GB','TB','PB');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

function convertValue($size)
{
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2);
}

function getServerMemoryUsage($getPercentage=true)
{
    $memoryTotal = null;
    $memoryFree = null;

    if (stristr(PHP_OS, "win")) {
        // Get total physical memory (this is in bytes)
        $cmd = "wmic ComputerSystem get TotalPhysicalMemory";
        @exec($cmd, $outputTotalPhysicalMemory);

        // Get free physical memory (this is in kibibytes!)
        $cmd = "wmic OS get FreePhysicalMemory";
        @exec($cmd, $outputFreePhysicalMemory);

        if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
            // Find total value
            foreach ($outputTotalPhysicalMemory as $line) {
                if ($line && preg_match("/^[0-9]+\$/", $line)) {
                    $memoryTotal = $line;
                    break;
                }
            }

            // Find free value
            foreach ($outputFreePhysicalMemory as $line) {
                if ($line && preg_match("/^[0-9]+\$/", $line)) {
                    $memoryFree = $line;
                    $memoryFree *= 1024;  // convert from kibibytes to bytes
                    break;
                }
            }
        }
    }
    else
    {
        if (is_readable("/proc/meminfo"))
        {
            $stats = @file_get_contents("/proc/meminfo");

            if ($stats !== false) {
                // Separate lines
                $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                $stats = explode("\n", $stats);

                // Separate values and find correct lines for total and free mem
                foreach ($stats as $statLine) {
                    $statLineData = explode(":", trim($statLine));

                    //
                    // Extract size (TODO: It seems that (at least) the two values for total and free memory have the unit "kB" always. Is this correct?
                    //

                    // Total memory
                    if (count($statLineData) == 2 && trim($statLineData[0]) == "MemTotal") {
                        $memoryTotal = trim($statLineData[1]);
                        $memoryTotal = explode(" ", $memoryTotal);
                        $memoryTotal = $memoryTotal[0];
                        $memoryTotal *= 1024;  // convert from kibibytes to bytes
                    }

                    // Free memory
                    if (count($statLineData) == 2 && trim($statLineData[0]) == "MemFree") {
                        $memoryFree = trim($statLineData[1]);
                        $memoryFree = explode(" ", $memoryFree);
                        $memoryFree = $memoryFree[0];
                        $memoryFree *= 1024;  // convert from kibibytes to bytes
                    }
                }
            }
        }
    }

    if (is_null($memoryTotal) || is_null($memoryFree)) {
        return null;
    } else {
        if ($getPercentage) {
            return round(100 - ($memoryFree * 100 / $memoryTotal), 2);
        } else {
            return array(
                "total" => $memoryTotal,
                "free" => $memoryFree,
            );
        }
    }
}

function getNiceFileSize($bytes, $binaryPrefix=true) {
    if ($binaryPrefix) {
        $unit=array('B','KiB','MiB','GiB','TiB','PiB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    } else {
        $unit=array('B','KB','MB','GB','TB','PB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    }
}

function memory($bytes, $binaryPrefix=true) {
    if ($binaryPrefix) {
        $unit=array('B','KiB','MiB','GiB','TiB','PiB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2);
    } else {
        $unit=array('B','KB','MB','GB','TB','PB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2);
    }
}

function backpack_pro_version() {
    if (backpack_pro() === false) {
        return 'Not installed';
    } else {
        return backpack_pro();
    }
}

function getOS() {
    $oses = [
        'iPhone' => '(iPhone)',
        'Windows 3.11' => 'Win16',
        'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
        'Windows 98' => '(Windows 98)|(Win98)',
        'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
        'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
        'Windows 2003' => '(Windows NT 5.2)',
        'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
        'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
        'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)',
        'Windows ME' => 'Windows ME',
        'Windows 10' => '(Windows NT 10.0)|(Windows 10)',
        'Windows 11' => '(Windows NT 11.0)|(Windows 11)',
        'Open BSD'=>'OpenBSD',
        'Sun OS'=>'SunOS',
        'Linux'=>'(Linux)|(X11)',
        'Safari' => '(Safari)',
        'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
        'QNX'=>'QNX',
        'BeOS'=>'BeOS',
        'OS/2'=>'OS/2',
        'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
    ];
    foreach($oses as $os => $pattern){
        if(preg_match('/' . $pattern . '/', $_SERVER['HTTP_USER_AGENT'])) {
            return $os;
        }
    }
    return 'Unknown';
}
