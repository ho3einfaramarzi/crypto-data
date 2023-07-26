# crypto-data
All Crypto Data In One Package with coincap api

## Install

```bash
> composer require ho3einfaramarzi/crypto-data --ignore-platform-reqs
```
## Requirements

The following versions of PHP are supported by this version.

* PHP 7.4

## Example Usage

```php
//coinocap.io api
$apikey='xxxxxxxxxxxxxx';
$cryptodata=new cryptoata();
var_dump($cryptodata->GetAssets($apikey));
