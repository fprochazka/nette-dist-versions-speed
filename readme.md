# Benchmark of Nette Framework autoloading techniques

```
$ php -v
PHP 5.4.13 (cli) (built: Mar 20 2013 14:39:24) 
Copyright (c) 1997-2013 The PHP Group
Zend Engine v2.4.0, Copyright (c) 1998-2013 Zend Technologies
```

```
$ nginx -v
nginx version: nginx/0.8.54
```

Apache Benchmark results for different autoloading mechanisms with and without opcode cache.


```
[apc]
```

```
[opcache]
opcache.enable = 1
opcache.memory_consumption = 300
opcache.interned_strings_buffer = 8
opcache.max_accelerated_files = 8000
opcache.fast_shutdown = 1
opcache.enable_cli = 1
opcache.use_cwd = 0
opcache.validate_timestamps = 1
```


Fun fact: according to nginx logs, every single request returned status code 200, but `ab` disagrees.


## Composer clean / 36.994 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Time taken for tests:   369.937 seconds
Complete requests:      10000
Failed requests:        6853 (Connect: 0, Receive: 0, Length: 6853, Exceptions: 0)
Write errors:           0
Total transferred:      1753118 bytes
HTML transferred:       123118 bytes
Requests per second:    27.03 [#/sec] (mean)
Time per request:       1479.746 [ms] (mean)
Time per request:       36.994 [ms] (mean, across all concurrent requests)
Transfer rate:          4.63 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:    82 1478 802.0   1614    3822
Waiting:       82 1478 802.0   1614    3822
Total:         82 1479 802.0   1614    3822

Percentage of the requests served within a certain time (ms)
  50%   1614
  66%   1932
  75%   2103
  80%   2200
  90%   2456
  95%   2652
  98%   2871
  99%   3018
 100%   3822 (longest request)
```


## Minified Nette clean / 27.935 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Time taken for tests:   279.349 seconds
Complete requests:      10000
Failed requests:        300 (Connect: 0, Receive: 0, Length: 300, Exceptions: 0)
Write errors:           0
Total transferred:      1720406 bytes
HTML transferred:       90406 bytes
Requests per second:    35.80 [#/sec] (mean)
Time per request:       1117.397 [ms] (mean)
Time per request:       27.935 [ms] (mean, across all concurrent requests)
Transfer rate:          6.01 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       2
Processing:    63 1116 614.4   1207    2808
Waiting:       63 1116 614.4   1207    2808
Total:         63 1116 614.4   1207    2808

Percentage of the requests served within a certain time (ms)
  50%   1207
  66%   1480
  75%   1607
  80%   1685
  90%   1877
  95%   2022
  98%   2177
  99%   2265
 100%   2808 (longest request)
```


## Composer `dump-autoload --optimize` clean / 34.535 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer.optimized/www/
Time taken for tests:   345.350 seconds
Complete requests:      10000
Failed requests:        9788 (Connect: 0, Receive: 0, Length: 9788, Exceptions: 0)
Write errors:           0
Total transferred:      1752406 bytes
HTML transferred:       122406 bytes
Requests per second:    28.96 [#/sec] (mean)
Time per request:       1381.402 [ms] (mean)
Time per request:       34.535 [ms] (mean, across all concurrent requests)
Transfer rate:          4.96 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:    78 1380 737.2   1487    3525
Waiting:       78 1380 737.2   1487    3525
Total:         78 1380 737.2   1488    3526

Percentage of the requests served within a certain time (ms)
  50%   1488
  66%   1783
  75%   1940
  80%   2028
  90%   2260
  95%   2487
  98%   2769
  99%   2923
 100%   3526 (longest request)

```



## Composer with Zend OPcache v7.0.1 / 4.780 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Time taken for tests:   47.799 seconds
Complete requests:      10000
Failed requests:        5889 (Connect: 0, Receive: 0, Length: 5889, Exceptions: 0)
Write errors:           0
Total transferred:      1735775 bytes
HTML transferred:       105775 bytes
Requests per second:    209.21 [#/sec] (mean)
Time per request:       191.195 [ms] (mean)
Time per request:       4.780 [ms] (mean, across all concurrent requests)
Transfer rate:          35.46 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:     9  191 130.2    168     855
Waiting:        9  191 130.2    168     855
Total:          9  191 130.2    168     855

Percentage of the requests served within a certain time (ms)
  50%    168
  66%    227
  75%    268
  80%    297
  90%    374
  95%    442
  98%    510
  99%    565
 100%    855 (longest request)
```


## Minified Nette with Zend OPcache v7.0.1 / 2.189 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Time taken for tests:   21.890 seconds
Complete requests:      10000
Failed requests:        423 (Connect: 0, Receive: 0, Length: 423, Exceptions: 0)
Write errors:           0
Total transferred:      1720479 bytes
HTML transferred:       90479 bytes
Requests per second:    456.82 [#/sec] (mean)
Time per request:       87.562 [ms] (mean)
Time per request:       2.189 [ms] (mean, across all concurrent requests)
Transfer rate:          76.75 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.3      0      11
Processing:     4   87  73.5     68     554
Waiting:        4   87  73.5     68     554
Total:          5   87  73.5     68     554

Percentage of the requests served within a certain time (ms)
  50%     68
  66%    103
  75%    128
  80%    143
  90%    190
  95%    226
  98%    279
  99%    321
 100%    554 (longest request)
```

## Composer `dump-autoload --optimize` with Zend OPcache v7.0.1 / 2.518 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer.optimized/www/

Time taken for tests:   25.176 seconds
Complete requests:      10000
Failed requests:        4841
   (Connect: 0, Receive: 0, Length: 4841, Exceptions: 0)
Write errors:           0
Total transferred:      1729509 bytes
HTML transferred:       99509 bytes
Requests per second:    397.20 [#/sec] (mean)
Time per request:       100.705 [ms] (mean)
Time per request:       2.518 [ms] (mean, across all concurrent requests)
Transfer rate:          67.09 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:     5  100  73.8     86     543
Waiting:        5  100  73.8     86     543
Total:          5  101  73.8     86     543

Percentage of the requests served within a certain time (ms)
  50%     86
  66%    111
  75%    134
  80%    152
  90%    200
  95%    247
  98%    304
  99%    335
 100%    543 (longest request)
```


## Composer with APC 3.1.13 / 7.427 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Time taken for tests:   74.270 seconds
Complete requests:      10000
Failed requests:        7413 (Connect: 0, Receive: 0, Length: 7413, Exceptions: 0)
Write errors:           0
Total transferred:      1737415 bytes
HTML transferred:       107415 bytes
Requests per second:    134.64 [#/sec] (mean)
Time per request:       297.081 [ms] (mean)
Time per request:       7.427 [ms] (mean, across all concurrent requests)
Transfer rate:          22.84 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:    18  297 178.7    286    1128
Waiting:       18  296 178.6    286    1128
Total:         18  297 178.6    286    1128

Percentage of the requests served within a certain time (ms)
  50%    286
  66%    359
  75%    413
  80%    448
  90%    534
  95%    610
  98%    707
  99%    776
 100%   1128 (longest request)
```


## Minified Nette with APC 3.1.13 / 2.508 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Time taken for tests:   25.078 seconds
Complete requests:      10000
Failed requests:        410 (Connect: 0, Receive: 0, Length: 410, Exceptions: 0)
Write errors:           0
Total transferred:      1720467 bytes
HTML transferred:       90467 bytes
Requests per second:    398.75 [#/sec] (mean)
Time per request:       100.313 [ms] (mean)
Time per request:       2.508 [ms] (mean, across all concurrent requests)
Transfer rate:          67.00 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.3      0       4
Processing:     5  100 120.7     69    1819
Waiting:        5  100 120.7     69    1819
Total:          5  100 120.8     69    1822

Percentage of the requests served within a certain time (ms)
  50%     69
  66%    109
  75%    138
  80%    159
  90%    220
  95%    268
  98%    332
  99%    403
 100%   1822 (longest request)
```

## Composer `dump-autoload --optimize` with APC 3.1.13 / 3.782 ms

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer.optimized/www/

Time taken for tests:   37.824 seconds
Complete requests:      10000
Failed requests:        9299
   (Connect: 0, Receive: 0, Length: 9299, Exceptions: 0)
Write errors:           0
Total transferred:      1733201 bytes
HTML transferred:       103201 bytes
Requests per second:    264.38 [#/sec] (mean)
Time per request:       151.298 [ms] (mean)
Time per request:       3.782 [ms] (mean, across all concurrent requests)
Transfer rate:          44.75 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       5
Processing:     8  151 105.9    132     732
Waiting:        8  151 105.9    132     732
Total:          8  151 105.9    132     732

Percentage of the requests served within a certain time (ms)
  50%    132
  66%    174
  75%    209
  80%    229
  90%    293
  95%    362
  98%    429
  99%    476
 100%    732 (longest request)
```
