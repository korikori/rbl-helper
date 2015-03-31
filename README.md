# rbl-helper
============
A web parser for SMTP authentication logs that will sort the unique IP addresses in a list that is suitable to import to your local RBL/firewall, and will check their reverse DNS records so that you don't end up blocking Google.

Depends:
 - PHP 5.3
 - Linux server to run the 'host' command, used in favor of PHP's gethostbyaddr, which is slow and just plain terrible
 
 The index.php file is the main parser, which prints out the list of IP addresses and performs the rDNS check simultaneously. There is a link to slow.php, which performs the same actions, but in two steps - this can be handy when importing a huge log excerpt.
