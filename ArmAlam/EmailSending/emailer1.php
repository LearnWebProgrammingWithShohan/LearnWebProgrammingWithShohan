<?php

use emailer;

class emailer1 extends emailer


{
    $emailer1 = new emailer();
    $emailer1->addRecipient("receiver@mail.com");
    $emailer1->setSubject("Test Email");
    $emailer1->setBody("Hi! Hope you're doing great!");
    $emailer1->sendEmail();
}
