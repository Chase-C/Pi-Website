#!/usr/bin/perl -Tw
# Chase Cummings


use strict;
$ENV{PATH} = "/usr/bin:/bin:/usr/sbin";

use warnings;
use subs qw{isHostValid}
use CGI qw( :standard );
use CGI::Carp qw(fatalsToBrowser);

BEGIN {
    CGI::Carp::set_message(\&carp_errors);
}

my $NSLOOKUP = 'usr/bin/nslookup';
my $SENDMAIL = '/usr/bin/msmtp -C /etc/msmtprc -t';
my $RECIP = 'chaseecummings@gmail.com';

if($ENV{REQUEST_METHOD} eq 'POST') {
    my $name_in = param('name');
    my $name = q{};
    my $email_in = param('email');
    my $email = q{};
    my $message_in = param('message');
    my $message = q{};

    open (MAIL, "|$SENDMAIL");
    print MAIL "To: $RECIP\n";
    print MAIL "Reply: $email\n";
    print MAIL "Subject: Email from Pi-Web visitor\n";
    print MAIL "\n\n";
    print MAIL "name: ".$name."\n";
    print MAIL "email: ".$email."\n";
    print MAIL "message: ".$message."\n";
    print MAIL "\n\n";
    close (MAIL);
}

sub isHostValid {
    my $host = shift;

    $/='';
    open(my $fh, "-|", $NSLOOKUP, "-type=any", $host)
        or die "unable to exec $NSLOOKUP: $!";
    my @response = <$fh>;
    close $fh;
    $/='\n';

    return 1 if (grep /Name:\s+$host/, @response);
    return 0;
}

sub carp_error {
    my $error_message = shift();

    print start_html("Error") .
                h1("Error") .
                p("Sorry, the following error has occured: ") .
                p(i($error_message)) .
                end_html;
}
