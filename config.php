<?php
# This file was automatically generated by the MediaWiki 1.40.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/MainConfigSchema.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if (!defined('MEDIAWIKI')) {
  exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "인포피디아";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.gistory.me";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
  '1x' => "https://avatars.githubusercontent.com/u/54899579?s=1024&v=4",
  'icon' => "https://avatars.githubusercontent.com/u/54899579?s=1024&v=4",
];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "";
$wgPasswordSender = "";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = getenv("DB_TYPE");
$wgDBserver = getenv("DB_SERVER");
$wgDBname = getenv("DB_NAME");
$wgDBuser = getenv("DB_USER");
$wgDBpassword = getenv("DB_PASSWORD");

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

# Site language code, should be one of the list in ./includes/languages/data/Names.php
$wgLanguageCode = "ko";

# Time zone
$wgLocaltimezone = "Asia/Seoul";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgSecretKey = getenv("WG_SECRET_KEY");

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = getenv("WG_UPGRADE_KEY");

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['read'] = false;
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgGroupPermissions['user']['read'] = false;
$wgGroupPermissions['user']['upload'] = false;
$wgGroupPermissions['emailconfirmed']['read'] = true;
$wgGroupPermissions['emailconfirmed']['upload'] = true;
$wgGroupPermissions['emailconfirmed']['writeapi'] = true;
$wgGroupPermissions['confirmed']['read'] = true;
$wgGroupPermissions['confirmed']['upload'] = true;
$wgGroupPermissions['confirmed']['writeapi'] = true;
$wgWhitelistRead = [
  '대문',
  'MediaWiki:Common.css',
  'MediaWiki:Common.js',
  // '특수:계정만들기',
  '특수:환경설정',
  '특수:이메일확인',
  # '특수:이메일바꾸기',
  '특수:OAuth2Client',
  '특수:OAuth2Client/redirect',
  '특수:OAuth2Client/callback',
];

$wgHooks["isValidEmailAddr"][] = function ($email, &$result) {
  $mailDomain = 'gistory.me';
  $result = (substr($email, -strlen($mailDomain)) == $mailDomain);
  return $result;
};

$wgEmailConfirmToEdit = true;
$wgAutopromote = [
  'emailconfirmed' => APCOND_EMAILCONFIRMED,
];

$wgSMTP = [
  'host' => getenv("MAIL_HOST"),
  'IDHost' => getenv("MAIL_ID_HOST"),
  'port' => 587,
  'auth' => true,
  'username' => getenv("MAIL_USERNAME"),
  'password' => getenv("MAIL_PASSWORD"),
];

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "citizen";
$wgDefaultMobileSkin = 'citizen';

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin('MinervaNeue');
wfLoadSkin('MonoBook');
wfLoadSkin('Timeless');
wfLoadSkin('Vector');
wfLoadSkin('Citizen');

# End of automatically generated settings.
# Add more configuration options below.

wfLoadExtension('Linter');
wfLoadExtension('Cite');
wfLoadExtension('CSS');
wfLoadExtension('Echo');
wfLoadExtension('VisualEditor');
wfLoadExtension('TemplateData');
wfLoadExtension('ParserFunctions');
wfLoadExtension('DiscussionTools');
wfLoadExtension('Gadgets');
wfLoadExtension('WikiEditor');
wfLoadExtension('CodeEditor');
wfLoadExtension('CodeMirror');
wfLoadExtension('MobileFrontend');

$PARSOID_INSTALL_DIR = 'vendor/wikimedia/parsoid';
wfLoadExtension('Parsoid', "$PARSOID_INSTALL_DIR/extension.json");

$wgVisualEditorAvailableNamespaces = [
  'Project' => true,
  'Template' => true,
];

$wgParsoidSettings = [
  'linting' => true
];

$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usecodemirror'] = true;

wfLoadExtension('AWS');

$wgAWSCredentials = [
  'key' => getenv('AWS_S3_ACCESS_KEY_ID'),
  'secret' => getenv('AWS_S3_SECRET_ACCESS_KEY'),
  'token' => false
];

$wgAWSRegion = 'ap-northeast-2';
$wgAWSBucketName = 'gsainfoteam-icarus-wiki-images';

wfLoadExtension('PluggableAuth');
wfLoadExtension('OpenIDConnect');

$wgPluggableAuth_Config[] = [
  'plugin' => 'OpenIDConnect',
  'data' => [
    'providerURL' => 'https://accounts.google.com',
    'clientID' => getenv('OAUTH_GOOGLE_ID'),
    'clientsecret' => getenv('OAUTH_GOOGLE_SECRET'),
    'scope' => ['openid', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'],
    'preferredUsernameProcessor' => static function ($name, $fields) {
      return str_replace('@gistory.me', '', $fields['email']);
    },
    'authparam' => [
      'hd' => 'gistory.me',
    ]
  ]
];

wfLoadExtension('UserMerge');
$wgGroupPermissions['sysop']['usermerge'] = true;
$wgRememberMe = 'always';

$wgExtendedLoginCookieExpiration = 180 * 24 * 60 * 60; // 180 days
$wgCookieExpiration = 30 * 24 * 60 * 60; // 30 days
$wgUsePrivateIPs = true;
$wgPasswordAttemptThrottle = [];
