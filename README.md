# official.fm

PHP Wrapper for the [official.fm Simple API](http://official.fm/developers).

## Installation

Click the `download` link above or `git clone git://github.com/officialfm/curl.git`

## Get your API key

Be sure and get your API key: [http://official.fm/developers/manage](http://official.fm/developers/manage)

## Usage

### Include the relevant files

  require_once 'officialfm.php';

### Instantiate a client
  
  $officialfm = new OfficialFM('your_api_key');
  
#### Examples

  $officialfm.user('chab');
  
  

## Copyright

Copyright (c) 2011 Amos Wenger. See LICENSE for details.
