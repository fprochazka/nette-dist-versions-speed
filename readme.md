# Benchmark of Nette Framework autoloading techniques

```
$ php -v
PHP 5.4.13 (cli) (built: Mar 20 2013 14:39:24) 
Copyright (c) 1997-2013 The PHP Group
Zend Engine v2.4.0, Copyright (c) 1998-2013 Zend Technologies
    with Xdebug v2.2.1, Copyright (c) 2002-2012, by Derick Rethans
```

```
$ nginx -v
nginx version: nginx/0.8.54
```

Apache Benchmark results for different autoloading mechanisms with and without opcode cache.


## Composer clean / `7.625 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Document Path:          /testing/nette-dist-versions-speed/composer/www/
Document Length:        10 bytes

Concurrency Level:      40
Time taken for tests:   76.251 seconds
Complete requests:      10000
Failed requests:        8002 (Connect: 0, Receive: 0, Length: 8002, Exceptions: 0)
Write errors:           0
Total transferred:      1738002 bytes
HTML transferred:       108002 bytes
Requests per second:    131.15 [#/sec] (mean)
Time per request:       305.005 [ms] (mean)
Time per request:       7.625 [ms] (mean, across all concurrent requests)
Transfer rate:          22.26 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:    15  304 180.9    304     945
Waiting:       15  304 181.0    304     945
Total:         15  305 180.9    304     946

Percentage of the requests served within a certain time (ms)
  50%    304
  66%    389
  75%    433
  80%    463
  90%    537
  95%    614
  98%    692
  99%    750
 100%    946 (longest request
```


## Minified Nette clean / `2.349 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Document Path:          /testing/nette-dist-versions-speed/nette.min/www/
Document Length:        9 bytes

Concurrency Level:      40
Time taken for tests:   23.490 seconds
Complete requests:      10000
Failed requests:        991 (Connect: 0, Receive: 0, Length: 991, Exceptions: 0)
Write errors:           0
Total transferred:      1721093 bytes
HTML transferred:       91093 bytes
Requests per second:    425.72 [#/sec] (mean)
Time per request:       93.959 [ms] (mean)
Time per request:       2.349 [ms] (mean, across all concurrent requests)
Transfer rate:          71.55 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     4   94  55.7     84     374
Waiting:        4   94  55.7     84     373
Total:          4   94  55.7     84     374

Percentage of the requests served within a certain time (ms)
  50%     84
  66%    110
  75%    128
  80%    140
  90%    171
  95%    199
  98%    234
  99%    255
 100%    374 (longest request)
```

## Composer with Zend Optimizer+ v7.0.0-dev / `8.299 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Document Path:          /testing/nette-dist-versions-speed/composer/www/
Document Length:        10 bytes

Concurrency Level:      40
Time taken for tests:   82.987 seconds
Complete requests:      10000
Failed requests:        8426 (Connect: 0, Receive: 0, Length: 8426, Exceptions: 0)
Write errors:           0
Total transferred:      1738428 bytes
HTML transferred:       108428 bytes
Requests per second:    120.50 [#/sec] (mean)
Time per request:       331.948 [ms] (mean)
Time per request:       8.299 [ms] (mean, across all concurrent requests)
Transfer rate:          20.46 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:    15  332 185.8    326    1219
Waiting:       15  331 185.8    326    1219
Total:         16  332 185.8    326    1219

Percentage of the requests served within a certain time (ms)
  50%    326
  66%    410
  75%    461
  80%    493
  90%    577
  95%    644
  98%    730
  99%    793
 100%   1219 (longest request)
```


## Minified Nette with Zend Optimizer+ v7.0.0-dev / `2.592 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Document Path:          /testing/nette-dist-versions-speed/nette.min/www/
Document Length:        9 bytes

Concurrency Level:      40
Time taken for tests:   25.919 seconds
Complete requests:      10000
Failed requests:        1032 (Connect: 0, Receive: 0, Length: 1032, Exceptions: 0)
Write errors:           0
Total transferred:      1721167 bytes
HTML transferred:       91167 bytes
Requests per second:    385.81 [#/sec] (mean)
Time per request:       103.677 [ms] (mean)
Time per request:       2.592 [ms] (mean, across all concurrent requests)
Transfer rate:          64.85 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     5  103  68.0     91     446
Waiting:        5  103  67.9     91     445
Total:          5  103  68.0     91     446

Percentage of the requests served within a certain time (ms)
  50%     91
  66%    126
  75%    148
  80%    162
  90%    198
  95%    230
  98%    264
  99%    288
 100%    446 (longest request)
```


## Composer with APC 3.1.13 / `7.353 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/composer/www/

Document Path:          /testing/nette-dist-versions-speed/composer/www/
Document Length:        10 bytes

Concurrency Level:      40
Time taken for tests:   73.527 seconds
Complete requests:      10000
Failed requests:        7816 (Connect: 0, Receive: 0, Length: 7816, Exceptions: 0)
Write errors:           0
Total transferred:      1737816 bytes
HTML transferred:       107816 bytes
Requests per second:    136.00 [#/sec] (mean)
Time per request:       294.107 [ms] (mean)
Time per request:       7.353 [ms] (mean, across all concurrent requests)
Transfer rate:          23.08 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       4
Processing:    15  294 174.4    287     948
Waiting:       15  293 174.4    287     948
Total:         15  294 174.4    287     948

Percentage of the requests served within a certain time (ms)
  50%    287
  66%    362
  75%    412
  80%    445
  90%    536
  95%    596
  98%    671
  99%    722
 100%    948 (longest request)
```


## Minified Nette with APC 3.1.13 / `2.148 [ms]`

```
$ ab -n 10000 -c 40 http://dev.l/testing/nette-dist-versions-speed/nette.min/www/

Document Path:          /testing/nette-dist-versions-speed/nette.min/www/
Document Length:        9 bytes

Concurrency Level:      40
Time taken for tests:   21.483 seconds
Complete requests:      10000
Failed requests:        967 (Connect: 0, Receive: 0, Length: 967, Exceptions: 0)
Write errors:           0
Total transferred:      1721030 bytes
HTML transferred:       91030 bytes
Requests per second:    465.48 [#/sec] (mean)
Time per request:       85.932 [ms] (mean)
Time per request:       2.148 [ms] (mean, across all concurrent requests)
Transfer rate:          78.23 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.3      0       5
Processing:     5   86  53.3     77     353
Waiting:        5   86  53.3     77     353
Total:          5   86  53.3     77     353

Percentage of the requests served within a certain time (ms)
  50%     77
  66%    104
  75%    122
  80%    133
  90%    160
  95%    183
  98%    209
  99%    233
 100%    353 (longest request)
```
