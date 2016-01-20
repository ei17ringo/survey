<?php

// Connect to gmail
$imapPath = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
$username = 'eichinohe@nexseed.net';
$password = 'erikoichinohe';
 
// try to connect
$inbox = imap_open($imapPath,$username,$password) or die('Cannot connect to Gmail:'.imap_last_error());

$uids = imap_search($inbox, 'UNSEEN', SE_UID);

foreach($uids as $msgno) {
 
    $header = imap_headerinfo($inbox, $msgno);
    $subject = mb_convert_encoding(mb_decode_mimeheader($header->subject), 'utf-8');
 
    $body = imap_fetchbody($inbox, $msgno, 1, FT_INTERNAL);
    $body = trim($body);
 
    $context = mb_convert_encoding(imap_base64($body), 'UTF-8', 'auto');

    echo $subject;
}