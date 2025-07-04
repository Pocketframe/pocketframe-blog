<?php

return [
  /**
   * Default cache driver
   *
   * The default cache driver is used to store data in the cache.
   * The available cache drivers are: "memory", "array", "database", "file", "memcached", "redis".
   * The default cache driver is "file".
   *
   * @var string
   */
  'driver' => env('CACHE_DRIVER', 'file'),


  /**
   * File cache configuration
   *
   * The file cache driver stores data in a file system.
   * The default path is "store/framework/cache".
   *
   * @var array
   */
  'file' => [
    'path' => storage_path('framework/cache'),
  ],


  /**
   * Redis cache configuration
   *
   * The redis cache driver stores data in a Redis database.
   * The default host is "127.0.0.1".
   * The default port is "6379".
   * The default database is "0".
   *
   * @var array
   */
  'redis' => [
    'host' => env('REDIS_HOST', '127.0.0.1'),
    'port' => env('REDIS_PORT', 6379),
    'password' => env('REDIS_PASSWORD', null),
    'database' => env('REDIS_DB', 0),
  ],

  /**
   * Memory cache configuration
   *
   * The memory cache driver stores data in memory.
   *
   * @var array
   */
  'memory' => [],

  /**
   * Array cache configuration
   *
   * The array cache driver stores data in an array.
   *
   * @var array
   */
  'array' => [],

  /**
   * Database cache configuration
   *
   * The database cache driver stores data in a database.
   *
   * @var array
   */
  'database' => [
    'connection' => env('CACHE_CONNECTION', 'default'),
    'table' => env('CACHE_TABLE', 'cache'),
  ],

  /**
   * Memcached cache configuration
   *
   * The memcached cache driver stores data in a memcached server.
   *
   * @var array
   */
  'memcached' => [
    'servers' => [
      '127.0.0.1:11211',
    ],
  ],

  /**
   * Encryption configuration
   *
   * The encryption configuration is used to encrypt the cache data.
   * The default key is a random 32-byte key.
   *
   * @var array
   */
  'encryption' => [
    'enabled' => env('CACHE_ENCRYPT', false),
    'key' => env('CACHE_KEY', 'base64:' . base64_encode(random_bytes(32))),
  ],
];
