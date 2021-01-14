CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_status` CHAR(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`userid`)
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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `login_details`
  MODIFY `logindetailsid` int(11) NOT NULL AUTO_INCREMENT;



//////////////////////////////////////////////////////////////////////////////////
  CREATE TABLE `Groups` (
  `groupid` int(11) NOT NULL,
  `groupidact` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL ,
  `grouptype` varchar(255) NOT NULL,
  `groupadmin` varchar(255) NOT NULL 

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Groups`
  ADD PRIMARY KEY (`groupid`);

ALTER TABLE `Groups`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT;



  CREATE TABLE `GroupsMem` (
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL ,
  `userid` int(11) NOT NULL ,
  `group_name` varchar(255) NOT NULL,
  `Joining` int(1) NOTNULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `GroupsMem`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `GroupsMem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


  CREATE TABLE `GroupPosts` (
  `postid` int(11) NOT NULL,
  `post_in_group` varchar(255) NOT NULL ,
  `post_user` varchar(255) NOT NULL,
  `post_caption` text NOT NULL ,
  `pecset` int(1)  NOT NULL,
  `Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `GroupPosts`
  ADD PRIMARY KEY (`postid`);

ALTER TABLE `GroupPosts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `GroupPosts`
  ADD (`pecset`) int(1)  NOT NULL ;



/////////////////////////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////
  CREATE TABLE `Pages` (
  `pageid` int(11) NOT NULL,
  `pageidact` int(11) NOT NULL,
  `pagename` varchar(255) NOT NULL ,
  `pagetype` varchar(255) NOT NULL,
  `pageadmin` varchar(255) NOT NULL 

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Pages`
  ADD PRIMARY KEY (`pageid`);

ALTER TABLE `Pages`
  MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT;



  CREATE TABLE `PagesMem` (
  `id` int(11) NOT NULL,
  `pageid` int(11) NOT NULL ,
  `userid` int(11) NOT NULL ,
  `page_name` varchar(255) NOT NULL,
  `Joining` int(1) NOTNULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `PagesMem`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `PagesMem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



  CREATE TABLE `pagePosts` (
  `postid` int(11) NOT NULL,
  `post_in_page` varchar(255) NOT NULL ,
  `post_user` varchar(255) NOT NULL,
  `post_caption` text NOT NULL,
  `post_user` varchar(255) NOT NULL, 
  `pecset` int(1)  NOT NULL,
  `Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `pagePosts`
  ADD PRIMARY KEY (`postid`);

ALTER TABLE `pagePosts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT; 


/////////////////////////////////////////////////////////////////////////////////////////


CREATE TABLE friendship (
user1id            INT NOT NULL,
user2id            INT NOT NULL,
friendship_status   INT NOT NULL,
mention				INT NULL,
FOREIGN KEY (user1id) REFERENCES users(userid),
FOREIGN KEY (user2id) REFERENCES users(userid)
);

CREATE TABLE posts (
post_id             INT NOT NULL AUTO_INCREMENT,
post_caption        TEXT NOT NULL,
post_time           TIMESTAMP NOT NULL, 
post_public         CHAR(1) NOT NULL,
post_by             INT NOT NULL,
likes				INT NOT NULL,
save         		CHAR(1) NOT NULL,
PRIMARY KEY (post_id),
FOREIGN KEY (post_by) REFERENCES users(userid)
);

CREATE TABLE comments (
comment_id          INT NOT NULL AUTO_INCREMENT,
body        		TEXT NOT NULL,
comment_time        TIMESTAMP NOT NULL, 
comment_by             INT NOT NULL,
post_id            INT NOT NULL,
PRIMARY KEY (comment_id),
FOREIGN KEY (comment_by) REFERENCES users(userid)
);

CREATE TABLE saveshare (
user            	INT NOT NULL,
post_id            	INT NOT NULL,
save   				INT NOT NULL,
share				INT NOT NULL,
FOREIGN KEY (user) REFERENCES users(userid)
);

CREATE TABLE mentions (
user1id            INT NOT NULL,
user2id            INT NOT NULL,
status   		   INT NOT NULL,
FOREIGN KEY (user1id) REFERENCES users(userid),
FOREIGN KEY (user2id) REFERENCES users(userid)
);