<?php

//Table structure for table "chat_message"

/*

  chat_message_id=> int(11) NOT NULL AUTO_INCREMENT
  to_user_id => int(11) NOT NULL
  from_user_id=> int(11) NOT NULL
  chat_message=>text NOT NULL
  timestamp=> timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  status=> int(1) NOT NULL
 
*/ 

//Table structure for table "users"

/* 
userid=> int(11) NOT NULL,
username =>varchar(255) NOT NULL
password=> varchar(255) NOT NULL
email=>varchar(255) NOT NULL
created_at=> timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
*/


//Table structure for table "login_details"


/* 


  logindetailsid=> int(11) NOT NULL
  userid =>int(11) NOT NULL
  lastactivity=> timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  istype =>enum('no','yes') NOT NULL in php admin select from type enum 
  and in the length,value box write 'no','yes' copy paste 
*/









/*
CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `login_details` (
  `logindetailsid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `lastactivity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `istype` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

ALTER TABLE `login_details`
  ADD PRIMARY KEY (`logindetailsid`);




ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;


ALTER TABLE `login_details`
  MODIFY `logindetailsid` int(11) NOT NULL AUTO_INCREMENT;





*/
?>